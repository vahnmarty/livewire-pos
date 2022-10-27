<?php

namespace App\Models;

use App\Models\Traits\BasicModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    use BasicModel;

    protected $fillable = [ 'name', 'description', 'image', 'active' ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
