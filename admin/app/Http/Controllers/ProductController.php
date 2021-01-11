<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   
    public function index()
    {
        return view('add_product');
    }
	public function create(Request $request)
	{
		  $this->validate($request, [
			'name' => 'required|max:30|min:3'

		],
		[
			'name' => 'Name field is required.',
			'description' => 'Description field is required.'
		]);
		
		
		$product         = new Product;
		$product->name   =$request->input('name'); 
		$product->description   =$request->input('description');
		$product->location   =$request->input('location'); 
		if($request->file('photo')!='')
            {
             	$this->validate($request, [
        			'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        		], [
        			'photo.max' => "Maximum file size to upload is 2MB (2048 KB). If you are uploading a photo, try to reduce its resolution to make it under 2MB"
        		]);
             
             $product->photo             = $request->file('photo')->store('image');
            }
			$product->pur_order_num   =$request->input('pur_order_num');
		$product->save();
		return redirect()->route('product')->with('status', 'Inserted Successfully');
		
	}
	public function view()
	{
		$view = Product::all();
		return view('view_product', array('product'=>$view));		
		
	}
	public function editproduct($id)
	{		
		$product= Product::find($id);
		return view('edit_product', array('product'=>$product));	
		
	}
	public function updateproduct($id,Request $request)
	{
		$product=Product::find($id);
		$product->name  = $request->input('name');
		$product->location   =$request->input('location');
		$product->description  = $request->input('description');
		$product->save();
		return redirect()->route('viewproduct')->with('status', 'Updated Successfully');
	}
	public function deleteproduct($id,Request $readdir)
	{
		Product::destroy($id);
		return redirect()->route('viewproduct')->with('status', 'Deleted  Successfully');
		
		
	}
}
