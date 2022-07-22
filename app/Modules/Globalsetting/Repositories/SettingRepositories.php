<?php

namespace App\Modules\Globalsetting\Repositories;


use App\Modules\Globalsetting\Models\Company;
use File;


class SettingRepositories implements SettingInterface
{

    public function find($id)
    {
        return Company::whereId($id)->first();
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Company::create($data);
    }

    public function update($id, $data)
    {
        $pages = Company::find($id);

        return $pages->update($data);
    }


    public function delete($ids)
    {
        return Company::destroy($ids);
    }



    public function deleteImage($id,$field)
    {
        $page = Company::where('id', $id)->where($field, 'like', '%_%')->first();
        $image = $page->$field;

        File::delete(public_path('uploads/featured_image/' . $image));
        return $page->update([$field => null]);
    }

    public function deleteFile($id)
    {
        $page = Company::where('id', $id)->where('file_name', 'like', '%_%')->first();
        $image = $page->file_name;
        File::delete(public_path('uploads/file/' . $image));
        return $page->update(['file_name' => null]);
    }
}