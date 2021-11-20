<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $select = $request->input('categories') ?? [];

        $categories = Category::select('id', 'name')->get();

        $clients = Client::with('categories:id,name')
            ->whereHas('categories', function ($query) use ($select) {
                $query->whereIn('categories.id', $select);
            })->get();

        return view('admin', [
            'categories' => $categories,
            'clients' => $clients
        ]);
    }
}
