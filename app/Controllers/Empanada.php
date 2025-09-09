<?php

namespace App\Controllers;

class Empanada extends BaseController
{
    public function index(): string
    {
        return view('empanada/index');
    }
}
