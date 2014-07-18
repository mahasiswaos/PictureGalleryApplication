<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\Users;
use View;
use Input;
use Hash;
use Validator;
use Redirect;
use Session;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Paginator;

/**
 * Description of TestController
 *
 * @author aljufry
 * 
 * class userController
 */
class UserController extends AdminController {

    /**
     * 
     * @return View
     */
    public function index() {
        $users = Users::paginate(5);
        
        $data = [
            'users' => $users
        ];
        return View::make('users.view', $data);
    }

    /**
     * 
     * @return View
     */
    public function userAdd() {
        return View::make('users.add');
    }

    /**
     * 
     * @return Redirect
     */
    public function prosesAdd() {
        $rules = [
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama_user' => 'required',
            'level' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        /*
         * jika tidak valid redirect kembali ke halaman create
         */
        if ($validator->fails()) {
            return Redirect::to('/users/add')->withErrors($validator);
        } else {
            /*
             * jika valid simpan ke database
             */
            $in = Input::all();
            $pass = $in['password'];
            $pass = Crypt::encrypt($pass);
            $user = new Users;
            $user->username = $in['username'];
            $user->password = $pass;
            $user->email = $in['email'];
            $user->nama_user = $in['nama_user'];
            $user->level = $in['level'];
            $user->save();
            /*
             * redirect ke index bands
             */
            Session::flash('message', 'Successfully created User!');
            return Redirect::to('/users');
        }
    }

    /**
     * 
     * @param type $id
     * @return View
     */
    public function userUpdate($id) {
        $user = Users::find($id);
        $data = [
            'isi' => $user,
        ];
        return View::make('users.edit', $data);
    }

    /**
     * 
     * @param type $id
     * @return Redirect
     */
    public function userPupdate($id) {
        // validation
        $rules = array(
            'username' => 'required',
            'password' => 'required',
            'email' => 'required|email',
            'nama_user' => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);
        // jika tidak valid redirect ke halaman edit
        if ($validator->fails()) {
            return Redirect::to("/users/update/" . $id)
                            ->withErrors($validator);
        } else {
            // jika valid disimpan
            $in = Input::all();
            $pass = $in['password'];
            $pass = Crypt::encrypt($pass);
            $user = Users::find($id);
            $user->username = $in['username'];
            $user->password = $pass;
            $user->email = $in['email'];
            $user->nama_user = $in['nama_user'];
//            $user->level = $in['level'];
            $user->save();
            // redirect ke halaman band index
            Session::flash('message', 'Successfully updated Users!');
            return Redirect::to('/users');
        }
    }

    /**
     * 
     * @param type $id
     * @return Redirect
     */
    public function userDelete($id) {
        $user = Users::find($id);
        $user->delete();
        Session::flash('message', 'Successfully deleted the Users!');
        return Redirect::to('/users');
    }

}
