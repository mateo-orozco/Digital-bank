<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'wallet_id_transmitter',
        'wallet_reciver_id',
        'amount',
     ];

     public function walletTransmiter()
    {
        return $this->belongsTo(Wallet::class,'wallet_id_transmitter');
    }
    public function walletReciver()
    {
        return $this->belongsTo(Wallet::class,'wallet_reciver_id');
    }


}
