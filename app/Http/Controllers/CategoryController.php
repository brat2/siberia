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

        $users = User::join('user_user_category as cat_us', 'cat_us.user_id', '=', 'users.id')
            ->join('user_categories as cat', 'cat_us.user_category_id', '=', 'cat.id')
            ->whereIn('cat.name', $select)
            ->select('users.id', 'users.name', 'users.email', 'cat.name as categories')
            ->get();

        // dd($users);

        return view('admin', [
            'categories' => $categories,
            'users' => $users
        ]);
    }
}
