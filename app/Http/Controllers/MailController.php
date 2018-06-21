<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use DB;
use App\cart;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function send()
    {
           
             Mail::send(['text'=>'mail'],['name','ABC'],function($message){
             $email=session('email');
             $message->to($email,'To')->subject('Goonj-Product Purchase');
             $message->from("2015isha.shetty@ves.ac.in",'Goonj');
        });
        $trans=$this->addorder();
            if($trans==true){
              
                return redirect('/')->with('success','Transaction completed!');
            }
               
            else
                return redirect()->back()->with('error','Something went wrong!!! Transaction not completed');      
            
    }
    public function addorder(){

        $query=collect(DB::select( 'SELECT cid FROM customer where email= "'.session('email').'" limit 1'));
        $cid=$query[0]->cid;
        $trans=false;
        $query1=collect(DB::select( 'SELECT * FROM cart where cid= "'.$cid.'"'));
        foreach($query1 as $q){
            $cust=DB::table('orders')->insert(['item_id' => $q->item_id,'cid'=>$cid,'qty'=>$q->qty]);
            $query12=collect(DB::select( 'SELECT quantity FROM item where item_id= "'.$q->item_id.'"'));
            $stock=$query12[0]->quantity-$q->qty;
            if($stock==0){
                 $update1=DB::table('item')
                        ->where('item_id', $q->item_id)
                        ->update(['quantity' => $stock,'is_stock'=>0]);
                        $trans=true;
            }
            else{
                $update1=DB::table('item')
                        ->where('item_id', $q->item_id)
                        ->update(['quantity' => $stock]);
                        $trans=true;
            }
             
            
        }
         $done=DB::table('cart')->where('cid', '=', $cid)->delete();
         if($done){
           $trans=true;
            return $trans;
         }
         else
            return false;
        
    }
    

   
}
