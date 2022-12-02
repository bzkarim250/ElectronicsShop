<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return view('home')->with('products',$products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request ->validate([
            'title'=>'',
            'description'=>'',
            'price'=>'',
            'color'=>'',
            'size'=>'',
            'categories'=>'',
            'user_id'=>''
        ]);

        $product =  new Product();
        // $images=array();
        // foreach($fields['image'] as $image){
        //     $imgUrl = Cloudinary::upload($image->getRealPath())->getSecurePath();
        //     array_push($images,$imgUrl);
        // }
        $imgUrl = Cloudinary::upload($request->image->getRealPath())->getSecurePath();
       

        $product->title=$fields['title'];
        $product->description = $fields['description'];
        $product->image = $imgUrl;
        $product->price = $fields['price'];
        $product->color = $fields['color'];
        $product->size = $fields['size'];
        $product->categories=$fields['categories'];
        $product->user_id=$fields['user_id'];
        $product->save();
        return redirect('/allproducts');
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);

        return view('product')->with('product',$product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Product::destroy($id);
    }
    //for cart
    public function productList()
    {
        $products = Product::all();

        return view('products', compact('products'));
    }
    //for admin
    public function allproducts() 
    {
        $products=Product::all();
        return view('dashboard.admin.Products.allproducts')->with('products',$products); 
    }
}
