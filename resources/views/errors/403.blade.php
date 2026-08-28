<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Access Denied</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fef3f3 0%, #ffe5e5 100%);
            min-height: 100vh;
        }
        .forbidden-icon {
            animation: shake 1.5s ease-in-out infinite;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        .lock-pulse {
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Icon and Header -->
        <div class="mb-8">
            <div class="forbidden-icon inline-block mb-4">
                <div class="lock-pulse bg-red-100 p-6 rounded-full inline-block">
                    <i class="fas fa-ban text-6xl text-red-500"></i>
                </div>
            </div>
            <h1 class="text-6xl font-bold text-red-600">403</h1>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Access Forbidden</h2>
        </div>
        
        <!-- Message -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <p class="text-gray-700 text-lg mb-4">
                You don't have permission to access this page. This area is restricted to authorized users only.
            </p>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 text-left rounded mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-circle text-red-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            If you believe this is an error, please contact your system administrator.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <a href="#" class="bg-red-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="#" class="bg-white text-red-600 border border-red-600 px-6 py-3 rounded-lg font-medium hover:bg-red-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-user-shield"></i> Request Access
            </a>
        </div>
        
        <!-- Help Section -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Need Help?</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-question-circle text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Check if you're signed in with the correct account.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-envelope text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Contact the administrator if you need access to this resource.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-sync-alt text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Try refreshing the page or signing out and back in.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved. | <a href="#" class="text-red-600 hover:text-red-800">Privacy Policy</a></p>
        </div>
    </div>
</body>
</html>