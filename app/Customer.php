<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'cnp', 'created_at', 'updated_at'];

    public function transactions()
    {
        $this->hasMany('App\Transaction', 'customerId');
    }
}