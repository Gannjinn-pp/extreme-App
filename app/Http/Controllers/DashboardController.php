<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index() {
        $user = Auth::user();
        $today = Carbon::today();
        $reservations = Reservation::where('user_id', $user->id)
                                   ->where('start_time', '>=', $today)
                                   ->orderBy('start_time')
                                   ->get();


        return view('dashboard' , compact('reservations'));
    }
}
