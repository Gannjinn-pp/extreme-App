<?php

namespace App\Http\Controllers;

use App\Models\HomeFavorite;
use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeFavoriteController extends Controller
{
    public function store(Request $request, $homeId)
    {
        $home = Home::findOrFail($homeId);

        if (!Auth::user()->homeFavorites()->where('home_id', $homeId)->exists()) {
            Auth::user()->homeFavorites()->create(['home_id' => $homeId]);
        }

        return redirect()->back()->with('success', 'Home added to favorites.');
    }

    public function destroy($homeId)
    {
        $favorite = Auth::user()->homeFavorites()->where('home_id', $homeId)->first();

        if ($favorite) {
            $favorite->delete();
        }

        return redirect()->back()->with('success', 'Home removed from favorites.');
    }
}
