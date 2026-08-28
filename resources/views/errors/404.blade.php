<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 15px); }
            100% { transform: translate(0, -0px); }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Animated 404 -->
        <div class="mb-8 floating">
            <h1 class="text-9xl font-bold text-indigo-600">404</h1>
        </div>
        
        <!-- Message -->
        <h2 class="text-3xl font-bold text-gray-800 mb-4">Oops! Page Not Found</h2>
        <p class="text-gray-600 text-lg mb-8 max-w-md mx-auto">
            The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
        </p>
        
        <!-- Search Bar -->
        <div class="relative max-w-md mx-auto mb-10">
            <input type="text" placeholder="Search our website..." 
                   class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent shadow-sm">
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-indigo-600 text-white p-2 rounded-md hover:bg-indigo-700 transition duration-300">
                <i class="fas fa-search"></i>
            </button>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-12">
            <a href="#" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go Home
            </a>
            <a href="#" class="bg-white text-indigo-600 border border-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-indigo-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-envelope"></i> Contact Support
            </a>
        </div>
        
        <!-- Helpful Links -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Popular Pages</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> About Us
                </a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Services
                </a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Blog
                </a>
                <a href="#" class="text-indigo-600 hover:text-indigo-800 transition duration-300 flex items-center gap-2">
                    <i class="fas fa-chevron-right text-xs"></i> Contact
                </a>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>
</html>