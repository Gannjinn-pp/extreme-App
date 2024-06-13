<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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

        Home::create($request->all());

        return redirect()->route('homes.index')
            ->with('success', 'Home created successfully.');
    }

    // 詳細表示
    public function show(Home $home)
    {
        return view('homes.show', compact('home'));
    }

    // 編集フォーム
    public function edit(Home $home)
    {
        return view('homes.edit', compact('home'));
    }

    // 更新処理
    public function update(Request $request, Home $home)
    {
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
        $home->delete();

        return redirect()->route('homes.index')
            ->with('success', 'Home deleted successfully.');
    }
}
