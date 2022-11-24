<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return $this->totalSales();
        return view('dashboard');
    }

    public function generateWidgets()
    {
        $data = array();

        $data[] = [
            'title' => 'Total Sales',
            'value' => number_format($this->totalSales(), 2)
        ];
    }

    public function totalSales($date_from = null, $date_to = null)
    {
        $query = Transaction::reportable();

        if($date_from && !$date_to){
            $query = $query->whereDate('created_at' , $date_from);
        }

        else if($date_from && $date_to){
            $query = $query->whereDate('created_at', '>=' , $date_from)->whereDate('created_at', '<=' , $date_to);
        }

        else{
            $query = $query->whereYear('created_at', date('Y'));
        }
        
        return $query->sum('total');
    }
}
