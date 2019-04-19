<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public function addresses()
    {
    	return $this->hasMany('App\Address', 'id_person');
    }
}
