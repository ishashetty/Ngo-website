<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\item;
use View;
class OrderController extends Controller
{
    //
    public function orders()
    {
        $uid=collect(DB::select('Select cid from customer where email="'.session('email').'"'));
        // $order=collect(DB::select('Select * from orders where cid="'.$uid[0]->cid.'"'));
        $order=DB::table('orders')->join('item','orders.item_id','=','item.item_id')
        // ->join('orders','ordersList.item_id','=','orders.item_id')
        ->select('orders.*','item.item_name','item.price')->get();
        // dd($order);
                
        // dd($items);
        return View::make('orders')->with('order',$order);
    }
    public function ordersdesc($item_id)
    {
        $uid=collect(DB::select('Select cid from customer where email="'.session('email').'"'));
        // $order=collect(DB::select('Select * from orders where cid="'.$uid[0]->cid.'"'));
        $order=DB::table('orders')->join('item','orders.item_id','=','item.item_id')
        // ->join('orders','ordersList.item_id','=','orders.item_id')
        ->select('orders.*','item.*')->where('item.item_id',$item_id)->get();
        // dd($order[0]->price);
                
        // dd($items);
        return View::make('orderdesc')->with('order',$order);
    }
}
