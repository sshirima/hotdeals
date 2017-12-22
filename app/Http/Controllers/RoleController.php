<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function getAll()
    {

    }
}
