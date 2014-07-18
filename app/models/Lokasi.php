<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Lokasi extends Eloquent{

    protected $table = 'lokasi';
    public $timestamps = false;

    public function gambar() {
        return $this->hasMany('App\\Models\\Gambar');
    }

}
