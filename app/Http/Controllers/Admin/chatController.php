<?php

namespace App\Http\Controllers\Admin;
use App\Models\Chat;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class chatController extends Controller
{
     /**
     * show chat page
     *
     * @return void
     */
    public function index()
    {
        return view('admin.e-commerce.connection.chat');
    }
 
    /**
     * get member list
     *
     * @return void
     */
    public function liveChatUserList()
    {
        $chats = Chat::with('user')->latest('id')->get()->unique('user_id');
        
        return response()->json($chats);
    }
    
    /**
     * liveChatList
     *
     * @return void
     */
    public function liveChatList()
    {
        $chats = Chat::with('user')->get();
        
        return response()->json($chats);
    }

    /**
     * store chat messages in database
     *
     * @param  mixed $request
     * @return void
     */
    public function storeLiveChatForm(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric',
            'message' => 'required|string'
        ]);
        
        Chat::create([
            'user_id'           => $request->user_id,
            'staff_id'          => auth()->id(),
            'message'           => $request->message,
            'admin_status'      => true,
            'admin_message_log' => 'outgoing',
            'user_message_log'  => 'incoming'
        ]);

        return response()->json([
            'alert' => 'success'
        ]);
        
    }
    
    /**
     * show member chat messages by specific user
     *
     * @param  mixed $id
     * @return void
     */
    public function liveChatListById($id)
    {
        $user = User::findOrFail($id);
        $user->chats;

        foreach ($user->chats as $chat) {
            
            $chat->update([
                'admin_status' => true
            ]);
        }

        return response()->json($user);
    }

    /**
     * update message status for specific user
     *
     * @param  mixed $id
     * @return void
     */
    public function updateStatus($id)
    {
        $users = Chat::where('user_id', $id)->get();
        
        foreach ($users as $user) {
            
            $user->update([
                'admin_status' => true
            ]);
        }

        return response()->json('Success');
        
    }
   
    /**
     * total unseen messages count
     *
     * @return void
     */
    public function countNewMessage()
    {
        $count = Chat::where('admin_status', false)->count();
        return response()->json($count);
    }
}
