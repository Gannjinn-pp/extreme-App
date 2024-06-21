<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>温泉予約サイト</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 p-4">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold text-orange-600 mb-6">7日分のカレンダー</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="px-4 py-2">時間</th>
                        <!-- 画面サイズに応じて表示する日数を変更 -->
                        @for ($day = 1; $day <= 7; $day++)
                            <th class="px-4 py-2 hidden sm:table-cell">5/{{ $day + 7 }} (日)</th>
                        @endfor
                        <!-- スマホサイズのときは1日分のみ表示 -->
                        <th class="px-4 py-2 sm:hidden">5/8 (日)</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < 24; $i++)
                        <tr class="border-t">
                            <td class="border px-4 py-2 text-center">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:00</td>
                            <!-- 画面サイズに応じて表示する日数を変更 -->
                            @for ($day = 1; $day <= 7; $day++)
                                <td class="border px-4 py-2 text-center hidden sm:table-cell">
                                    <a href="#" class="block w-full h-full">〇</a>
                                </td>
                            @endfor
                            <!-- スマホサイズのときは1日分のみ表示 -->
                            <td class="border px-4 py-2 text-center sm:hidden">
                                <a href="#" class="block w-full h-full">〇</a>
                            </td>
                        </tr>
                        <tr class="border-t">
                            <td class="border px-4 py-2 text-center">{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}:30</td>
                            <!-- 画面サイズに応じて表示する日数を変更 -->
                            @for ($day = 1; $day <= 7; $day++)
                                <td class="border px-4 py-2 text-center hidden sm:table-cell">
                                    <a href="#" class="block w-full h-full">〇</a>
                                </td>
                            @endfor
                            <!-- スマホサイズのときは1日分のみ表示 -->
                            <td class="border px-4 py-2 text-center sm:hidden">
                                <a href="#" class="block w-full h-full">〇</a>
                            </td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
