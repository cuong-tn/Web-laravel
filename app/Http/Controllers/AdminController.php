<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Session\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller

{
    public function index() {
        return view('login_admin');
    }
    public function show_dashboard() {
       $tongquan=DB::table('tbl_product')->orderBy('product_id','asc')->get();
       $qty_category=DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id',"=",'tbl_product.category_id')->get();
        return view('admin.dashboard')->with(compact('tongquan','qty_category'));
    }
    public function dashboard(Request $request) {
        $admin_email = $request->admin_email;
        $admin_password = $request->admin_password;

        $result = DB::table('tbl_admin')->first();
        $pass=$result->admin_password;
        $admin_emaildt=$result->admin_email;
        // dd($pass);
        if($admin_email==$admin_emaildt){
            if(password_verify($admin_password, $pass)){

                Session()->put('admin_name', $result->admin_name);
                Session()->put('admin_id', $result->admin_id);
                 return Redirect::to('/dashboard');
            }
            else{
                Session()->put('message', 'Mật khẩu hoặc tài khoản sai!');
                return Redirect::to('/admin');
            }
        }
        else{
            Session()->put('message', 'Mật khẩu hoặc tài khoản sai!');
            return Redirect::to('/admin');
        }

    }
    public function logout() {

        return view('logout_admin');

    }
    public function login() {

        return view('login_admin');

    }

    public function forgotPassword(Request $request) {
        if ($request->isMethod('POST')) {
            $email = $request['email'];
            $token = Hash::make($email); // tạo token từ địa chỉ email
            Mail::to($email) -> send(new UserResetPassEmail($token));
        } else {
            return view('auth.forgot-password');
        }
    }

    public function resetPassword(Request $request) {
        $users = User::all();
        foreach ($users as $user) {
            var_dump(Hash::check($user->email, $request->token));
            if (strcmp(Hash::make($user->email), $request->token)) {
                $user->where('id', $user->id)->update([
                    'password' => Hash::make('12345678')
                ]);
                break;
            }
        }
    }
}
