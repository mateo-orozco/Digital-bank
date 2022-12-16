<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    public function create(Request $request)
   {
    $validator=validator::make($request->all(),[
        'wallet_id_transmitter'=>'required',
        'wallet_reciver_id'=>'required',
        'amount'=>'required',
   ]);
    
   if ($validator->fails()){
    return response()->json([
        'succes'=>false,
        'errors'=>$validator->errors()
    ],400); 
    };

   $transactions=Transaction::create([
    'wallet_id_transmitter'=>$request->wallet_id_transmitter,
    'wallet_reciver_id'=>$request->wallet_reciver_id,
    'amount'=>$request->amount,
   ]);

    $acount1=Wallet::find($request->wallet_id_transmitter);
    $acount1->savings=$acount1->savings - $request->amount;
    $acount1->save();
    $acount2=Wallet::find($request->wallet_reciver_id);
    $acount2->savings=$acount2->savings + $request->amount;
    $acount2->save();
    return $transactions;
    }
}