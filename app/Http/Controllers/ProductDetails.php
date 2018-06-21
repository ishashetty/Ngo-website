<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Carbon\Carbon;
use Illuminate\Http\Request;
use App\item;
use App\review;
use App\customer;
use DB;
class ProductDetails extends Controller
{
   
    public function show($item_id)
    {
        $details=item::select('*')->where('item_id',$item_id)->get();
        $review=review::select('*')->where('item_id',$item_id)->get();
        if(!empty(session('item_id')))
        {
            session(['item_id'=>$item_id]);
        }
        else
        {
            session()->forget('item_id');
            session(['item_id'=>$item_id]);
        }
       
        return view('product-details')->with('details',$details)->with('review',$review);
    }
    //adding review
   
    public function featured($item_id)
    {
        $query=collect(DB::select('Select category from item where item_id="'.$item_id.'"'));
        $cat=$query[0]->category;
        $query1=collect(DB::select('Select item_name,item_id,price,images from item where category="'.$cat.'" and is_stock=1 and item_id!="'.$item_id.'" order by rating desc'));
        
        
        return $query1;
    }
    
    
}
