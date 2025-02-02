<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Livewire App' }}</title>
    <!-- Tailwind CSS -->
    <link href="/css/app.css" rel="stylesheet"> <!-- ใช้ไฟล์ที่คอมไพล์ผ่าน npm -->
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <!-- Header -->
    <livewire:layout.header />

    <!-- Content -->
    <main class="container mx-auto py-8">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <livewire:layout.footer />

    @livewireScripts
</body>
</html>
