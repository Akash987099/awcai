<?php

namespace App\Http\Controllers;

use App\Models\ChatBot;
use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    protected $chat;

    public function __construct()
    {
        $this->chat = new ChatBot();
    }

    public function index()
    {
        return view('chat');
    }

    public function send(Request $request)
{
    $userMessage = strtolower(trim($request->message));

    // Empty message check
    if ($userMessage === '') {
        return response()->json([
            'reply' => 'Please type something...'
        ]);
    }

    // Break user message into words
    $keywords = explode(' ', $userMessage);

    // Try matching each keyword
    foreach ($keywords as $word) {

        if (strlen($word) < 3) continue; // Skip very small words

        $match = ChatBot::whereRaw("LOWER(message) LIKE ?", ["%$word%"])
            ->first();

        if ($match) {
            return response()->json([
                'reply' => $match->message
            ]);
        }
    }

    // Default reply
    return response()->json([
        'reply' => 'Sorry, I did not understand that.'
    ]);
}

}
