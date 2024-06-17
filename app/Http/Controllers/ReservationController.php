<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    // 一覧表示
    public function index()
    {
        $reservations = Reservation::all();
        $homes = Home::all();
        return view('reservations.index', [
            'reservations' => $reservations,
            'homes' => $homes
        ]);
    }

    // 新規作成フォーム
    public function create()
    {
        $homes = Home::all();
        return view('reservations.create', ['homes' => $homes]);
    }

    // 新規予約作成
    public function store(Request $request)
    {
        $request->validate([
            'home_id' => 'required',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'bathing_type' => 'required|in:bath,shower',
        ]);

        // 重複確認
        $overlap = Reservation::where('home_id', $request->home_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

        if ($overlap) {
            return back()->withErrors(['error' => '重複する予約時間があります']);
        }

        // ユーザーIDを追加して予約を作成
        Reservation::create(array_merge($request->all(), ['user_id' => auth()->id()]));

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation created successfully.');
    }

    // 詳細表示
    public function show(Reservation $reservation)
    {
        return view('reservations.show', compact('reservation'));
    }

    // 編集フォーム
    public function edit(Reservation $reservation)
    {
        $homes = Home::all();
        return view('reservations.edit', compact('reservation', 'homes'));
    }

    // 更新処理
    public function update(Request $request, Reservation $reservation)
    {
        $request->validate([
            'home_id' => 'required',
            'start_time' => 'required|date_format:Y-m-d\TH:i',
            'end_time' => 'required|date_format:Y-m-d\TH:i|after:start_time',
            'bathing_type' => 'required|in:bath,shower',
        ]);

        // 重複チェック（更新時）
        $overlap = Reservation::where('home_id', $request->home_id)
            ->where('id', '!=', $reservation->id)
            // 自分を重複認識させないようにする
            ->where(function ($query) use ($request) {
                $query->whereBetween('start_time', [$request->start_time, $request->end_time])
                    ->orWhereBetween('end_time', [$request->start_time, $request->end_time]);
            })->exists();

            if ($overlap) {
                return back()->withErrors(['error' => '重複する予約があります']);
            }

            // データの更新
            $reservation->update($request->all());

            return redirect()->route('reservations.index')
                ->with('success', 'Reservation updated successfully.');
    }

    // 削除処理
    public function destroy(Reservation $reservation)
    {
        $reservation->delete();

        return redirect()->route('reservations.index')
            ->with('success', 'Reservation deleted successfully.');
    }
}
