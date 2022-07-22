<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\Admin;
use App\Modules\User\Models\Permission;
use App\Modules\User\Models\Role;
use Hash;
use Illuminate\Support\Facades\Auth;
use File;
use function PHPUnit\Framework\countOf;

class AdminRepository implements AdminInterface
{

    const USER_FIELD = 'admin';

    private static $path = '/adminProfile';



    public function all($filter = [])
    {

        $result = Admin::when(array_keys($filter, true), function ($query) use ($filter) {

            if (isset($filter['email'])) {
                $query->where('email', $filter['email']);

            }
            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }
            if (isset($filter['first_name'])) {
                $query->where('first_name', 'like', '%' . $filter['first_name'] . '%');
            }

            if (isset($filter['last_name'])) {
                $query->where('last_name', 'like', '%' . $filter['last_name'] . '%');
            }

            if (isset($filter['status'])) {
                $query->where('status', $filter['status']);
            }
            return $query;
        })
            ->get();

        return $result;
    }


    public function save($data)
    {

        $data['password'] = bcrypt($data['password']);
        $data['user_field'] = self::USER_FIELD;

        try {

            $user = Admin::create($data);
            $user = Admin::find($user->id);

            // Attach Role
            foreach ($data['roles'] as $val) {
                $user->assignRole($val);
            }


            /*foreach ($data['permissions'] as $val) {
                $user->givePermissionTo($val);
            }*/

        } catch (Exception $e) {

        }

        return true;

    }

    public function create($data)
    {
        $data['created_by_id'] = Auth::user() ? Auth::user()->id : null;
        $data['password'] = bcrypt($data['password']);

        return Admin::create($data);
    }


    public function find($id)
    {
        return Admin::find($id);
    }

    public function findByEmail($email)
    {
        return Admin::where('email', $email)->first();
    }

    public function doesExists($email)
    {
        $user = Admin::where('email', $email)->first();

        return !is_null($user);
    }

    public function isActive($email)
    {
        $user = Admin::where('email', $email)->first();

        if ($user->status == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function getRoles()
    {
        return Role::lists('name', 'name');
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function getPermissions()
    {
        return Permission::lists('name', 'name');
    }

    public function update($userId, $data)
    {
        $user = Admin::find($userId);

        return $user->update($data);
    }

    public function getTotal()
    {
        $user = Admin::where('user_field', '<>', 'admin')->get();

        return $user;
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Admin::find($id);
        $row->status = $stat;

        if ($row->save()) {
            return $this->getStatus($id);
        } else {
            return false;
        }
    }

    private function getStatus($id)
    {
        $row = Admin::find($id);

        return $row->status;
    }

    public function delete($ids)
    {
        return Admin::destroy($ids);
    }

    public function deleteImage($id)
    {
        $page = Admin::where('id', $id)->where('profile_image', 'like', '%_%')->first();
        $image = $page->featured_image;
        File::delete(public_path('uploads/staff/profile_image/' . $image));
        return $page->update(['profile_image' => null]);
    }
}
