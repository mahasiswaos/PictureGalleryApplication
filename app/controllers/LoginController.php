<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Input;
use Validator;
use Auth;
use Redirect;
use Session;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;
use View;

class LoginController extends BaseController {
    public function index() {
        return View::make('login.view');
//        $secret = Crypt::encrypt('admin');
//        echo $secret;
    }
    
    public function proseslogin() {
        $inp = Input::all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $valid = Validator::make($inp, $rules); //pengecekan untuk Variabel Input terhadap Rule nya
        
        if ($valid->fails()) {
            return Redirect::to('/login')->withErrors($valid); //akan menampilkan error jika proses validasi Salah
        } else {
            $pass = $inp['password'];
            $email = $inp['email'];
            $data = [
                'email' => $email,
                'password' => $pass,
            ];
            if (Auth::attempt($data)) {
                Session::flash('message', 'Successfully Login!');
                return Redirect::intended('/gambar');
//                echo "sukses login";
            } else {
                Session::flash('message', 'Email dan Password no valid!');
                return Redirect::to('/login');
            }
        }
    }  
    /**
     * 
     * @return Redirect
     */
    public function doLogout() {
        Auth::Logout();
        return Redirect::to('/');
    }
}
