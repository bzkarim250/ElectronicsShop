<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Supplier::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 'phone' => 'required|numeric|min:8|max:11',
        $fields = $request->validate([
            'name'=>'string',
            'email'=>'string|email',
            'password'=>'string',
            'phone'=>'integer',
            'description'=>'string',
            'id_number'=>'integer',
            'id_image'=>'',
            'profile_image'=>'',
            'payment_card'=>'integer'
        ]);

        $id_img_url = Cloudinary::upload($fields['id_image']->getRealPath())->getSecurePath();
        $profile_img_url= Cloudinary::upload($fields['profile_image']->getRealPath())->getSecurePath();

        $supplier = new Supplier();
        $supplier->name = $fields['name'];
        $supplier->email = $fields['email'];
        $supplier->password = bcrypt($fields['password']);
        $supplier->phone = $fields['phone'];
        $supplier->description = $fields['description'];
        $supplier->id_number = $fields['id_number'];
        $supplier->id_image = $id_img_url;
        $supplier->profile_image = $profile_img_url;
        $supplier->payment_card = $fields['payment_card'];

        $supplier->save();

        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'hi , we recieved your request, we will let you know in 2 hours'
        ];
        Mail::to($fields['email'])->send(new MailNotify($data));

        return response($supplier,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Supplier::find($id);
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
        $supplier = Supplier::find($id);
        $supplier->update($request->all());
        return $supplier;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Supplier::destroy($id);
    }
}
