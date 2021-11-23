<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $select = $request->old('categories') ?? [];

        $categories = Category::select('id', 'name')->get();

        $clients = Client::with('categories:id,name')
            ->whereHas('categories', function ($query) use ($select) {
                $query->select('clients.id')
                    ->whereIn('categories.id', $select)
                    ->groupBy('clients.id')
                    ->havingRaw('count(*) = ?', [count($select)]);
            })->get();

        return view('admin', [
            'categories' => $categories,
            'clients' => $clients
        ]);
    }

    public function select()
    {
        return redirect()->route('index')->withInput();
    }
}
