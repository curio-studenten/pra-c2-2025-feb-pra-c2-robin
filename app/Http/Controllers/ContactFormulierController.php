<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactFormulierController extends Controller
{
    public function contact() {
        return view('pages.contactformulier');
    }
}
