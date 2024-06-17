<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class HomeController extends Controller
{
    use AuthorizesRequests; // トレイトの使用

    // 一覧表示
    public function index()
    {
        $homes = Home::all();
        return view('homes.index')
            ->with(['homes' => $homes]);
    }

    // 新規作成ホーム
    public function create()
    {
        return view(('homes.create'));
    }

    // 新規作成
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        // 確認: 認証されたユーザーIDを取得
        $userId = Auth::id();

        if (is_null($userId)) {
            return redirect()->route('homes.index')
                ->with('error', 'User must be logged in to create a home.');
        }

        $home = new Home([
            'name' => $request->name,
            'user_id' => $userId
        ]);
        $home->save();

        return redirect()->route('homes.index')
            ->with('success', 'Home created successfully.');
    }

    // 編集フォーム
    public function edit(Home $home)
    {
        return view('homes.edit', compact('home'));
    }

    // 更新処理
    public function update(Request $request, Home $home)
    {
        $this->authorize('update', $home);

        $request->validate([
            'name' => 'required',
        ]);

        $home->update($request->all());

        return redirect()->route('homes.index')
            ->with('success', 'Home updated successfully.');
    }

    // 削除処理
    public function destroy(Home $home)
    {
        $this->authorize('delete', $home);

        $home->delete();

        return redirect()->route('homes.index')
            ->with('success', 'Home deleted successfully.');
    }
}
