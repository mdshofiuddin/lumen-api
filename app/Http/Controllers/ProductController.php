<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        //Show all Data get

        $products = Product::all();
        return response()->json($products);
    }



    public function store(Request $request)
    {
        //post a form

        $product = new Product();

        if($request->hasFile('photo')){
            $allowedExtension = ['pdf','jpg','png'];
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedExtension);

            if($check){
                $name = time().$file->getClientOriginalName();
                $file->move('images',$name);
                $product->photo = $name;
            }
        }

        $product->name      = $request->input('name');
        $product->email     = $request->input('email');
        $product->phone     = $request->input('phone');
        $product->district  = $request->input('district');

        $product->save();
        return response()->json($product);

    }



    public function show($id)
    {
        //get indivisual id

        $product = Product::find($id);
        return response()->json($product);
    }



    public function update(Request $request, $id)
    {
        //put a specific id

        $this->validate($request,[
            'name'      =>  'required',
            'email'     =>  'required',
            'phone'     =>  'required',
            'district'  =>  'required',
            // 'photo'     =>  'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('photo')){
            $allowedExtension = ['pdf','jpg','png'];
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $check = in_array($extension,$allowedExtension);

            if($check){
                $name = time().$file->getClientOriginalName();
                $file->move('images',$name);
                $product->photo = $name;
            }
        }

        $product->name      = $request->input('name');
        $product->email     = $request->input('email');
        $product->phone     = $request->input('phone');
        $product->district  = $request->input('district');

        $product->save();
        return response()->json($product);

    }


    public function destroy($id)
    {
        //delete a specific id

        $product = Product::find($id);
        $product->delete();
        return response()->json("Successfully Deleted");
    }
}
