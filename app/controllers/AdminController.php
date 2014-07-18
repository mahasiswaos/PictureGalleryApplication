<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends BaseController {

    function __construct() {
        $this->beforeFilter('auth', array('except' => '/login'));
    }

}
