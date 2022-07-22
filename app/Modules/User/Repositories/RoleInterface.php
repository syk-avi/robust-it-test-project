<?php


namespace App\Modules\User\Repositories;


interface RoleInterface
{

    public function all($filter = []);

    public function find($id);

    public function findByName($title);

    public function findList();

    public function save($data);

    public function update($id, $data);

    public function delete($ids);

    public function changeStatus($id);

}
