<?php

namespace App\Http\Controllers\admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function show()
    {
        $data = Category::all();
        return view('Admin.categories', ['categories' => $data]);
    }

    public function addCategories(Request $request)
    {
        Category::create(['name' => $request->name]);

        return redirect()->back();
    }
}
