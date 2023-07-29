<?php
// app/Models/CategoryOption.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryOption extends Model
{
    // ... (other code
    //)

    protected $guarded = [];

    // Define the relationship with the Category model (belongsTo)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
