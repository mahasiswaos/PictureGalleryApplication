<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use View;
use App\Models\Gambar;
//use Auth;
use Input;

class BerandaController extends BaseController {

    public function index() {
        $table = Gambar::orderBy('id', 'desc')->paginate(3); // cara ambil data
        $data = array(
            'data' => $table,
        );
        return View::make('beranda', $data);
//        return View::make('beranda');
    }

    public function viewGalleryAsGuest() {
        $gb_pag = Gambar::paginate(5);
        $data = array(
            'gambar' => $gb_pag,
        );
//        $data['gambar']= Gambar::all();
        return View::make('gambar.gallery', $data);
    }

    public function searchGambarAsGuest() {
        $in = Input::get('value');
        $res = Gambar::where('deskripsi', 'LIKE', '%' . $in . '%')
                ->orWhere('judul', 'LIKE', '%' . $in . '%')
                ->orWhere('deskripsi', 'LIKE', '%' . $in . '%')
                ->orWhere('kategori', 'LIKE', '%' . $in . '%')
                ->get();
        $data = array(
            'gambar' => $res,
        );
//        $data['gambar']= Gambar::all();
        return View::make('gambar.gallerySearch', $data);
    }

}
