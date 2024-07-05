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

        // 現在のお気に入りを取得
        $favorite = Auth::user()->homeFavorite;

        // 既にお気に入りが存在する場合の処理
        if ($favorite && $favorite->home_id == $homeId) {
            return redirect()->back()->with('error', 'すでにお気に入りが存在します！');
        }

        // 新しいお気に入りを追加
        Auth::user()->homeFavorite()->create(['home_id' => $homeId]);

        return redirect()->back()->with('success', 'お気に入りに追加されました');
    }


    public function destroy($homeId)
    {
        $favorite = Auth::user()->homeFavorite;

        if ($favorite && $favorite->home_id == $homeId) {
            $favorite->delete();
            return redirect()->back()->with('success', 'Home removed from favorites.');
        }

        return redirect()->back()->with('error', 'This home is not in your favorites.');
    }


}
