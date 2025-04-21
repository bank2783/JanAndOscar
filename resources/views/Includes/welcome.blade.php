<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to My Website</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Navbar -->
    

    <!-- Hero Section -->
    <section class="bg-[#dd3333] text-white py-20">
        <div class="max-w-4xl text-white mx-auto text-center">
            <h1 class="text-5xl font-bold mb-6">Welcome to JanAndOscar</h1>
            <p class="text-xl text-[#ffc500] mb-8">We support all student </p>
            <a href="#" class="bg-white text-[#dd3333] px-6 py-3 rounded-lg font-semibold hover:bg-blue-50 transition duration-300">
                Get Started
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Our Features</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">🚀</div>
                    <h3 class="text-xl font-semibold mb-2">Fast Performance</h3>
                    <p class="text-gray-600">Our platform is optimized for speed and efficiency.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">🔒</div>
                    <h3 class="text-xl font-semibold mb-2">Secure & Reliable</h3>
                    <p class="text-gray-600">We prioritize your data security and reliability.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl text-blue-600 mb-4">💡</div>
                    <h3 class="text-xl font-semibold mb-2">Easy to Use</h3>
                    <p class="text-gray-600">User-friendly interface for seamless experience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-white shadow-lg mt-16">
        <div class="max-w-6xl mx-auto px-4 py-6">
            <div class="text-center text-gray-600">
                &copy; 2023 MyWebsite. All rights reserved.
            </div>
        </div>
    </footer>

</body>
</html>