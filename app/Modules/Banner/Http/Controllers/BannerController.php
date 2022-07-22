<?php

namespace App\Modules\Banner\Http\Controllers;

use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Banner\Http\Requests\BannerFormRequest;

class BannerController extends Controller
{

    protected $banner;

    public function __construct(BannerInterface $banner)
    {
        $this->middleware('auth');
        $this->banner = $banner;

    }

    public function index(Request $request)
    {
        $filter = [];

        $banners = $this->banner->findAll($filter);


        return view('banner::banner.index', compact('banners'));
    }


    public function create()
    {
        return view('banner::banner.create');
    }

    public function store(BannerFormRequest $request)
    {
        $input = $request->all();


        try {
            if ($request->hasFile('featured_image')) {
                $featured = $request->file('featured_image');
                $input['featured_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/slide/featured_image');
                $featured->move($destinationPath, $input['featured_image']);
            }

            $this->banner->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {


            Flash::error($e->getMessage());
        }

        return redirect(route('banner.index'));
    }

    public function show($id)
    {
        $banner = $this->banner->find($id);

        return view('banner::banner.show', compact('banner'));
    }

    public function edit($id)
    {
        $data['banner'] = $this->banner->find($id);

        return view('banner::banner.edit', $data);
    }


    public function update(BannerFormRequest $request, $id)
    {
        try {

            $input = $request->all();

            if ($request->hasFile('featured_image')) {
                $featured = $request->file('featured_image');
                $input['featured_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/slide/featured_image');
                $featured->move($destinationPath, $input['featured_image']);
            }


            $this->banner->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('banner.edit', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->banner->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('banner.index'));
    }

    public function delete($id)
    {

        try {

            if ($id) {

                $this->banner->delete($id);
                Flash::success("Data deleted Successfully");

            } else {

                Flash::error("Please check at least one to delete");

            }

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('banner.index'));
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->banner->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fa fa-toggle-off fa-2x fa-lg text-danger"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fa fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {
            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }

    public function removeImage($id)
    {
        $this->banner->deleteImage($id);
        return redirect()->back();
    }


    public function removeFile($id)
    {
        $this->banner->deleteFile($id);
        return redirect()->back();
    }


}
