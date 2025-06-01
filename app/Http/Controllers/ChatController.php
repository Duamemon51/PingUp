<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function unreadMessages()
    {
        $userId = auth()->id();

        $messages = DB::table('ch_messages')
            ->where('to_id', $userId)
            ->where('seen', 0)
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
    }
}
