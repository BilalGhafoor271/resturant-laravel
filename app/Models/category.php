<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','status'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class,'category_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
