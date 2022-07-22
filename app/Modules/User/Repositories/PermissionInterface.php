<?php


namespace App\Modules\User\Repositories;


interface PermissionInterface
{


    public function find($id);

    public function save($roleId, $data);

    public function update($id, $data);

    public function getList($roleId);

    public function deleteByGroup($roleId);


}
