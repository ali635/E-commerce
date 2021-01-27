<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    use HasFactory;
    protected $table = 'order_product';
    protected $fillable =['quantity','product_id','order_id'];
    
}
