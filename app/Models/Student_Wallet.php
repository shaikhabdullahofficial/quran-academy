<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment_Detail;

class Student_Wallet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasWallet(){
        return $this->hasOne(Payment_Detail::class, 'wallet_id' , 'id');
    }
}
