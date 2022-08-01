<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function viewReport()
    {
        $orders = Order::where('order_status','pending')->get();
        return view('admin.layouts.report.report_table', compact('orders'));
    }
    
    // other where clause: whereBetween, whereIn, whereNotIn, whereNull, whereNotNull, whereDate, whereMonth, whereDay, whereYear, whereTime, whereColumn , whereExists, whereRaw.
}
