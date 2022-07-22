<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/28/17
 * Time: 1:17 PM
 */

namespace App\Modules\Pages\Repositories;


interface PagesInterface
{

    public function all($filter = []);

    public function find($id);

    public function save($data);

    public function update($id, $role);

    public function delete($ids);

    public function changeStatus($id);

    public function findBySlug($slug);

    public function getName();

    public function deleteImage($id);

    public function deleteFile($id);

}