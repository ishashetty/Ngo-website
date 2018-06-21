<?php

namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;

class OAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function login(Google $google, Request $request)
   {
        $client = $google->client();
        if ($request->has('code')) {

            $client->authenticate($request->get('code'));
            $token = $client->getAccessToken();

            $plus = new \Google_Service_Plus($client);

            $google_user = $plus->people->get('me');

            $id = $google_user['id'];

            $userEmail = $google_user['emails'][0]['value'];
            
        //     $staff = Faculty::where('email', '=', $userEmail)->first();
        //     $student = Student::where('email_id','=', $userEmail)->first();

        //     if(isset($staff)){
        //         session(['e_id' => $staff->e_id]);
        //         $role = Role::where('e_id', '=', $staff->e_id)->get();

        //         $roles = array();
        //         $types = array();

        //         if($staff->type == 1){
        //             array_push($types, 1);
        //         }
        //         else{
        //             array_push($types, 2);
        //         }
                
        //         foreach($role as $r){
        //             array_push($roles, $r->roles_id);
        //         }
        //         session(['email' => $userEmail]);
        //         session(['first_name' => $staff->first_name]);
        //         session(['last_name' => $staff->last_name]);
        //         session(['roles' => $roles]);
        //         session(['types' => $types]);
        //         header("Cache-Control", "no-cache, no-store, must-revalidate");
        //         return redirect('/staff/home')->with('success','Login Successfull !');
        //     }
        //     else if(isset($student)){
        //         session(['uid' => $student->uid]);
        //         session(['email' => $userEmail]);
        //         return redirect('/student')->with('success','Login Successfull !');
        //     }
        //     else{
        //         return redirect('/')->with('error','Your record is not found ! Contact CMS Administrator.');
        //     }
        // } else {
        //     $auth_url = $client->createAuthUrl();
        //     return redirect($auth_url);
         }
    }
//     public function index()
//     {
//         //
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
}
