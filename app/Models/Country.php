<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';
    protected $fillable = [
        'name',
        'code',
        'phonecode'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function states()
    {
        return $this->hasMany(State::class);
    }
}
