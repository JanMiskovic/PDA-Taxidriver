<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Driver;

class StatController extends Controller
{

    public function index()
    {
        return Driver::all();
    }

}
