<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Shopping extends Controller
{
    public function ShowListItemsPhone(Request $request){
$data=DB::table('products')
->join('product_details','products.id','=','product_details.productid')
->get();
$tax=0.15;
$discount=10;
foreach($data as $key=> $row){
    $data[$key]->total=($data[$key]->price*$tax)+$data[$key]->price;
    $data[$key]->discount=$discount;
    $data[$key]->tax=$tax;
    $data[$key]->net=$data[$key]->total-$data[$key]->discount;
   
}
//dd($data);
        return view('shopping.list-items',['data'=>$data]);
    }

    public function ShowDetailsPhone($id){
        $data=DB::table('products')
        ->join('product_details','products.id','=','product_details.productid')
        ->where('product_details.id','=',$id)
        ->first();
        $tax=0.15;
        $discount=10;
        $data->total=($data->price*$tax)+$data->price;
        $data->discount=$discount;
        $data->tax=$tax;
        $data->net=$data->total-$data->discount;
       // dd($data);
                return view('shopping.details',['data'=>$data]);
            }
           
         public function Add_to_cart(Request $request, $id){
            $userid=$request->user()->id; //get current user id
            $data=DB::table('products')
            ->join('product_details','products.id','=','product_details.productid')
            ->where('product_details.id','=',$id)
            ->first();

            $tax=0.15;
            $discount=10;
            $data->total=($data->price*$tax)+$data->price;
            $data->discount=$discount;
            $data->tax=$tax;
            $data->net=$data->total-$data->discount;

            $row=[
                'productid'=>$data->id,
                'price'=>$data->price,
                'qty'=>$data->qty,
                'tax'=>$data->tax,
                'total'=>$data->total,
                'discount'=>$data->discount,
                'net'=>$data->net,
                'Userid'=>$userid


            ];
            DB::table('cart')->insert($row);

            $count= DB::table('cart')
            ->where('Userid','=',$userid)
            ->count();


            Session::put('count',$count);
            return redirect()->back();
            

            //dd($data);


         }   
         public function showCart() {
            $userid=auth()->user()->id;
            $data = DB::table('cart')
                ->join('product_details', 'product_details.id', '=', 'cart.Productid')
                ->where('cart.Userid',$userid)
                ->get();
                
                $total = DB::table('cart')
                ->join('product_details', 'product_details.id', '=', 'cart.Productid')
                ->where('cart.Userid', $userid)
                ->sum('cart.Price');
        
            return view('shopping.cart', ['data' => $data, 'total' => $total]);
        }

        
        

}
