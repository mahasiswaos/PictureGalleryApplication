<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use View;
use App\Models\Gambar;
//use App\Models\Users;
use App\Models\Lokasi;
use Input;
use Redirect;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Paginator;
use Auth;

class GambarController extends AdminController {

    public function view() {
        if (Auth::check()) {
            $uid = Auth::user()->id;
            $gb_pag = Gambar::where('users_id', '=', $uid)->paginate(2);
        }

        $data = array(
            'gambar' => $gb_pag,
        );
//        $data['gambar']= Gambar::all();
        return View::make('gambar.view', $data);
    }

    public function viewAll() {
        $gb_pag = Gambar::paginate(5);
        $data = array(
            'gambar' => $gb_pag,
        );
//        $data['gambar']= Gambar::all();
        return View::make('gambar.gallery', $data);
    }

    public function add() {

        $lokasi = Lokasi::all();
        $dataLokasi = [
            'isi_lokasi' => $lokasi,
        ];
        return View::make('gambar.add', $dataLokasi);
    }

    public function addProses() {
        $rules = [
            'nama_file' => 'required|max:5000|mimes:jpg,jpeg,png',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'users_id' => 'required',
            'lokasi_id' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        /*
         * jika tidak valid redirect kembali ke halaman create
         */
        if ($validator->fails()) {
            return Redirect::to('/gambar/add')->withErrors($validator);
        } else {
            /*
             * jika valid simpan ke database
             */
            $file = Input::file('nama_file');
            $public = 'public/';
            $folderTujuan = 'img';
            $filename = $file->getClientOriginalName();
            $pathFile = $public . $folderTujuan;
            $pathDb = $folderTujuan . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            Input::file('nama_file')->move($pathFile, $filename);
            $in = Input::all();
            $gb = new Gambar();
            $gb->nama_file = $pathDb;
            $gb->tgl = date('Y-m-d');
            $gb->judul = $in['judul'];
            $gb->deskripsi = $in['deskripsi'];
            $gb->kategori = $in['kategori'];
            $gb->users_id = $in['users_id'];
            $gb->lokasi_id = $in['lokasi_id'];
            $gb->save();
            /*
             * redirect ke index gambar
             */
            Session::flash('message', 'Gambar Berhasil Di Simpan!');
            return Redirect::to('/gambar');
        }
    }

    public function edit($id) {
        $gb = Gambar::find($id);
//        $user = $gb->users;
        $lokasi = Lokasi::all();
        $data = [
            'isi_gambar' => $gb,
            'isi_lokasi' => $lokasi,
        ];
        return View::make('gambar.edit', $data);
    }

    public function editProses($id) {
        $rules = [
            'nama_file' => 'required|max:5000|mimes:jpg,jpeg,png',
            'judul' => 'required',
            'deskripsi' => 'required',
            'kategori' => 'required',
            'users_id' => 'required',
            'lokasi_id' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        /*
         * jika tidak valid redirect kembali ke halaman create
         */
        if ($validator->fails()) {
            return Redirect::to('/gambar/edit/' . $id)->withErrors($validator);
        } else {
            /*
             * jika valid simpan ke database
             */
            $file = Input::file('nama_file');
            $prefixDest = 'public/';
            $destinationPath = 'img';
            $filename = $file->getClientOriginalName();
            $pathFile = $prefixDest . $destinationPath;
            $pathDb = $destinationPath . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            Input::file('nama_file')->move($pathFile, $filename);
            $in = Input::all();
            $gb = Gambar::find($id);
            $gb->nama_file = $pathDb;
            $gb->tgl = date('Y-m-d');
            $gb->judul = $in['judul'];
            $gb->deskripsi = $in['deskripsi'];
            $gb->kategori = $in['kategori'];
            $gb->users_id = $in['users_id'];
            $gb->lokasi_id = $in['lokasi_id'];
            $gb->update();
            /*
             * redirect ke index gambar
             */
            Session::flash('message', 'Gambar Berhasil Di Ubah!');
            return Redirect::to('/gambar');
        }
    }

    public function delete($id) {
        $gambar = Gambar::find($id);
        $file = public_path()."/".$gambar->nama_file;
        unlink($file);
        $gambar->delete();
        Session::flash('message', 'Successfully deleted the activity!');
        return Redirect::to('/gambar');
    }

    public function searchGambar() {
        $in=  Input::get('value');
        $res = Gambar::where('tgl','LIKE','%'.$in.'%')
                   ->orWhere('judul','LIKE','%'.$in.'%')
                   ->orWhere('deskripsi','LIKE','%'.$in.'%')
                    ->paginate(2);
        $data = array(
            'gambar'=>$res,
        );
        return View::make('gambar.gallerySearch',$data);
    }

}
