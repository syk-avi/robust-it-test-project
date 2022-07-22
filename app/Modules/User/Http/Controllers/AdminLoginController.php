<?php

namespace App\Modules\User\Http\Controllers {

    use App\Http\Controllers\Controller;


    use App\Modules\User\Http\Requests\ChangePasswordFormRequest;
    use App\Modules\User\Models\Admin;
    use App\Modules\User\Repositories\AdminInterface;
    use Hash;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Laracasts\Flash\Flash as Flash;
    use Socialite;

    class AdminLoginController extends Controller
    {
        protected $admin;
        protected $role;


        public function __construct(AdminInterface $admin)
        {
            $this->admin = $admin;
        }

        public function login()
        {

            if (auth()->guard('admins')->check()) {
                return redirect()->intended(route('dashboard'));
            }

            return view('user::auth.admin-login');
        }

        public function authenticate(Request $request)
        {
            $input = $request->only('email', 'password', 'remember');
            $remember = isset($input['remember']) ? true : false;

            $exists = $this->admin->doesExists($request->email);

            if ($exists) {

                $active = $this->admin->isActive($request->email);

                if ($active) {
                    if (Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password], $remember)) {

                        return redirect()->intended(route('dashboard'));

                    } else {

                        Flash::success("Invalid Access");

                        return view('user::auth.admin-login');
                    }
                } else {
                    Flash::success("User is not active");

                    return view('user::auth.admin-login');
                }


            } else {
                Flash::success("Invalid Access");

                return view('user::auth.admin-login');
            }

        }


        public function logout()
        {
            auth()->guard('admins')->logout();
            return redirect(route('login'));
        }

        public function permissionDenied()
        {
            return view('user::auth.permission-denied');
        }

        public function changePassword()
        {
            return view('user::password.change-password');
        }

        public function updatePassword(ChangePasswordFormRequest $request)
        {

            $oldPassword = $request->get('old_password');
            $newPassword = $request->get('password');

            $id = auth()->user()->id;

            $users = auth()->user();

            if (!(Hash::check($oldPassword, $users->password))) {

                Flash::error("Old Password Do Not Match !");
                return redirect(route('setting.change-password'));

            } else {

                $data['password'] = Hash::make($newPassword);
                $this->admin->update($id, $data);
                Flash::success("Password Successfully Updated!");
            }

            return redirect(route('setting.change-password'));
        }

    }

}
