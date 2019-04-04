<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = ['idPerson', 'postalCode', 'address', 'number', 'complement', 'state', 'country'];
    protected $hidden = ['created_at', 'updated_at'];
}
