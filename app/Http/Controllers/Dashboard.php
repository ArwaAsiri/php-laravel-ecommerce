<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductDetails;
use Illuminate\Support\Facades\Auth;


class Dashboard extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(/*Request $request*/){
      //  $user=$request ->user()->name;
      //  dd($user);

        return view('dashboard.index');
    }
    public function testView(){
        view('dashboard.test');
    }

    public function getProducts(Request $request) {
        
        $searchQuery = $request->search;
        $products = $searchQuery ? Product::where('productname', 'like', "%$searchQuery%")->get() : Product::all();
        return view('dashboard.products', compact('products'));
    }
    


    public function createProducts(Request $request){
        $request->validate([
            'Productname' => 'required|string|max:255',
        ],[
            'Productname.required' => 'The product Name field is required.',
        ]);
        
        $products=Product::Create([
            'productname'=>$request->Productname
        ]);

        $products->save();
        return redirect()->back();
    }
    public function del($id){

        $products=Product::find($id);
        $products->delete();
        return Redirect('/dashboard/products');

    }
    /*
    public function edit($produtname){
        $products=Product::find($produtname)->first(); //Returns all records unlike the where() function that returns only one record
        return view ('dashboard.edit',['products'=>$products]);
    }
*/
public function edit(Request $request){
    $products = Product::find($request->productid);
    $products->productname = $request->productname;
    $products->save();
    return Redirect('/dashboard/products');
}
     public function update(Request $request){

        $items=Product::where('id',$request->is)->update([
            'productname'=>$request->productname
        ]);//Returns all records unlike the where() function that returns only one record
       return Redirect('/dashboard/products');
    }

    public function search(Request $request){
        
        $products=Product::where('productname',$request->name)->get();
        return view ('dashboard.products',['products'=>$products]);
    }

/*
public function search(Request $request)
{
    // Retrieve the value of the 'name' input field from the form
    $productName = $request->input('name');

    // Perform the search using the retrieved value
    $products = Product::where('productname', $productName)->get();

    // Pass the search results to the view
    return view('dashboard.products', ['products' => $products]);
}*/

public function showAll(){
        
    $products=Product::all();
    return view('dashboard.showall',['products'=>$products]);
}


    public function test(){
       //mainly ues elequent, only if we need DB we use it, DB is used to connect two tables, AKA inner join
       //$data=DB::select('select * from products'); //--> then we write a query in the workbench
       //$data=DB::table('products')-> where('productname','iphone')->get();
       $data=DB::table('products')
       -> join('product_details','products.id','=','product_details.productid')
       ->get();
        return Response()->json($data);
    }

    public function getProductDetails(Request $request){
       // return($request);
      
       $productDetails=ProductDetails::all();
        $products=Product::all();

      $data=DB::table('products')
      ->join('product_details','products.id','=','product_details.productid')
      ->select('products.id','products.productname','product_details.color','product_details.price','product_details.qty',
      'product_details.description')->get();
      //dd($request);
        return view('dashboard.productdetails',['productdetails'=>$productDetails,'products'=>$products]);
    }

    public function createProductDetails(Request $request)
{
    //return($request);
    $validate = $request->validate([
        'color' => 'required',
        'price' => 'required|numeric',
        'qty' => 'required|numeric',
        'des' => 'required|string|max:255',
      //  'productid' => 'required'
    ],[
     'color.required' => 'The color field is required.',
    'price.required' => 'The price field is required.',
    'qty.required' => 'The qty field is required.',
    'des.required' => 'The description field is required.',
    'des.string' => 'The description must be a string.',
    'des.max' => 'The description may not be greater than 255 characters.',
    //'productid.required' => 'The productid field is required.'

    ]);

    $productdetails = ProductDetails::create([
        'color' => $request->color,
        'price' => $request->price,
        'qty' => $request->qty,
        'description' => $request->des,
        'productid' => $request->product
    ]);

    // Save the product details
    $productdetails->save();

    return redirect('/dashboard/getproductdetails');
}
    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }

    
}
