<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function item(){
        return $this->hasOne(Item::class);
        //return $this->has(Item::class,'category_name', 'name');
    }
    public function isDeletable(){
    return $this->item()->count() === 0;
    }
}
