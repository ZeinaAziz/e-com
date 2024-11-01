<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function categories(){
        return $this->belongsToMany(Category::class,'category_product_pivot');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }


    protected static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
            $product->orders()->delete();
        });

        static::restoring(function($product) { // before delete() method call this
            $orders =$product->orders()->onlyTrashed()->get();
            foreach($orders as $order){
                $order->restore();
            }
        });

        // static::restoring(function($product) { // before delete() method call this
        //     $product->orders()->restore();
        // });

    }
}





