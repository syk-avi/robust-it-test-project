<?php

namespace App\Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Modules\User\Http\Requests\AdminFormRequest;
use App\Modules\User\Models\Admin;
use App\Modules\User\Repositories\AdminInterface;
use App\Modules\User\Repositories\RoleInterface;
use Auth;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash as Flash;

class AdminController extends Controller
{

    protected $admin;
    protected $role;
    protected $path;


    public function __construct(AdminInterface $admin, RoleInterface $role)
    {
        $this->path = 'uploads/user';
        $this->admin = $admin;
        $this->role = $role;
    }

    public function profile()
    {
        $data['admin'] = $this->admin->find(Auth::User()->id);
        return view('user::admin.admin-profile', $data);
    }




    public function index()
    {

        $filter = [];

        $admins = $this->admin->all($filter);


        return view('user::admin.index', compact('admins'));
    }

    public function create()
    {
        $data['roles'] = $this->role->findList();

        return view('user::admin.create', $data);
    }

    public function store(AdminFormRequest $request)
    {
        $input = $request->all();
        $input['user_type'] = Admin::adminType()['admin'];

        $input['status'] = 1;
        $roleId = $input['role'];
        try {

            if ($request->hasFile('profile_image')) {
                $featured = $request->file('profile_image');
                $input['profile_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path($this->path . '/profile_image');
                $featured->move($destinationPath, $input['profile_image']);
            }

            $admin = $this->admin->create($input);

            $admin->roles()->attach($roleId);

        } catch (\Throwable $t) {
            Flash::error($t->getMessage());

        }

        Flash::success("Admin Created  successfully");

        return redirect(route('admin.index'));

    }

    public function edit($id)
    {
        $data['admin'] = $admin = $this->admin->find($id);
        $data['adminRoles'] = $this->role->findList();


        return view('user::admin.edit', $data);
    }

    public function update(AdminFormRequest $request, $id)
    {
        $input = $request->all();

        if (!is_null($input['password'])) {

            $input['password'] = bcrypt($input['password']);
        }else{
            unset($input['password'] );
            unset($input['password_confirmation'] );
        }
        $admin = $this->admin->find($id);

        if ($request->hasFile('profile_image')) {
            $featured = $request->file('profile_image');
            $input['profile_image'] = time() . '_' . $featured->getClientOriginalName();
            $destinationPath = public_path($this->path . '/profile_image');
            $featured->move($destinationPath, $input['profile_image']);
        }


        $admin->update($input);

        if (isset($input['role'])) {
            $roleId = $input['role'];
            $admin->roles()->detach();
            $admin->roles()->attach($roleId);
        } else {
            $admin->roles()->detach();
        }

        Flash::success("Data Updated  successfully");

        return redirect(route('admin.edit', ['id' => $id]));

    }


    public function status(Request $request)
    {

        try {

            if ($request->ajax()) {

                $stat = null;
                $id = $request->input('id');

                $status = $this->admin->changeStatus($id);
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


    public function destroy(Request $request)
    {


        $ids = $request->all();

        try {

            if ($request->has('toDelete')) {
                $this->admin->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");

            } else {
                Flash::error("Please check at least one to delete");
            }


        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('admin.index'));
    }

    public function removeImage($id)
    {
        $this->admin->deleteImage($id);
        return redirect()->back();
    }

}
