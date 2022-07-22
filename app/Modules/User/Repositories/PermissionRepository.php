<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\Admin;
use App\Modules\User\Models\Permission;
use App\Modules\User\Models\Role;
use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Auth;


class PermissionRepository implements PermissionInterface
{




    public function find($id)
    {
        return Permission::find($id);
    }

    public function getCreatedByName($created_by_id)
    {
        $createdBy = Admin::find($created_by_id)->get();


        return $createdBy['id'];
    }

    public function save($roleId, $data)
    {
        $role = Role::find($roleId);
        $permission = [];

        foreach ($data as $key => $row) {

            $permission[] = [
                'route_name' => $row
            ];

        }

        $role->permission()->createMany($permission);

    }

    public function getList($roleId)
    {
        return Permission::where('role_id', $roleId)->pluck('route_name');
    }


    public function update($id, $data)
    {
        $Permission = Permission::find($id);

        return $Permission->update($data);
    }


    public function deleteByGroup($roleId)
    {
        $permissions = Permission::where('role_id', $roleId)->forcedelete();

    }


}
