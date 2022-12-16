<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepositController extends Controller
{
    public function create(Request $request)
   {
    $validator=validator::make($request->all(),[
        'wallet_id'=>'required',
        'amount'=>'required'
   ]);
    
   if ($validator->fails()){
    return response()->json([
        'succes'=>false,
        'errors'=>$validator->errors()
    ],400);
};

   $deposits=Deposit::create([
    'wallet_id'=>$request->wallet_id,
    'amount'=>$request->amount
   ]);

    $acount=Wallet::find($request->wallet_id);
    $acount->savings=$acount->savings + $request->amount;
    $acount->save();
    return $deposits;
    }
}
