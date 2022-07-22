<?php

namespace App\Modules\Banner\Repositories;


interface BannerInterface
{

    public function all($filter = []);

    public function find($id);

    public function save($data);

    public function update($id, $role);

    public function delete($ids);

    public function changeStatus($id);

    public function deleteImage($id);

    public function deleteFile($id);

}
