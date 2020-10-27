<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\ClaimedTrans;
use App\Charts\ReportChart;

class ReportChartController extends Controller
{
    public function index(){
        $unclaimed = Transaction::where('status', 'unclaimed')
        ->where('expiryDate', '>=', date('Y-m-d'))
        ->count();

        $claimed = ClaimedTrans::where('dateClaimed', date('Y-m-d'))->count();  
        $title = 'Report as of '.date('Y-m-d'); 
        $chart = new ReportChart;
        $chart->labels(['Unclaimed', 'Claimed']);
        $chart->dataset($title, 'doughnut', [$unclaimed, $claimed])
        ->backgroundColor(['#7f53ac', '#6972F0']);
        // return $claimed;

        // $chart = new ReportChart;
        // $chart->labels(['One', 'Two', 'Three', 'Four']);
        // $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        // $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        return view('transactions.report', compact('chart'));
    }
    
}
