<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use App\Models\Traits\BasicModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    use HasUuid, BasicModel;

    protected $guarded = [];

    const TYPE_QUANTIFIABLE = 1;
    const TYPE_MENU = 2;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getType()
    {
        $type = $this->type;

        switch($type){
            case self::TYPE_MENU :
                return 'Menu';
                break;
            case self::TYPE_QUANTIFIABLE :
                return 'Quantifiable';
                break;
        }
    }
}
