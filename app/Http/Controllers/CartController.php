<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty(session('email'))){
            $email=session('email');
            $data=$this->call();
           // return $data;
            foreach($data as $d){
               if($d->qty!=0)
                 $val[$d->item_id]=$d->price*$d->qty;
             else
                 $val[$d->item_id]=$d->price;
           }
            if(!empty($data)&& !empty($val))
            {
                $bill=$this->show_bill($val,$data);
                $final_bill=$bill+20;
                session(['bill'=> $final_bill]);
                return view('cart',array('data'=>$data,'val'=>$val))->with('bill',$bill)->with('final_bill',$final_bill);
            }
            else if(empty($val)){
                $bill=0;
                $final_bill=0;
                session(['bill'=> $final_bill]);
                return view('cart',array('data'=>$data))->with('bill',$bill)->with('final_bill',$final_bill);
            }
            else
                return view('cart');
        }
        else
          return view('cart');
    }

    
    public function call(){
            $email=session('email');
            $query=collect(DB::select('SELECT cid FROM customer where email= "'.$email.'" limit 1'));
            $cid=$query[0]->cid;
            $data=collect(DB::select('SELECT i.item_id,item_name,price,qty FROM cart as c,item as i Where i.item_id=c.item_id and cid="'.$cid.'" order by timestamp desc'));
            return $data;
    }
   

    public function show_bill($val,$data)
    {
        $sum=0;
       foreach($data as $d) {
            $sum=$sum+$val[$d->item_id];
        }
        return $sum;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $song =  Cart::where('item_id', $id)->delete();
            if(session('cart')>0)
               session(['cart'=>session('cart')-1]);
            else
               session(['cart'=>0]);
         return redirect()->action('CartController@index');
    }
    
}
