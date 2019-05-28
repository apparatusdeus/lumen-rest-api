<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['customerId', 'name', 'cnp', 'created_at', 'updated_at'];
}