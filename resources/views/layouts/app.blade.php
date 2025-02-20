<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kumbo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="p-4 text-white bg-gray-800">
        <div class="container flex items-center justify-between mx-auto">
            <h1 class="text-2xl font-bold">Kumbo</h1>
            <ul class="flex space-x-4">
                <li><a href="/product" class="hover:underline">Products</a></li>
            </ul>
        </div>
    </nav>

    <div class="container p-6 mx-auto">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>