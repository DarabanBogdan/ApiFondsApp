<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'Sold'=>'integer',
        'Debt'=>'boolean',
        'UserId'=>'integer'

    ];
}
