<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 - Authentication Timeout</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fff9e6 0%, #ffeebb 100%);
            min-height: 100vh;
        }
        .hourglass {
            animation: flip 3s ease-in-out infinite;
        }
        @keyframes flip {
            0%, 100% { transform: rotate(0deg); }
            50% { transform: rotate(180deg); }
        }
        .pulse-slow {
            animation: pulse-slow 3s infinite;
        }
        @keyframes pulse-slow {
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
            <div class="hourglass inline-block mb-4">
                <div class="pulse-slow bg-amber-100 p-6 rounded-full inline-block">
                    <i class="fas fa-hourglass-end text-6xl text-amber-500"></i>
                </div>
            </div>
            <h1 class="text-6xl font-bold text-amber-600">419</h1>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Session Expired</h2>
        </div>
        
        <!-- Message -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <p class="text-gray-700 text-lg mb-4">
                Your authentication session has timed out due to inactivity. For security reasons, you need to sign in again to continue.
            </p>
            <div class="bg-amber-50 border-l-4 border-amber-500 p-4 text-left rounded mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-clock text-amber-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-amber-700">
                            Sessions automatically expire after a period of inactivity to protect your account.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <a href="#" class="bg-amber-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-amber-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-sign-in-alt"></i> Sign In Again
            </a>
            <a href="#" class="bg-white text-amber-600 border border-amber-600 px-6 py-3 rounded-lg font-medium hover:bg-amber-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-question-circle"></i> Get Help
            </a>
        </div>
        
        <!-- Session Information -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Session Information</h3>
            <div class="grid grid-cols-1 gap-3 text-left">
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Status:</span>
                    <span class="font-medium text-amber-600">Expired</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Reason:</span>
                    <span class="font-medium">Inactivity Timeout</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Solution:</span>
                    <span class="font-medium">Re-authentication Required</span>
                </div>
            </div>
        </div>
        
        <!-- Prevention Tips -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Tips to Prevent This</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-mouse-pointer text-amber-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Stay active on the page - sessions expire after prolonged inactivity.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-remember text-amber-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Use "Remember Me" option when signing in for longer sessions.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-save text-amber-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Save your work frequently to avoid losing progress.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved. | <a href="#" class="text-amber-600 hover:text-amber-800">Security Policy</a></p>
        </div>
    </div>
</body>
</html>