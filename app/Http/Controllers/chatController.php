<?php

namespace App\Http\Controllers;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class chatController extends Controller
{
    public function showLiveChatForm()
    {
        $messages = auth()->user()->chats->count();
        return view('frontend.connection.chat', compact('messages'));
    }

    public function liveChatList()
    {
        $chats = Chat::where('user_id', auth()->id())->with('user')->get();

        foreach ($chats as $chat) {

            $chat->update([
                'user_status' => true
            ]);
        }

        return response()->json($chats);
    }

    // Show Live Chat Form
    public function storeLiveChatForm(Request $request)
    {
        $this->validate($request, [
            'message' => 'required|string'
        ]);

        Chat::create([
            'user_id'           => auth()->id(),
            'message'           => $request->message,
            'user_status'       => true,
            'admin_message_log' => 'incoming',
            'user_message_log'  => 'outgoing'
        ]);

        return response()->json([
            'alert' => 'success'
        ]);

    }

    // Count New Message
    public function countNewMessage()
    {
        $count = auth()->user()->chats->where('user_message_log', 'incoming')->where('user_status', false)->count();
        return response()->json($count);
    }
}
