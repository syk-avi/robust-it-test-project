<?php

namespace App\Modules\User\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Modules\User\Http\Requests\RegisterFormRequest;
    use App\Modules\User\Repositories\AdminInterface;
    use Laracasts\Flash\Flash;


    class RegisterAdminController extends Controller
    {
        protected $admin;

        public function __construct(AdminInterface $admin)
        {
            $this->admin = $admin;
        }

        public function register()
        {

            return view('user::register.register');
        }

        public function postRegister(RegisterFormRequest $request)
        {

            $data = $request->all();
            $data['user_type'] = 'admin';
            $data['status'] = 0;
            $result = $this->admin->create($data);

            Flash::success("User created. Please contact administration");

            return redirect()->back();
        }


    }

}
