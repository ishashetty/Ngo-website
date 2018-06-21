<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }
    public function returnitems()
    {
        // $users = DB::select('select * from item ');
        $item = DB::table('item')->get();
        return view('index', compact('items'));
    }
}
