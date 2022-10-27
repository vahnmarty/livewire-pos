<?php

namespace App\Models\Traits;
use Str;

trait BasicModel {

    public function getImagePreview()
    {
        return url('img/hamburger.png');
    }

}