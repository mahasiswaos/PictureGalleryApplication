<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Gambar extends Eloquent {

    protected $table = 'gambar';
    public $timestamps = false;

    public function users() {
        return $this->belongsTo('App\\Models\\Users');
    }

    public function lokasi() {
        return $this->belongsTo('App\\Models\\Lokasi');
    }

}
