<?php

namespace App\Modules\Banner\Repositories;

use File;
use App\Modules\Banner\Models\Banner;

class BannerRepository implements BannerInterface
{

    private static $path = '/assets/banner';

    public function all($filter = [])
    {
        $result = Banner::when(array_keys($filter), function ($query) use ($filter) {

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
        return Banner::find($id);
    }

    public function save($data)
    {
        $data['status'] = 1;


        return Banner::create($data);
    }

    public function update($id, $data)
    {
        $banner = Banner::find($id);

        return $banner->update($data);
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
        return Banner::destroy($ids);
    }

    public function changeStatus($id)
    {
        $status = $this->getStatus($id);
        if ($status == 0) {
            $stat = 1;
        } elseif ($status == 1) {
            $stat = 0;
        }
        $row = Banner::find($id);
        $row->status = $stat;
        if ($row->save()) {
            return $this->getStatus($id);

        } else {
            return false;
        }
    }

    private function getStatus($id)
    {

        $row = Banner::find($id);

        return $row->status;
    }

    public function deleteImage($id)
    {
        $page = Banner::where('id', $id)->where('featured_image', 'like', '%_%')->first();
        $image = $page->featured_image;
        File::delete(public_path('uploads/slider/featured_image/' . $image));
        return $page->update(['featured_image' => null]);
    }

    public function deleteFile($id)
    {
        $page = Banner::where('id', $id)->where('file_name', 'like', '%_%')->first();
        $image = $page->file_name;
        File::delete(public_path('uploads/slider/file/' . $image));
        return $page->update(['file_name' => null]);
    }
} 
