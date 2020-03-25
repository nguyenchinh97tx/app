<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends FrontendController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('layouts.app');
    }
}
