<?php

namespace App\Http\Controllers;

use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use App\Models\User;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=Supplier::all();
        return view('dashboard.admin.Supplier.requests')->with('supplier',$users);
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
            'payment_card'=>'integer'
        ]);

        $id_img_url = Cloudinary::upload($request->id_image->getRealPath())->getSecurePath();
        $profile_img_url= Cloudinary::upload($request->profile_image->getRealPath())->getSecurePath();

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

        return redirect('/');
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
    public function approve($id)
    {
        $supplier=Supplier::find($id);
        $user=array("name"=>$supplier->name,"email"=>$supplier->email,"password"=>$supplier->password,"role_id"=>3);
         $newAccount=User::create($user);
         $newAccount->assignRole('supplier');

         $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'Congratulations, your account has been succesfully approved. you are now supplier'
        ];
        Mail::to($supplier->email)->send(new MailNotify($data));

        //  Supplier::destroy($id);

         return redirect('/supplier/getAll');
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
        $supplier=Supplier::find($id);
        $data = [
            'subject'=>'Electronics shop mail',
            'body'=>'Sorry, your account did not meet our requirements, please try again!'
        ];
        Mail::to($supplier->email)->send(new MailNotify($data));
        Supplier::destroy($id);
        return redirect('/supplier/getAll');
    }
}
