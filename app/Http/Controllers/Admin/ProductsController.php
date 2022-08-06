<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product as Product;
use App\Brand as Brand;
use App\Category as Category;
use Validator;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('Admin.Products.product_list',['products' => $products]);
    }
    
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('Admin.Products.product_creation_form', ['brands'=> $brands, 'categories'=> $categories]);
    }
    
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $rule = [
            'category'=> 'required',
            'brand'=> 'required',
            'name'=> 'required| min:3| max: 191',
            'price'=> 'required| integer',
            'size'=> 'required',
            'description'=> 'required| min: 5| max: 1000',
            'prescription'=> 'required',
            'stock'=> 'required| integer',
            'shipping_price'=> 'required| integer',
        ];

        $valid = Validator::make($request->all(),$rule);

        if($valid->fails()){
            // return response()->json($valid->errors());
            return redirect()->back()->with('errors',$valid->errors());
        }else{
            if($request->hasFile('image')){
                $image_file = $request->file('image');
                $image_exe = $image_file->getClientOriginalExtension();
                $image_name = rand(123456789,999999999).'.'.$image_exe;
                $upload_path = public_path('uploads/');
                
                $brand = Brand::where('name', $request->brand)->first();
                $category = Category::where('name', $request->category)->first();

                $data = array();
                $data['name'] = $request->name;
                $data['price'] = $request->price;
                $data['description'] = $request->description;
                $data['sale_type'] = $request->sale_type;
                $data['brand_id'] = $brand->id;
                $data['category_id'] = $category->id;
                
                if($request->status == "on"){
                    $data['status'] = "Active";
                }else{
                    $data['status'] = "Inactive";
                }
                $data['size'] = $request->size." ".$request->retail_quantity;
                $data['prescription'] = $request->prescription;
                if($request->wholesale == "on"){
                    $data['wholesale'] = $request->wholesale;
                    $data['wholesale_size'] = $request->wholesale_size." ".$request->wholesale_quantity;
                    $data['wholesale_price'] = $request->wholesale_price;
                    $data['wholesale_stock'] = $request->wholesale_stock." ".$request->wholesale_stock_quantity;
                }
                $data['stock'] = $request->stock;
                $data['shipping_cost'] = $request->shipping_price;
                $data['image'] = $image_name;

                $create_product = Product::create($data);

                if($create_product){
                    $image_file->move($upload_path, $image_name);
                    return redirect()->back()->with('success','record created!');
                }else{
                    return redirect()->back()->with('errors','could not create record');
                }
            }else{
                return redirect()->back()->with('errors','product image is required');
            }
        }
    }
    
    public function show($id)
    {
        return response()->json("product details");
    }

    public function edit($id)
    {
        // return response()->json("product edit form");
        $categories = Category::all();
        $product = Product::find($id);
        $brands = Brand::all();

        $brand = Brand::find($product->brand_id);
    $category = Category::find($product->category_id);

        // echo json_encode($brand);
        // exit;

        return view('Admin.Products.product_edit_form',['product'=> $product, 
        'categories'=> $categories, 'brands'=> $brands, 'category'=> $category, 'brand'=> $brand]);
    }

    public function update(Request $request, $id)
    {
        // return response()->json("product update handler");
        // return response()->json($request->all());

        $rule = [
            'category'=> 'required',
            'brand'=> 'required',
            'name'=> 'required| min:3| max: 191',
            'price'=> 'required| integer',
            'size'=> 'required',
            'description'=> 'required| min: 5| max: 1000',
            'prescription'=> 'required',
            'stock'=> 'required| integer',
            'shipping_price'=> 'required| integer',
        ];
        
        $valid = Validator::make($request->all(),$rule);

        $brand = Brand::find($request->brand);
        $category = Category::find($request->category);

        $data = array();
        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['description'] = $request->description;
        $data['sale_type'] = $request->sale_type;
        $data['brand_id'] = $brand->id;
        $data['category_id'] = $category->id;
        
        if($request->status == "on"){
            $data['status'] = "Active";
        }else{
            $data['status'] = "Inactive";
        }
        $data['size'] = $request->size." ".$request->retail_quantity;
        $data['prescription'] = $request->prescription;
        if($request->wholesale == "on"){
            $data['wholesale'] = $request->wholesale;
            $data['wholesale_size'] = $request->wholesale_size." ".$request->wholesale_quantity;
            $data['wholesale_price'] = $request->wholesale_price;
            $data['wholesale_stock'] = $request->wholesale_stock." ".$request->wholesale_stock_quantity;
        }
        $data['stock'] = $request->stock;
        $data['shipping_cost'] = $request->shipping_price;

        
        if($valid->fails()){
            // return response()->json($valid->errors());
            return redirect()->back()->with('errors',$valid->errors());
        }else{
            if($request->hasFile('image')){
                $image_file = $request->file('image');
                $image_exe = $image_file->getClientOriginalExtension();
                $image_name = rand(123456789,999999999).'.'.$image_exe;
                $upload_path = public_path('uploads/');
                
                $data['image'] = $image_name;

                $product_to_update = Product::find($id);

                $update_product = $product_to_update->update($data);

                if($update_product){
                    $image_file->move($upload_path, $image_name);
                    return redirect()->back()->with('success','Product updated!');
                }else{
                    return redirect()->back()->with('errors','Could not update product');
                }
            }else{
                $product_to_update = Product::find($id);

                $update_product = $product_to_update->update($data);
                return redirect()->back()->with('success','Product updated!');
            }
        }

        // $update_product = $product_to_update->update($request->all());

        // if($update_product){
        //     return redirect()->back()->with('success', 'Product successfully updated!');
        // }else{
        //     return redirect()->back()->with('errors', 'Error! Product Could not update successfully');
        // }
    }
    
    public function destroy($id)
    {
        // return response()->json("product delete handler");
        $product_to_delete = Product::find($id);

        $delete_product = $product_to_delete->delete();

        if($product_to_delete){
            return redirect()->back()->with('success', 'Product deleted!');
        }else{
            return redirect()->back()->with('errors', 'Product could not delete successfully!');
        }return redirect()->back()->with('success', 'Product deleted!');
    }
}
