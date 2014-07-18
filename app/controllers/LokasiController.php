<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\Lokasi;
use View;
use Validator;
use Input;
use Redirect;

/**
 * Description of LokasiController
 *
 * @author Mr
 */
class LokasiController extends AdminController {

    public function view() {
        $data = array(
//            'lokasi' => Lokasi::all(),
            'isi' => Lokasi::paginate(4),
        );

        return View::make('lokasi.index', $data);
    }

    public function add() {

        return View::make('lokasi.add');
    }

    public function addProses() {
        //validator
        $rules = [
            'nama_lokasi' => 'required',
            'tempat' => 'required',
            'kabupaten' => 'required',
        ];
        $validator = Validator::make(Input::all(), $rules);
        /*
         * jika tidak valid redirect kembali ke halaman create
         */
        if ($validator->fails()) {
            return Redirect::to('/lokasi/add')->withErrors($validator);
        } else {
            /*
             * jika valid simpan ke database
             */
            $add = Input::all();
            $lokasi = new Lokasi();
            $lokasi->nama_lokasi = $add['nama_lokasi'];
            $lokasi->tempat = $add['tempat'];
            //field ditabel DB = name di form add
            $lokasi->kabupaten = $add['kabupaten'];
            $lokasi->save();

            return Redirect::to('/lokasi');
        }


//        echo "<pre>";
//        print_r($add);
//        echo "</pre>";
    }

    public function edit($id) {

        $edit = Lokasi::find($id);
        $data = array(
            'indeks' => $edit,
        );

        return View::make('lokasi.edit', $data);
    }

    public function editProses() {
        $up = Input::all();
        $update = Lokasi::find($up['id']);
        $update->nama_lokasi = $up['nama_lokasi'];
        $update->tempat = $up['tempat'];
        $update->kabupaten = $up['kabupaten'];
        $update->update();
        
        return Redirect::to('/lokasi');
    }

    public function delete($id) {
        $del = Lokasi::find($id);
        $del->delete();

        return Redirect::to('/lokasi');
    }

    public function cari() {
        $in = Input::get('cari');
        $res = Lokasi::where('nama_lokasi', 'LIKE', '%' . $in . '%')
                ->orWhere('tempat', 'LIKE', '%' . $in . '%')
                ->orWhere('kabupaten', 'LIKE', '%' . $in . '%')
                ->get();
        $data = array(
            'lokasi' => $res,
        );
        return View::make('lokasi.cari', $data);
    }

}
