<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\book;
use App\Models\service;
use App\Models\inbox;
use App\Models\journal;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.administator',[
            'book' => book::all()->count(),
            'service' => service::all()->count(),
            'inbox' => inbox::all()->count(),
            'journal' => journal::all()->count(),
            'bookAnalytic' => $this->statistikaBook(),
            'inboxAnalytic' => $this->statistikaInbox(),
        ]);
    }

    private function statistikaBook(){
        $start = Carbon::now()->subWeek(1);
        $end = Carbon::now();
        $dates = CarbonPeriod::create($start, $end);
        $bookAnalytic = [];
        foreach ($dates as $date) {
            $_data = [];
            $_data['date'] = $date->format('Y-m-d');
            $_data['value'] = book::whereDate('created_at', $date)->count();
            $bookAnalytic[] = $_data;
        }
        return $bookAnalytic;
    }

    private function statistikaInbox(){
        $start = Carbon::now()->subWeek(1);
        $end = Carbon::now();
        $dates = CarbonPeriod::create($start, $end);
        $inboxAnalytic = [];
        foreach ($dates as $date) {
            $_data = [];
            $_data['date'] = $date->format('Y-m-d');
            $_data['terkirim'] = inbox::whereDate('created_at', $date)->where('status', 'terkirim')->count();
            $_data['dibalas'] = inbox::whereDate('created_at', $date)->where('status', 'dibalas')->count();
            $inboxAnalytic[] = $_data;
        }
        return $inboxAnalytic;
    }
}
