<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $product;
    protected $products;

    public function index(){
        return view('product.add');
    }

    public function create(Request $request)
    {
//        return $request->all();

        $this->product = new Product();
        $this->product->product_name = $request->product_name;
        $this->product->product_price = $request->product_price;
        $this->product->product_description = $request->product_description;
        $this->product->product_brand = $request->product_brand;
        $this->product->product_category = $request->product_category;
        $this->product->product_image = $request->product_image;

        $this->product->save();

        return redirect()->back()->with('message','Product Created Successfully..');
    }

    public function manage(){

        $this->products =  Product::orderBy('id','asc')->get();
        return view('product.manage', ['products'=>$this->products]);
    }

    public function edit($id){
        //return $id;
        $this->product = Product::find($id);

        return view('edit-product',['product' => $this->product]);
    }











}
