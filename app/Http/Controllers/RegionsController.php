<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionsController extends Controller
{
    public function index()
    {
        return view('regions.index');
    }

    // tambahkan method lain seperti create, store, show, edit, update, destroy
}
