<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    //


    public function create(Request $request)
   {
    $request->validator::make($request->all(),[
        'savings'=>'required|float',
        'user_id'=>'required',
   ]);
    
   if ($validator->fails()){
    return response()->json([
        'succes'=>false,
        'errors'=>$validator->errors()
    ],400);
};

   $wallets=Wallet::create([
    'savings'=>$request->savings,
    'user_id'=>$request->user_id
   ]);
         
         
         
         
    }
}
