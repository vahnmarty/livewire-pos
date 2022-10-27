<?php

namespace App;

class Helpers
{
    public static function money($amount)
    {
        return '₱' . number_format($amount,2);
    }
    
}