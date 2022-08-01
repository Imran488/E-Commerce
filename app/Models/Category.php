<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['category_name','image','desc'];

    public function subCategories(){
        return $this->hasMany(Subcategory::class);
    }
}
