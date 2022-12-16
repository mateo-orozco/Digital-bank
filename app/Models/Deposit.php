<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'wallet_id',
        'amount'
    ];



   
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
}
