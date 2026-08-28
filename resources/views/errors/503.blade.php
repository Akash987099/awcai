<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 - Service Unavailable</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0fdf4 0%, #dcfce7 100%);
            min-height: 100vh;
        }
        .maintenance-pulse {
            animation: maintenance-pulse 2s ease-in-out infinite;
        }
        @keyframes maintenance-pulse {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }
        .tool-spin {
            animation: tool-spin 4s linear infinite;
        }
        @keyframes tool-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .progress-wave {
            animation: progress-wave 2s ease-in-out infinite;
        }
        @keyframes progress-wave {
            0%, 100% { transform: scaleX(1); }
            50% { transform: scaleX(1.05); }
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 10px); }
            100% { transform: translate(0, -0px); }
        }
    </style>
</head>
<body class="flex items-center justify-center p-4">
    <div class="max-w-2xl w-full text-center">
        <!-- Icon and Header -->
        <div class="mb-8">
            <div class="maintenance-pulse inline-block mb-4 relative">
                <div class="bg-green-100 p-6 rounded-full inline-block">
                    <i class="fas fa-tools text-6xl text-green-500"></i>
                    <i class="fas fa-wrench tool-spin text-2xl text-green-400 absolute top-2 right-2"></i>
                    <i class="fas fa-screwdriver text-xl text-green-400 absolute bottom-2 left-2 floating"></i>
                </div>
            </div>
            <h1 class="text-6xl font-bold text-green-600">503</h1>
            <h2 class="text-3xl font-bold text-gray-800 mt-2">Service Unavailable</h2>
        </div>
        
        <!-- Message -->
        <div class="bg-white rounded-xl shadow-md p-6 mb-8">
            <p class="text-gray-700 text-lg mb-4">
                We're currently performing maintenance or experiencing temporary overload. The service will be back shortly.
            </p>
            <div class="bg-green-50 border-l-4 border-green-500 p-4 text-left rounded mb-6">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-green-500 mt-1"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700">
                            Scheduled maintenance ensures better performance and new features. Thank you for your patience.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Maintenance Progress -->
            <div class="mt-6">
                <div class="flex justify-between text-sm text-gray-600 mb-2">
                    <span>Maintenance Progress</span>
                    <span id="progressPercent">65%</span>
                </div>
                <div class="bg-gray-200 rounded-full h-3 overflow-hidden">
                    <div id="progressBar" class="progress-wave bg-green-500 h-3 rounded-full" style="width: 65%"></div>
                </div>
                <p class="text-sm text-gray-500 mt-2" id="maintenanceMessage">Applying system updates...</p>
            </div>
        </div>
        
        <!-- Estimated Time -->
        <div class="bg-green-50 border border-green-200 rounded-lg p-4 mb-8 max-w-md mx-auto">
            <div class="flex items-center justify-center gap-3">
                <i class="fas fa-clock text-green-600"></i>
                <div>
                    <p class="text-sm text-gray-700">Estimated time until service restoration:</p>
                    <p class="font-semibold text-green-700" id="etaTime">~15 minutes</p>
                </div>
            </div>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-center gap-4 mb-10">
            <button id="retryBtn" class="bg-green-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-green-700 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-redo"></i> Check Status
            </button>
            <a href="#" class="bg-white text-green-600 border border-green-600 px-6 py-3 rounded-lg font-medium hover:bg-green-50 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-home"></i> Go to Homepage
            </a>
            <a href="#" class="bg-gray-800 text-white px-6 py-3 rounded-lg font-medium hover:bg-gray-900 transition duration-300 flex items-center justify-center gap-2">
                <i class="fas fa-rss"></i> Status Page
            </a>
        </div>
        
        <!-- Maintenance Details -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto mb-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">Maintenance Details</h3>
            <div class="grid grid-cols-1 gap-3 text-left">
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Type:</span>
                    <span class="font-medium text-green-600">Scheduled Maintenance</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Start Time:</span>
                    <span class="font-medium">14:00 UTC</span>
                </div>
                <div class="flex justify-between py-2 border-b">
                    <span class="text-gray-600">Duration:</span>
                    <span class="font-medium">~30 minutes</span>
                </div>
                <div class="flex justify-between py-2">
                    <span class="text-gray-600">Impact:</span>
                    <span class="font-medium text-yellow-600">Partial Outage</span>
                </div>
            </div>
        </div>
        
        <!-- What's Happening -->
        <div class="bg-white rounded-xl shadow-md p-6 max-w-lg mx-auto">
            <h3 class="text-xl font-semibold text-gray-800 mb-4">What's Happening?</h3>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-rocket text-green-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            We're deploying performance improvements and new features to serve you better.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-shield-alt text-green-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Security updates are being applied to ensure your data remains protected.
                        </p>
                    </div>
                </div>
                <div class="flex items-start">
                    <div class="flex-shrink-0 mt-1">
                        <i class="fas fa-bolt text-green-500"></i>
                    </div>
                    <div class="ml-3">
                        <p class="text-gray-700 text-sm">
                            Infrastructure upgrades for faster response times and better reliability.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="mt-10 text-gray-500 text-sm">
            <p>© 2023 Your Company. All rights reserved. | 
               <a href="#" class="text-green-600 hover:text-green-800">Status Updates</a> | 
               <a href="#" class="text-green-600 hover:text-green-800">Maintenance Schedule</a>
            </p>
        </div>
    </div>

    <script>
        // Progress simulation
        let progress = 65;
        const progressBar = document.getElementById('progressBar');
        const progressPercent = document.getElementById('progressPercent');
        const maintenanceMessage = document.getElementById('maintenanceMessage');
        const etaTime = document.getElementById('etaTime');
        
        const messages = [
            "Applying system updates...",
            "Optimizing database performance...",
            "Deploying new features...",
            "Running security checks...",
            "Finalizing deployment..."
        ];
        
        let messageIndex = 0;
        
        const progressInterval = setInterval(() => {
            if (progress < 100) {
                progress += Math.floor(Math.random() * 5) + 1;
                if (progress > 100) progress = 100;
                
                progressBar.style.width = `${progress}%`;
                progressPercent.textContent = `${progress}%`;
                
                // Update ETA
                const remainingTime = Math.max(1, Math.floor((100 - progress) / 3));
                etaTime.textContent = `~${remainingTime} minutes`;
                
                // Change message every 20% progress
                if (progress % 20 === 0 && messageIndex < messages.length - 1) {
                    messageIndex++;
                    maintenanceMessage.textContent = messages[messageIndex];
                }
            } else {
                clearInterval(progressInterval);
                maintenanceMessage.textContent = "Maintenance complete! Service restoring...";
                maintenanceMessage.className = "text-sm text-green-600 mt-2 font-medium";
            }
        }, 2000);
        
        // Retry button functionality
        document.getElementById('retryBtn').addEventListener('click', function() {
            const btn = this;
            const originalText = btn.innerHTML;
            
            // Show checking state
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Checking...';
            btn.disabled = true;
            
            // Simulate status check
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
                
                // In a real application, this would check actual service status
                if (progress >= 100) {
                    window.location.reload();
                } else {
                    // Show notification that service is still down
                    const notification = document.createElement('div');
                    notification.className = 'fixed top-4 right-4 bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded shadow-lg';
                    notification.innerHTML = `
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-triangle mr-2"></i>
                            <span>Service is still undergoing maintenance</span>
                        </div>
                    `;
                    document.body.appendChild(notification);
                    
                    // Remove notification after 3 seconds
                    setTimeout(() => {
                        notification.remove();
                    }, 3000);
                }
            }, 1500);
        });
    </script>
</body>
</html>