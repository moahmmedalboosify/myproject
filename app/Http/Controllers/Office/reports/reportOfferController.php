<?php

namespace App\Http\Controllers\Office\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reportOfferController extends Controller
{
    public function index(){

        return view('office.reports.report_offers');
    }
}
