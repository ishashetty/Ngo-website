<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Mail;
class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function add(){
         //
         return view('Contact');
     }

    public function index(Request $request)
    {
        Mail::send(['text'=>'mail'],
            [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'message' => $request->get('message')
        ], function($message)
        {
            $message->from($request->get('email'));
            $message->to('sharmauser80@gmail.com')->subject('Contact form');
        });
        $response = [
            'status' => 'success',
            'msg' => 'Mail sent successfully',
        ];
        return response()->json([$response], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
