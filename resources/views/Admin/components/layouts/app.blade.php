<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    
    <title>Document</title>
</head>
<body>
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64"> <!-- กำหนดความกว้างของ sidebar -->
            @include('admin.layout.sidebar')
        </div>

        <!-- Main Content -->
        <main class="flex-1 p-8"> <!-- flex-1 เพื่อให้ main content ขยายเต็มพื้นที่ที่เหลือ -->
            {{ $slot }}
        </main>
    </div>

    
</body>
</html>