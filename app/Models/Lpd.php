<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lpd extends Model
{
    use HasFactory;

    protected $table = 'lpd';
    protected $guarded = ['id'];
}
