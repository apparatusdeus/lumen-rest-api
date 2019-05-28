<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = ['transactionId', 'customerId', 'amount', 'created_at', 'updated_at'];
}