<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumbo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Kumbo</h1>
            <ul class="flex space-x-4">
                <li><a href="/product" class="hover:underline">Products</a></li>
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>
    @stack('scripts')
</body>
</html>