<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\item;
use App\review;
use App\cart;

class ProductDetailsController extends Controller
{
    //
    public function product()
    {
        $query=collect(DB::select( "SELECT * FROM item limit 1"));
        return view('product-details')->with('query',$query);
    }

    public function addToCart(Request $request, $id){
        if(!empty(session('email')))
        {
            $item_no_val=intval($request->input('val'));
            $query12=collect(DB::select( 'SELECT * FROM item where item_id= "'.$id.'"limit 1'));
            
            if( $item_no_val > 5){
                   return redirect()->back()->with('error','Unauthorised Access');        
             }
            else
            {  
                $email=session('email');
                $query=collect(DB::select( 'SELECT cid FROM customer where email= "'.$email.'" limit 1'));
                $cid=$query[0]->cid;
            
                $query1=collect(DB::select( 'SELECT qty FROM cart where item_id= "'.$id.'" limit 1'));
                
                //To check if the product is newly added or is already added
                if($query1->count()==0 )
                {
                    //To check if the product is available
                    if( $query12[0]->is_stock==1 && $query12[0]->quantity>=$item_no_val)
                    {
                        $cust=DB::table('cart')->insert(['cid' => $cid,'item_id' => $id,'qty'=>$item_no_val]);
                        session(['cart'=>session('cart')+1]);
                    }
                    else{
                        return redirect()->back()->with('error','Not available in Stock');        
                    }
                }
                else{
                $qty=$query1[0]->qty;
                    if($qty+$item_no_val < 5 && $query12[0]->quantity>=$qty)
                        $update1=DB::table('cart')
                                ->where('item_id', $id)
                                ->update(['qty' => $item_no_val+$qty]);
                }
                $data= $this->show_cart($id,$cid);
            //  $details=item::select('*')->where('item_id',$id)->get();
                //$review=review::select('*')->where('item_id',$id)->get();
            
            // return view('product-details')->with('success','Added successfully to cart')->with('details',$details)->with('review',$review);;// array ( 'data' => $data));
                return redirect()->action('ProductDetails@show', ['id' => $id]);
                }

        }
        else{
        $qty=$query12[0]->qty;
            if($qty+$item_no_val <5 && $query12[0]->quantity>=$qty)
                $update1=DB::table('cart')
                        ->where('item_id', $id)
                        ->update(['qty' => $item_no_val+$qty]);
        }
       
    }
    public function show_cart()
    {
        
    }
}
