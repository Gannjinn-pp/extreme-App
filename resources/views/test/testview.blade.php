<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>温泉予約サイト</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <header class=" bg-orange-200 text-white py-4">
        <h1 class="text-gray-600 text-4xl font-bold text-center">温泉予約サイト</h1>
    </header>
    <main class="p-8">
        <section class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">リラックスできる温泉地</h2>
            <p class="text-lg">ここでは素晴らしい温泉をご紹介します。</p>
        </section>
    </main>
    <footer class="bg-blue-600 text-white text-center py-4 mt-8">
        <p>© 2024 温泉予約サイト</p>
    </footer>
</body>
</html>
