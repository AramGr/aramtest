<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class ProductController extends Controller
{
    public function show()
    {
        $category = Category::all();
        $product = Product::with('category')->get();
        return view('Admin.products', ['products' => $product, 'categories' => $category]);
    }

    public function addProducts(Request $request)
    {
        $this->validate($request, [
            'image' => 'required | mimes:jpeg,jpg,png | max:1000',
            'name' => 'required|min:4',
            'description' => 'required|min:25',
            'category' => 'required'
        ]);

        $image = Input::file('image');
        $imageName = $image->getClientOriginalName().time();
        $image->move('uploads', $imageName);

        $categoryId = Category::where('name', '=', $request->category)->get()[0]->id;

        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->category_id = $categoryId;
        $product->image = $imageName;
        $product->save();

        return redirect()->back();
    }

    public function showProduct($id)
    {
        $data = Product::with('category')->find($id);

        return view('Admin.product', ['product' => $data]);
    }

    public function showProductsByCategory(Request $request)
    {
        $data = DB::select("SELECT products.name AS productName, image, description, categories.name AS categoryName FROM products LEFT JOIN categories ON categories.id=category_id 
                                  WHERE categories.name = '$request->category'");
        return view('Admin.productCategories', ['products' => $data]);
    }
}
