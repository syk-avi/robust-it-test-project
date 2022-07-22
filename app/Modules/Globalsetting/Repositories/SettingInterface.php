<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/28/17
 * Time: 1:17 PM
 */

namespace App\Modules\Globalsetting\Repositories;


interface SettingInterface
{
    public function find($id);

    public function save($data);

    public function delete($ids);

    public function deleteImage($id,$field);

    public function deleteFile($id);

}