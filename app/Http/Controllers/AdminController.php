<?php

namespace App\Http\Controllers;

use App\Models\UserCategory;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function form()
    {
        $categories = UserCategory::all();
        return view('form', ['categories' => $categories]);
    }
}
