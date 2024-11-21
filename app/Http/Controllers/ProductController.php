<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        // $products=Product::get();
        return view('products.index', ['products' => Product::get()]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'required|max:10000'
        ]);

        //store data
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('product'), $imageName);

        $product = new Product;
        $product->image = $imageName;
        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Created !!!');
    }
    public function edit($id)
    {
        $product = Product::where('id', $id)->first();
        return view('products.edit', compact("product"));
    }
    public function delete($id)
    {
        $product = DB::table('products')->where('id', '=', $id)->delete();
        return redirect()->back()->withSuccess('Product Deleted !!!');
        // return back();
    }
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'image' => 'nullable|max:10000'
        ]);

        $product = Product::where('id', $id)->first();
        if (isset($request->image)) {
            //store data
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('product'), $imageName);
            $product->image = $imageName;
        }

        $product->name = $request->name;
        $product->description = $request->description;

        $product->save();
        return back()->withSuccess('Product Updated !!!');
    }
}
