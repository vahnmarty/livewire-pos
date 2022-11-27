<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $widgets = $this->generateWidgets();

        return view('dashboard', compact('widgets'));
    }

    public function generateWidgets()
    {
        $data = array();

        $monthFirstDay = date('Y-m-01');
        $monthLastDay = date('Y-m-t');
        $weekFirstDay = date('Y-m-d', strtotime('-7 days'));
        $today = date('Y-m-d');

        # Sales
        $data[] = [
            'title' => 'Total Sales',
            'value' => number_format($this->totalSales()  * 12, 2),
        ];
        $data[] = [
            'title' => 'This Month Sales',
            'value' => number_format($this->totalSales($monthFirstDay, $monthLastDay), 2),
        ];
        $data[] = [
            'title' => 'Last 7 days Sales',
            'value' => number_format($this->totalSales($weekFirstDay, $today), 2),
        ];

        $data[] = [
            'title' => 'Today Sales',
            'value' => number_format($this->totalSales($today), 2),
        ];

        # Orders
        $data[] = [
            'title' => 'Total Orders',
            'value' => $this->countOrders() * 12
        ];
        $data[] = [
            'title' => 'This Month Orders',
            'value' => $this->countOrders($monthFirstDay, $monthLastDay)
        ];
        $data[] = [
            'title' => 'Last 7 days Orders',
            'value' => $this->countOrders($weekFirstDay, $today)
        ];
        $data[] = [
            'title' => 'Today Orders',
            'value' => $this->countOrders($today)
        ];

        # Average

        $data[] = [
            'title' => 'Avg Daily Sales',
            'value' => number_format(0, 2)
        ];

        $data[] = [
            'title' => 'Avg Monthly Sales',
            'value' => number_format(0, 2)
        ];

        $data[] = [
            'title' => 'Avg Daily Orders',
            'value' => 0
        ];
        $data[] = [
            'title' => 'Avg Monthly Orders',
            'value' => 0
        ];

        return $data;
    }

    public function totalSales($date_from = null, $date_to = null)
    {
        $query = Transaction::reportable();

        if(!$date_to){
            $date_to = $date_from;
        }

        if($date_from && $date_to){
            $query = $query->whereDate('created_at', '>=' , $date_from)->whereDate('created_at', '<=' , $date_to);
        }

        else{
            $query = $query->whereYear('created_at', date('Y'));
        }
        
        return $query->sum('total');
    }

    public function countOrders($date_from = null, $date_to = null)
    {
        $query = Transaction::reportable();

        if(!$date_to){
            $date_to = $date_from;
        }

        if($date_from && $date_to){
            $query = $query->whereDate('created_at', '>=' , $date_from)->whereDate('created_at', '<=' , $date_to);
        }

        else{
            $query = $query->whereYear('created_at', date('Y'));
        }
        
        return $query->count();
    }
}
