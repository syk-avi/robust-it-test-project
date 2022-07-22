<?php

namespace App\Modules\User\Repositories;

use App\Modules\User\Models\User;
use App\Modules\User\Models\Role;
use Illuminate\Support\Facades\Auth;


class RoleRepository implements RoleInterface
{


    public function all($filter = [])
    {
        $result = Role::when(array_keys($filter, true), function ($query) use ($filter) {
            if (isset($filter['name'])) {
                $query->where('name', 'like', '%' . $filter['name'] . '%');
            }
            if (isset($filter['start_date'])) {
                $query->where('created_at', '>=', $filter['start_date']);
            }

            if (isset($filter['end_date'])) {
                $query->where('created_at', '<=', $filter['end_date']);
            }
            return $query;
        })
            ->get();

        return $result;
    }


    public function find($id)
    {
        return Role::find($id);
    }

    public function findByName($title)
    {
        return Role::where('name', $title)->first();
    }

    public function findList()
    {
        return Role::pluck('name', 'id');
    }

    public function getCreatedByName($created_by_id)
    {
        $createdBy = User::find($created_by_id)->get();


        return $createdBy['id'];
    }

    public function save($data)
    {

        $data['status'] = 1;
        $data['created_by_id'] = Auth::user()->id;

        return Role::create($data);
    }


    public function update($id, $data)
    {
        $Role = Role::find($id);

        return $Role->update($data);
    }


    public function delete($ids)
    {
        return Role::destroy($ids);
    }


    public function changeStatus($id)
    {
        $status = $this->getStatus($id);

        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }

        $row = Role::find($id);
        $row->status = $stat;

        if ($row->save()) {

            return $this->getStatus($id);

        } else {

            return false;
        }
    }

    public function getStatus($id)
    {
        $row = Role::find($id);

        return $row->status;
    }

} 
