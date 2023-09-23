<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // AppServiceProvider -> boot -> Model::unguard(); -- this basically lets your model to be fillable
   // protected $fillable = ['name', 'price', 'stock_quantity', 'categories', 'description'];

    // This function filters each category from each product then returns all products with the same category
    public function scopeFilter($query, array $filters){
        if($filters['category'] ?? false){
            $query->where('categories', 'like', '%' .request('category'). '%');
        }
        // When you type something in seatch it gets saved on the search variable then it gets here to look for name, category and description if it matches the search it'll show it
        if($filters['search'] ?? false){
            $query->where('name', 'like', '%' .request('search'). '%')
                ->orWhere('description', 'like', '%' .request('search'). '%')
                ->orWhere('categories', 'like', '%' .request('search'). '%');
        }
    }

}
