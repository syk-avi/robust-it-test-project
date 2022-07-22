<?php

namespace App\Modules\Admin\Http\Controllers;

use App\Http\Controllers\Controller;


class DashboardController extends Controller
{

    protected $staff;
    protected $publication;

    public function __construct( )
    {
         $this->middleware('auth');

    }


    public function index()
    {
        $data = [];

        return view('admin::dashboard.index',$data);
    }
}
