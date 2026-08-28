<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - Internal Server Error</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fef2f2 0%, #fee2e2 100%);
            min-height: 100vh;
        }
        .server-pulse {
            animation: server-pulse 2s ease-in-out infinite;
        }
        @keyframes server-pulse {
            0%, 100% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }
        .gear-rotate {
            animation: gear-rotate 3s linear infinite;
        }
        @keyframes gear-rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .status-pulse {
            animation: status-pulse 2s infinite;
        }
        @keyframes status-pulse {
            0%, 100% { background-color: #ef4444; }
            50% { background-color: #dc2626; }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Icon and Header -->
        <div class="mb-8">
            <div class="server-pulse inline-block mb-4 relative">
                <div class="bg-red-100 p-6 rounded-full inline-block">
                    <i class="fas fa-server text-6xl text-red-500"></i>
                    <i class="fas fa-cog gear-rotate text-2xl text-red-400 absolute top-2 right-2"></i>
                    <i class="fas fa-cog gear-rotate text-xl text-red-400 absolute bottom-2 left-2" style="animation-direction: reverse;"></i>
                </div>
            </div>
            <h1 class="text-6xl font-bold text-red-600">500</h1>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Internal Server Error</h2>
        </div>
        
        <!-- Message -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <p class="text-gray-700 text-lg mb-4">
                Something went wrong on our servers. Our technical team has been notified and is working to fix the issue.
            </p>
            <div class="bg-red-50 border-l-4 border-red-500 p-4 text-left rounded mb-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-exclamation-triangle text-red-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-red-700">
                            This is not your fault - it's an issue on our side. Please try again in a few moments.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Status Indicator -->
            <div class="flex items-center justify-center gap-4 mt-6">
                <div class="flex items-center gap-2">
                    <div class="status-pulse w-3 h-3 rounded-full"></div>
                    <span class="text-sm text-gray-600">Service Disrupted</span>
                </div>
                <div class="flex items-center gap-2">
                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    <span class="text-sm text-gray-600">Team Notified</span>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <button id="retryBtn" class="bg-red-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-redo"></i> Try Again
            </button>
            <a href="#" class="bg-white text-red-600 border border-red-600 px-6 py-3 rounded-lg font-medium hover:bg-red-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-history"></i> Check Status Page
            </a>
        </div>
        
        <!-- System Status -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">System Status</h3>
            <div class="grid grid-cols-1 gap-3 text-left">
                <div class="flex justify-between items-center py-2 border-b">
                    <span class="text-gray-600">Web Server:</span>
                    <div class="flex items-center gap-2">
                        <div class="status-pulse w-2 h-2 rounded-full"></div>
                        <span class="font-medium text-red-600">Issues Detected</span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-2 border-b">
                    <span class="text-gray-600">Database:</span>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-yellow-500 rounded-full"></div>
                        <span class="font-medium text-yellow-600">Degraded</span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-2 border-b">
                    <span class="text-gray-600">CDN:</span>
                    <div class="flex items-center gap-2">
                        <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                        <span class="font-medium text-green-600">Operational</span>
                    </div>
                </div>
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-600">Response Time:</span>
                    <span class="font-medium text-red-600">> 5s</span>
                </div>
            </div>
        </div>
        
        <!-- What You Can Do -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">What You Can Do</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-sync-alt text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Refresh the page in a few minutes - we're working to restore service quickly.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-bookmark text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Save your work locally if possible, then try again later.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-rss text-red-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Check our status page for real-time updates on the issue.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved. | 
               <a href="#" class="text-red-600 hover:text-red-800">Status Page</a> | 
               <a href="#" class="text-red-600 hover:text-red-800">Support</a>
            </p>
        </div>
    </div>

    <script>
        // Retry button functionality
        document.getElementById('retryBtn').addEventListener('click', function() {
            const btn = this;
            const originalText = btn.innerHTML;
            
            // Show loading state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Retrying...';
            btn.disabled = true;
            
            // Simulate retry attempt
            setTimeout(() => {
                // In a real application, this would check if the service is back
                // For demo purposes, we'll just reload the page
                window.location.reload();
            }, 2000);
        });
        
        // Simulate status updates
        setTimeout(() => {
            // This would typically come from a status API
            console.log('Service status check completed');
        }, 5000);
    </script>
</body>
</html>