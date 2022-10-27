<?php

namespace App\Models\Traits;
use Str;

trait BasicModel {

    public function getImagePreview()
    {
        
        return $this->image ?? url('img/hamburger.png');
    }

    public function getImagePreviewAttribute()
    {
        return $this->getImagePreview();
    }

}