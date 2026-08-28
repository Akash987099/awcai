<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 - Too Many Requests</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e1f5fe 100%);
            min-height: 100vh;
        }
        .speedometer {
            animation: bounce 2s ease-in-out infinite;
        }
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .pulse-gentle {
            animation: pulse-gentle 2s infinite;
        }
        @keyframes pulse-gentle {
            0% { transform: scale(1); }
            50% { transform: scale(1.03); }
            100% { transform: scale(1); }
        }
        .progress-bar {
            animation: progress 15s linear;
        }
        @keyframes progress {
            from { width: 100%; }
            to { width: 0%; }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Icon and Header -->
        <div class="mb-8">
            <div class="speedometer inline-block mb-4">
                <div class="pulse-gentle bg-blue-100 p-6 rounded-full inline-block">
                    <i class="fas fa-tachometer-alt text-6xl text-blue-500"></i>
                </div>
            </div>
            <h1 class="text-6xl font-bold text-blue-600">429</h1>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Too Many Requests</h2>
        </div>
        
        <!-- Message -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <p class="text-gray-700 text-lg mb-4">
                You've sent too many requests in a short period of time. Please slow down and try again in a moment.
            </p>
            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 text-left rounded mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-blue-700">
                            Rate limiting helps ensure fair usage for all users and protects our services from abuse.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Retry Timer -->
            <div class="mt-6 bg-gray-100 rounded-full h-3 overflow-hidden">
                <div class="progress-bar bg-blue-500 h-3 rounded-full"></div>
            </div>
            <p class="text-sm text-gray-600 mt-2">You can try again in <span id="countdown" class="font-bold">15</span> seconds</p>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <button id="retryBtn" disabled class="bg-blue-600 text-white px-6 py-3 rounded-lg font-medium opacity-50 cursor-not-allowed flex items-center justify-center gap-2">
                <i class="fas fa-redo"></i> Try Again <span id="retryText">(15s)</span>
            </button>
            <a href="#" class="bg-white text-blue-600 border border-blue-600 px-6 py-3 rounded-lg font-medium hover:bg-blue-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-book"></i> API Documentation
            </a>
        </div>
        
        <!-- Rate Limit Information -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Rate Limit Information</h3>
            <div class="grid grid-cols-1 gap-3 text-left">
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Limit Type:</span>
                    <span class="font-medium">Requests per minute</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Current Status:</span>
                    <span class="font-medium text-red-600">Limit Exceeded</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Reset Time:</span>
                    <span class="font-medium" id="resetTime">15 seconds</span>
                </div>
            </div>
        </div>
        
        <!-- Best Practices -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Best Practices</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-clock text-blue-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Implement exponential backoff in your applications - wait longer between retries after failures.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-database text-blue-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Cache responses when possible to reduce the number of API calls.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-code text-blue-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Check our API documentation for specific rate limits and best practices.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved. | <a href="#" class="text-blue-600 hover:text-blue-800">API Terms</a></p>
        </div>
    </div>

    <script>
        // Countdown timer functionality
        let timeLeft = 15;
        const countdownElement = document.getElementById('countdown');
        const retryTextElement = document.getElementById('retryText');
        const retryBtn = document.getElementById('retryBtn');
        const resetTimeElement = document.getElementById('resetTime');
        
        const countdown = setInterval(function() {
            timeLeft--;
            countdownElement.textContent = timeLeft;
            retryTextElement.textContent = `(${timeLeft}s)`;
            resetTimeElement.textContent = `${timeLeft} seconds`;
            
            if (timeLeft <= 0) {
                clearInterval(countdown);
                countdownElement.textContent = '0';
                retryTextElement.textContent = '';
                retryBtn.disabled = false;
                retryBtn.classList.remove('opacity-50', 'cursor-not-allowed');
                retryBtn.classList.add('hover:bg-blue-700', 'cursor-pointer');
                retryBtn.innerHTML = '<i class="fas fa-redo"></i> Try Again';
            }
        }, 1000);
        
        retryBtn.addEventListener('click', function() {
            if (!this.disabled) {
                // In a real application, this would retry the request
                window.location.reload();
            }
        });
    </script>
</body>
</html>