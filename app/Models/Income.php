<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['description', 'amount', 'date', 'user_id'];
    protected $visible = ['id', 'description', 'amount','date','user_id'];

    use HasFactory;
}
