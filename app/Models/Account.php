<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Account extends Model
{
    use HasFactory;

    protected $fillable=[
        'Name',
        'Sold',
        'Debt',
        'UserId'

    ];


    protected $cast=[
        'Sold'=>'float',
        'Debt'=>'boolean',
        'UserId'=>'integer'

    ];



}
