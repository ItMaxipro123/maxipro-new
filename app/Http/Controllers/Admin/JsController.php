<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JsController extends Controller
{
    //
    public function kas()
    {
        return view('admin.kas.aset_js.kasbanksurabaya');
    }
}
