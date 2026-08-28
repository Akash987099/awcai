<div class="fixed bottom-6 right-6 z-[9999] group">
    <button id="chatToggle"
        class="relative w-14 h-14 sm:w-16 sm:h-16 bg-gradient-to-br from-purple-600 to-blue-600 text-white rounded-full shadow-2xl flex items-center justify-center text-3xl hover:scale-110 transition-all duration-300 
               ring-4 ring-purple-500 ring-opacity-30 animate-pulse-slow">
        <span class="absolute inset-0 rounded-full bg-white opacity-20 animate-ping"></span>
        <span id="toggleIcon">🤖</span>
    </button>
</div>

<div id="chatWindow"
    class="fixed 
           bottom-20 sm:bottom-24 
           right-6 
           w-[95vw] max-w-full 
           sm:w-96 
           md:w-[400px]
           h-[85vh] max-h-[85vh]
           sm:h-96 sm:max-h-[600px]
           bg-gray-900 bg-opacity-60 backdrop-blur-xl border border-gray-700 border-opacity-50 
           rounded-2xl shadow-2xl overflow-hidden 
           transform translate-y-12 scale-95 opacity-0 pointer-events-none 
           transition-all duration-500 ease-out z-[99999]
           left-1/2 -translate-x-1/2 sm:left-auto sm:translate-x-0
           flex flex-col">

    <div
        class="bg-gradient-to-r from-purple-600 via-blue-600 to-cyan-500 px-4 sm:px-6 py-4 flex justify-between items-center shrink-0">
        <div class="flex items-center space-x-3">
            <div
                class="w-10 h-10 rounded-full bg-white bg-opacity-30 backdrop-blur-md flex items-center justify-center animate-spin-slow">
                <span class="text-xl">✦</span>
            </div>
            <div>
                <h3 class="text-lg font-bold text-white">AI Assistant</h3>
                <p class="text-xs text-white text-opacity-80">Always here to help 😊</p>
            </div>
        </div>
        <button id="closeChat" class="text-white text-3xl hover:scale-125 transition hover:rotate-90">×</button>
    </div>

    <div id="chatMessages"
        class="flex-1 overflow-y-auto p-4 sm:p-5 space-y-4 scrollbar-thin scrollbar-thumb-purple-500 min-h-0">
        <div class="flex items-start space-x-3 animate-slideIn">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500 flex-shrink-0"></div>
            <div
                class="bg-gray-800 bg-opacity-70 backdrop-blur-md px-4 py-3 rounded-2xl max-w-xs border border-gray-700">
                <p class="text-white">Hello! How can I assist you today? 😊</p>
            </div>
        </div>
    </div>

    <div class="p-4 bg-gray-900 bg-opacity-80 backdrop-blur-md border-t border-gray-700 shrink-0">
        <div class="flex space-x-3">
            <textarea id="messageInput"
                class="flex-1 bg-gray-800 bg-opacity-60 backdrop-blur border border-gray-700 rounded-xl px-4 py-3 text-white placeholder-gray-400 resize-none outline-none focus:ring-2 focus:ring-purple-500 transition text-sm sm:text-base"
                placeholder="Type your message..." rows="1"></textarea>
            <button id="sendMsg"
                class="bg-gradient-to-r from-purple-600 to-blue-600 px-4 sm:px-6 py-3 rounded-xl hover:scale-110 hover:shadow-lg hover:shadow-purple-500/50 transition-all font-bold text-lg">
                🚀
            </button>
        </div>
    </div>
</div>

<style>
    @keyframes ping {

        75%,
        100% {
            transform: scale(1.5);
            opacity: 0;
        }
    }

    .animate-ping-slow {
        animation: ping 3s cubic-bezier(0, 0, 0.2, 1) infinite;
    }

    .animate-spin-slow {
        animation: spin 8s linear infinite;
    }

    .animate-slideIn {
        animation: slideIn 0.4s ease-out;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>

<script>
    document.getElementById("chatToggle").addEventListener("click", () => {
        const chat = document.getElementById("chatWindow");
        const icon = document.getElementById("toggleIcon");

        if (chat.classList.contains("opacity-0")) {
            chat.classList.remove("translate-y-12", "scale-95", "opacity-0", "pointer-events-none");
            chat.classList.add("translate-y-0", "scale-100", "opacity-100", "pointer-events-auto");
            icon.textContent = "✕";
        } else {
            chat.classList.remove("translate-y-0", "scale-100", "opacity-100", "pointer-events-auto");
            chat.classList.add("translate-y-12", "scale-95", "opacity-0", "pointer-events-none");
            icon.textContent = "🤖";
        }
    });

    document.getElementById("closeChat").addEventListener("click", () => {
        document.getElementById("chatToggle").click();
    });

    document.getElementById("sendMsg").addEventListener("click", sendMessage);
    document.getElementById("messageInput").addEventListener("keypress", e => {
        if (e.key === "Enter" && !e.shiftKey) {
            e.preventDefault();
            sendMessage();
        }
    });

    function sendMessage() {
        const input = document.getElementById("messageInput");
        const text = input.value.trim();
        if (!text) return;

        addMessage(text, "user");
        input.value = "";

        fetch("/chat/send", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    message: text
                })
            })
            .then(res => res.json())
            .then(data => {
                addMessage(data.reply, "bot");
            });
    }

    function addMessage(text, type) {
        const container = document.getElementById("chatMessages");
        const bubble = document.createElement("div");
        bubble.className = "flex items-start space-x-3 animate-slideIn";

        if (type === "user") {
            bubble.innerHTML = `
        <div class="ml-auto flex items-start space-x-3 flex-row-reverse space-x-reverse">
            <div class="bg-gradient-to-r from-purple-500 to-pink-500 px-4 py-3 rounded-2xl max-w-xs border border-purple-400 shadow-lg">
                <p class="text-white font-medium">${text}</p>
            </div>
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-purple-400 to-pink-600"></div>
        </div>`;
        } else {
            bubble.innerHTML = `
        <div class="flex items-start space-x-3">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-cyan-400 to-blue-500"></div>
            <div class="bg-gray-800 bg-opacity-70 backdrop-blur-md px-4 py-3 rounded-2xl max-w-xs border border-gray-700">
                <p class="text-white">${text}</p>
            </div>
        </div>`;
        }

        container.appendChild(bubble);
        container.scrollTop = container.scrollHeight;
    }
</script>
