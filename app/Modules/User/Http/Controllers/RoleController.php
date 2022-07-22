<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\RoleFormRequest;
use App\Modules\User\Repositories\PermissionInterface;
use App\Modules\User\Repositories\RoleInterface;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class RoleController extends Controller
{
    private $role;

    private $permission;

    public function __construct(RoleInterface $role, PermissionInterface $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }


    private function getHiddenRouteList()
    {
        return $hiddenRoutes = [

            'dashboard',
            'image.serve',
            'logout',
            'login',
            'admin.profile',
            'admin.updateProfile',
            'admin.login.post',
            'permission.denied',
            'ignition.healthCheck',
            'ignition.executeSolution',
            'ignition.shareReport',
            'ignition.scripts',
            'ignition.styles',
            'standalone-filemanager',
            'uploadImage',

        ];
    }

    private function getModuleList()
    {
        $modules = [
            'banner' => 'Banner',
            'page' => 'Page',
            'admin' => 'Admin',
            'role' => 'Role',
            'globalsetting' => 'Global Setting',
            'setting.change-password' => 'Password Setting',

        ];

        return $modules;
    }


    public function index(Request $request)
    {
        $filter =[];

        $roles = $this->role->all( $filter);



        return view('user::role.index', compact('roles'));
    }

    public function create()
    {
        $data['routes'] = $this->getModuleList();

        return view('user::role.create', $data);
    }




    public function store(RoleFormRequest $request)
    {
        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $selected = $request->get('route_name');

        $choosenRoutes = [];

        if ($selected) {
            $hiddenRoutes = $this->getHiddenRouteList();
            $app = app();
            $collection = $app->routes->getRoutes();


            foreach ($selected as $selectedItem) {

                foreach ($collection as $routes) {
                    if ($routes->getName() != null && !in_array($routes->getName(), $hiddenRoutes) && str_contains($routes->getName(), $selectedItem)) {
                        $choosenRoutes[$routes->getName()] = $routes->getName();
                    }
                }

            }
        }


        try {
            $role = $this->role->save($role);
            if ($choosenRoutes) {
                $this->permission->save($role->id, $choosenRoutes);
            }

            Flash::success("Data Created Successfully");

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());
        }

        return redirect(route('role.index'));

    }

    public function edit($id)
    {

        $data['role'] = $this->role->find($id);
        $data['routes'] = $modules = $this->getModuleList();


        $data['assignedRoutes'] = $selectedList = $this->permission->getList($roleId = $id)->toArray();

        $matchedRoute=[];
        foreach ($modules as $key=>$module) {
            foreach ($selectedList as $list) {
                if (str_contains($list, $key)){
                   $matchedRoute[]=$key;
                    $matchedRoute=array_unique($matchedRoute);
                }
            }
        }


        $data['assignedRoutes'] = $matchedRoute ;
        return view('user::role.edit', $data);
    }

    public function update(RoleFormRequest $request, $id)
    {
        $role['name'] = $request->get('name');
        $role['sort_order'] = $request->get('sort_order');
        $selected =  $request->get('route_name');



        $choosenRoutes = [];
        if ($selected) {
            $hiddenRoutes = $this->getHiddenRouteList();
            $app = app();
            $collection = $app->routes->getRoutes();


            $buildRouteList = [];

            foreach ($selected as $selectedItem) {

                foreach ($collection as $routes) {
                    $toshowRoute[$routes->getName()] = $routes->getName();

                    if ($routes->getName() != null && !in_array($routes->getName(), $hiddenRoutes) && str_contains($routes->getName(), $selectedItem)) {

                        $choosenRoutes[$routes->getName()] = $routes->getName();
                    }

                }

            }
        }

        try {
            $this->role->update($id, $role);
            $this->permission->deleteByGroup($id);

            if ($selected) {
                $this->permission->save($roleId = $id, $choosenRoutes);
            }

            Flash::success("Data Updated Successfully");

        } catch (\Throwable  $t) {
            Flash::error($t->getMessage());
        }

        return redirect(route('role.edit', ['id' => $id]));
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {

            if ($request->has('toDelete')) {

                $this->role->delete($ids['toDelete']);

                Flash::success("Data deleted Successfully");

            } else {

                Flash::error("Please check at least one to delete");
            }


        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('role.index'));
    }

    public function status(Request $request)
    {

        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');

                $status = $this->role->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x text-danger-800"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {

            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }


}
