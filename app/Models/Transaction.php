<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=[
        'Title',
        'Details',
        'Sold',
        'AccountId'

    ];

    protected $cast=[
        'Sold'=>'float',
        'AccountId'=>'integer'

    ];

}
