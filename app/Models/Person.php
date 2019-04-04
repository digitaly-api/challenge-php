<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Person extends Model
{
    protected $table = 'person';
    protected $fillable = ['name', 'lastName', 'birthDate'];
    protected $hidden = ['created_at', 'updated_at'];

    public function getAddress(): HasMany
    {
        return $this->hasMany('App\Models\Address', 'idPerson', 'id');
    }

    public function toArray(): array
    {
        $address = $this->getAddress()->getResults();

        return array_merge(parent::toArray(), [
            'address' => count($address) > 0 ? $address : null
        ]);
    }
}
