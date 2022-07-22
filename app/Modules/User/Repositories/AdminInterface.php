<?php

namespace App\Modules\User\Repositories;


interface AdminInterface
{

    public function all($filter = []);

    public function find($id);

    public function findByEmail($email);

    public function doesExists($email);

    public function isActive($email);

    public function create($data);

    public function upload($file);

    public function update($id, $data);

    public function getTotal();

    public function changeStatus($id);

    public function delete($ids);

    public function deleteImage($id);
}
