<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{

    use HasFactory;
    protected $fillable = [
        'savings'
    ];



   
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function deposit()
    {
        return $this->hasMany(Deposit::class);
    }






}