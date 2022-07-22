<?php

namespace App\Modules\Globalsetting\Http\Controllers;

use App\Modules\Globalsetting\Http\Requests\GlobalSettingFormRequest;
use App\Modules\Globalsetting\Models\Globalsetting;
use App\Modules\Globalsetting\Repositories\SettingInterface;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{

    protected $setting;


    public function __construct(SettingInterface $setting)
    {
        $this->middleware('auth');
        $this->setting = $setting;

    }

    public function index(Request $request)
    {
        $filter = $request->all();
        $filter['title'] = $request->get('q');
        $sort['by'] = $request->get('key', 'id');
        $sort['sort'] = $request->get('sort', 'DESC');



        $settings = $this->setting->findAll($limit = 8, $filter, $sort);
        $settings->appends(['q' => $filter['title']]);

        $sort = ($sort['sort'] == 'DESC') ? 'ASC' : 'DESC';

        return view('globalsetting::setting.index', compact('settings', 'sort'));
    }

    public function create()
    {
        $setting = $this->setting->find(1);

        if($setting){
            return redirect(route('globalsetting.edit',$setting->id));
        }
        return view('globalsetting::setting.create');
    }

    public function store(GlobalSettingFormRequest $request)
    {
        $input = $request->all();



        try {
            if ($request->hasFile('organisation_logo_1')) {
                $featured = $request->file('organisation_logo_1');
                $input['organisation_logo_1'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['organisation_logo_1']);
            }
            if ($request->hasFile('organisation_logo_2')) {
                $featured = $request->file('organisation_logo_2');
                $input['organisation_logo_2'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['organisation_logo_2']);
            }
            if ($request->hasFile('header_bg_image')) {
                $featured = $request->file('header_bg_image');
                $input['header_bg_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['header_bg_image']);
            }

           $setting=$this->setting->save($input);

            Flash::success("Data Created Successfully");

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('globalsetting.create',$setting->id));
    }

    public function show($id)
    {
        $setting = $this->setting->find($id);

        return view('globalsetting::setting.show', compact('setting'));
    }

    public function edit($id)
    {

        $data['setting']  = $this->setting->find($id);


        return view('globalsetting::setting.edit',$data);
    }


    public function update(Request $request, $id)
    {
        try {

            $input = $request->all();


            if ($request->hasFile('organisation_logo_1')) {
                $featured = $request->file('organisation_logo_1');
                $input['organisation_logo_1'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['organisation_logo_1']);
            }
            if ($request->hasFile('organisation_logo_2')) {
                $featured = $request->file('organisation_logo_2');
                $input['organisation_logo_2'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['organisation_logo_2']);
            }
            if ($request->hasFile('header_bg_image')) {
                $featured = $request->file('header_bg_image');
                $input['header_bg_image'] = time() . '_' . $featured->getClientOriginalName();
                $destinationPath = public_path('uploads/featured_image');
                $featured->move($destinationPath, $input['header_bg_image']);
            }




            $this->setting->update($id, $input);

            Flash::success("Data Updated Successfully");

            return redirect(route('globalsetting.edit', ['id' => $id]));

        } catch (\Throwable $t) {

            Flash::error($t->getMessage());

        }
    }

    public function destroy(Request $request)
    {
        $ids = $request->all();

        try {
            if ($request->has('toDelete')) {
                $this->setting->delete($ids['toDelete']);
                Flash::success("Data deleted Successfully");
            } else {
                Flash::error("Please check at least one to delete");
            }
        } catch (\Throwable $e) {
            Flash::error($e->getMessage());
        }

        return redirect(route('globalsetting.index'));
    }

    public function delete($id)
    {

        try {

            if ($id) {

                $this->setting->delete($id);
                Flash::success("Data deleted Successfully");

            } else {

                Flash::error("Please check at least one to delete");

            }

        } catch (\Throwable $e) {

            Flash::error($e->getMessage());
        }

        return redirect(route('globalsetting.index'));
    }



    public function removeImage($id,$field)
    {
        $this->setting->deleteImage($id,$field);
        return redirect()->back();
    }


    public function removeFile($id)
    {
        $this->setting->deleteFile($id);
        return redirect()->back();
    }
}
