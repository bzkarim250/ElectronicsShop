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
        return Product::all();
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
            'title'=>'required|string',
            'description'=>'required',
            'image'=>'image|mimes:jpeg,jpg,png',
            'price'=>'required|integer',
            'color'=>'required|string',
            'size'=>'required|integer',
            'categories'=>'required|string',
        ]);

        $product =  new Product();
        
        $imgUrl = Cloudinary::upload($fields['image']->getRealPath())->getSecurePath();

        $product->title=$fields['title'];
        $product->description = $fields['description'];
        $product->image = $imgUrl;
        $product->price = $fields['price'];
        $product->color = $fields['color'];
        $product->size = $fields['size'];
        $product->categories=$fields['categories'];

        $product->save();

        return response([$product],201);
        

        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::find($id);
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
}
