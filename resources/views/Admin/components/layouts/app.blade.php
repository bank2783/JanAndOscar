<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  
    
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Document</title>
    @livewireStyles
</head>
<body class=" ">
    @livewireScripts
        
        <!-- Sidebar -->
        
             <!-- กำหนดความกว้างของ sidebar -->
            @include('admin.layout.sidebar')
        

        <!-- Main Content -->
        <main class="main lg:ml-[300px] duration-250"> <!-- flex-1 เพื่อให้ main content ขยายเต็มพื้นที่ที่เหลือ -->
            {{ $slot }}
        </main>
   

    
</body>
</html>