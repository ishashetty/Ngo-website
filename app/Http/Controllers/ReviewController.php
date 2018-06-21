<?php

namespace App\Http\Controllers;
use App\item;
use App\review;
use App\customer;
use DB;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //
    public function add_review(Request $request,$item_id)
    {
        // dd("$item_id");
        $name=$request->username;
        $email=$request->email;
        $reviews=$request->review;
        $rating=$request->rating;
        $cid=collect(DB::select('Select cid from customer where email="'.$email.'"')) ;
        $cust=DB::table('review')->insert(['item_id' => $item_id,'review' => $reviews,'rating' => $rating,'cid' => $cid[0]->cid,'name'=>$name,'date'=>date('Y-M-D')]);
        $rat=DB::select('Select avg(rating) as avg from review where item_id="'.$item_id.'"');
        $add=DB::update('Update item set rating='.$rat[0]->avg.' where item_id="'.$item_id.'"');
        $details=item::select('*')->where('item_id',$item_id)->get();
        $review=review::select('*')->where('item_id',$item_id)->get();
    
        // return view('product-details')->with('details',$details)->with('review',$review);
        // $query1=$this->featured($item_id);
        //dd($query1);
        // $item = DB::table('item')->get();
        // return $details;
            // return response()->json($post);
        return view('product-details')->with('details',$details)->with('review',$review)->with("success","Review added successfully");
    }
    public function display()
    {
        $cid=collect(DB::select('Select cid from customer where email="'.$email.'"')) ;
        $user_review=collect(DB::select('Select * from review where cid="'.$cid.'" and item_id="'.session('item_id').'"'));
        return view('review')->with('user_review',$user_review);
    }
}
