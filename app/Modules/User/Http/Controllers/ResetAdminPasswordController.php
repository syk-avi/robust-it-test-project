<?php

namespace App\Modules\User\Http\Controllers {

    use App\Http\Controllers\Controller;
    use App\Modules\User\Http\Requests\CheckEmailRequest;
    use App\Modules\User\Http\Requests\ResetPassFormRequest;
    use App\Modules\User\Repositories\AdminInterface;
    use Illuminate\Http\Request;
    use Laracasts\Flash\Flash;
    use Hash;

    class ResetAdminPasswordController extends Controller
    {
        protected $admin;

        public function __construct(AdminInterface $admin)
        {
            $this->admin = $admin;
        }

        public function forgetPassword(){

            return view('user::reset-password.check-email');
        }

        public function checkEmail(CheckEmailRequest $request){

            $data['email'] = $request->email;

            $exists = $this->admin->doesExists($request->email);

            if (!$exists){
                Flash::success("Email Not Found");

                return redirect()->back();
            }

            return view('user::reset-password.reset-password',$data );
        }

        public function resetPassword(ResetPassFormRequest $request){



            $newPassword = $request->get('password');
            $email = $request->get('email');

            $user = $this->admin->findByEmail($email);

            $data['password'] = Hash::make($newPassword);
            $this->admin->update($user->id, $data);
            Flash::success("Password Successfully Updated!");

            return redirect()->route('login');

        }


    }

}
