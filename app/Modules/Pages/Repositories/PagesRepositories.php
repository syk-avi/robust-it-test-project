<?php
/**
 * Created by PhpStorm.
 * User: om
 * Date: 12/28/17
 * Time: 1:16 PM
 */

namespace App\Modules\Pages\Repositories;



use File;
use App\Modules\Pages\Models\Pages;

class PagesRepositories implements PagesInterface
{
    private static $path = '/assets/uploads/pages';


    public function all($filter = [])
    {

        $result = Pages::when(array_keys($filter), function ($query) use ($filter) {

            if (isset($filter['title'])) {
                $query->where('title', 'like', '%' . $filter['title'] . '%');

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
        return Pages::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;

        return Pages::create($data);
    }

    public function update($id, $data)
    {
        $pages = Pages::find($id);

        return $pages->update($data);
    }

    public function upload($file)
    {
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . self::$path, $fileName);

        return $fileName;
    }

    public function delete($ids)
    {
        return Pages::destroy($ids);
    }

    public function getName()
    {
        return Pages::pluck('title','id');
    }
    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Pages::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = Pages::find($id);

        return $row->status;
    }

    public function findBySlug($slug){

        $result = Pages::where('slug',$slug)->first();
        return $result;
    }
    public function deleteImage($id)
    {
        $page = Pages::where('id', $id)->where('featured_image', 'like', '%_%')->first();
        $image = $page->featured_image;
        File::delete(public_path('uploads/page/featured_image/' . $image));
        return $page->update(['featured_image' => null]);
    }

    public function deleteFile($id)
    {
        $page = Pages::where('id', $id)->where('file_name', 'like', '%_%')->first();
        $image = $page->file_name;
        File::delete(public_path('uploads/page/file/' . $image));
        return $page->update(['file_name' => null]);
    }
}