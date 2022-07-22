<?php

namespace App\Modules\Pages\Http\Controllers;


use App\Modules\Pages\Http\Requests\PageFormRequest;
use App\Modules\Pages\Repositories\PagesInterface;
use App\Modules\Pages\Repositories\PageTypeInterface;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PagesController extends Controller
{
    protected $pages;

    public function __construct(PagesInterface $pages)
    {
        $this->middleware('auth');
        $this->pages = $pages;
    }

    public function index( )
    {

        $pages = $this->pages->all($filter = []);

        return view('pages::pages.index', compact('pages'));


    }

    public function create()
    {
        $data['parentPages'] = $this->pages->getName();

        return view('pages::pages.create', $data);
    }

    public function store(PageFormRequest $request)
    {
        $input = $request->all();

        try {

            $input['slug'] = Str::slug($input['title'], '-');


            $input['created_by_id'] = Auth::User()->id;

            if ($request->hasFile('featured_image')) {
                $featured = $request->file('featured_image');
                $input['featured_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/page/featured_image');
                $featured->move($destinationPath, $input['featured_image']);
            }

            if ($request->hasFile('file_name')) {
                $img_file = $request->file('file_name');
                $input['file_name'] = time() . '_' . $img_file->getClientOriginalName();
                $destinationPath = public_path('uploads/page/file');
                $img_file->move($destinationPath, $input['file_name']);
            }


            $this->pages->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('page.index'));
    }

    public function show($id)
    {
        $pages = $this->pages->find($id);

        return view('pages::pages.show', compact('pages'));
    }

    public function edit($id)
    {
        $data['page'] = $this->pages->find($id);
        $data['parentPages'] = $this->pages->getName();

        return view('pages::pages.edit', $data);
    }


    public function update(PageFormRequest $request, $id)
    {
        try {

            $input = $request->all();

            if ($request->hasFile('featured_image')) {
                $featured = $request->file('featured_image');
                $input['featured_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/page/featured_image');
                $featured->move($destinationPath, $input['featured_image']);
            }
            if ($request->hasFile('file_name')) {
                $img_file = $request->file('file_name');
                $input['file_name'] = time() . '_' . $img_file->getClientOriginalName();
                $destinationPath = public_path('uploads/page/file');
                $img_file->move($destinationPath, $input['file_name']);
            }

            $this->pages->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('page.edit', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->pages->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('page.index'));
    }

    public function delete($id)
    {

        try {
            if ($id) {
                $this->pages->delete($id);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('pages.index'));
    }

    public function removeImage($id)
    {
        $this->pages->deleteImage($id);
        return redirect()->back();
    }


    public function removeFile($id)
    {
        $this->pages->deleteFile($id);
        return redirect()->back();
    }

    public function status(Request $request)
    {
        try {
            if ($request->ajax()) {
                $stat = null;
                $id = $request->input('id');
                $status = $this->pages->changeStatus($id);
                if ($status == 0) {
                    $stat = '<i class="fas fa-toggle-off fa-2x fa-lg text-danger"></i>';
                } elseif ($status == 1) {
                    $stat = '<i class="fas fa-toggle-on fa-2x text-success-800"></i>';
                }
                $data['tgle'] = $stat;
            }

        } catch (\Throwable $e) {
            $data['error'] = $e->getMessage();
        }

        return response()->json($data);
    }
}

