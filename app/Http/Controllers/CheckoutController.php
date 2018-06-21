<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Input;

class CheckoutController extends Controller
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
            $data=collect(DB::select( 'SELECT *  FROM customer where email="'.$email.'"'));
            $data1=$this->call();
            $i=0;
                    foreach($data1 as $d){
                        $val[$i]=$d->price*$d->qty;
                    $i++;
                    }
             if(!empty($data)&& !empty($val))
            {
                $bill=$this->show_bill($val,$data);
                if($bill<=500)//free shipping only to purchases above 500
                {
                    $final_bill=$bill+50+20;

                }
                else
                $final_bill=$bill+20;
                if($data[0]->address!=null && $data[0]->pincode!=0 && $data[0]->mobile_number!=0){
                  $state=collect(DB::select('select regionName,stateName from region as r , state as s where r.state_id=s.state_id and r.pin_code="'.$data[0]->pincode.'"'));
                return view('checkout',array('data'=>$data))->with('bill',$bill)->with('final_bill',$final_bill)->with('stateVal',$state[0]->stateName)->with('regionVal',$state[0]->regionName);
                }
               return view('checkout',array('data'=>$data))->with('bill',$bill)->with('final_bill',$final_bill);
            }
             else if(empty($val)){
                $bill=0;
                $final_bill=0;
                if($data[0]->address!=null && $data[0]->pincode!=0 && $data[0]->mobile_number!=0){
                  $state=collect(DB::select('select regionName,stateName from region as r , state as s where r.state_id=s.state_id and r.pin_code="'.$data[0]->pincode.'"'));
                return view('checkout',array('data'=>$data))->with('bill',$bill)->with('final_bill',$final_bill)->with('stateVal',$state[0]->stateName)->with('regionVal',$state[0]->regionName);
                }
                return view('checkout',array('data'=>$data))->with('bill',$bill)->with('final_bill',$final_bill);
            }
            else
                return view('checkout');
        }
        else
              return view('checkout');
      }
    public function call(){
            $email=session('email');
            $query=collect(DB::select( 'SELECT cid FROM customer where email= "'.$email.'" limit 1'));
            $cid=$query[0]->cid;
            $data=collect(DB::select('SELECT i.item_id,item_name,price,qty FROM cart as c,item as i Where i.item_id=c.item_id and cid="'.$cid.'" order by item_id desc'));
            return $data;
    }
    public function show_bill($val)
    {
        $sum=0;
        for($i=0;$i<count($val);$i++){
            $sum=$sum+$val[$i];
        }
        return $sum;
    }
    

    public function update(Request $request)
    {
        $name = $request->input('add'); 
        $mobile = $request->input('mobile'); 
        $zip=$request->input('zip');
        $country=$request->input('country');
        $data=collect(DB::select( 'SELECT *  FROM customer where email="'.session('email').'"'));
        $cid=$data[0]->cid;
        if($data[0]->address==null && $data[0]->pincode==0 && $data[0]->mobile_number==0){
                    $insert1=DB::table('customer')
                    ->where('cid', $cid)
                    ->update(['address' => $name,'mobile_number' => $mobile,'pincode' => $zip]);
        }
        else if($data[0]->address!=$name || $data[0]->pincode!=$zip || $data[0]->mobile_number!=$mobile && $data[0]->address!=null){
           
                    $insert1=DB::table('customer')
                    ->where('cid', $cid)
                    ->update(['address' => $name,'mobile_number' => $mobile,'pincode' => $zip]);
        }
         if(!empty($data))
            {
                         return redirect()->action('CheckoutController@index');
               
            }
             
     }    
    public function destroy($id)
    {
        //
    }
}
