<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    const PAID = 'paid';
    const UNPAID = 'unpaid';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    // protected $guarded = [];
    protected $table = 'orders';
    protected $fillable =['customer_id','customer_phone','customer_name','total','locale','payment_method','status'];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['start_date', 'end_date', 'deleted_at'];


    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function user(){
        return $this -> belongsToMany(User::class,'customer_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
