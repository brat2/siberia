<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $select = $request->input('categories') ?? [];

        $categories = UserCategory::select('name')->get();

        $users = User::with('categories:id,name')
            ->whereHas('categories', function ($query) use ($select) {
                $query->whereIn('name', $select);
            })->get();

        return view('admin', [
            'categories' => $categories,
            'users' => $users
        ]);
    }
}
