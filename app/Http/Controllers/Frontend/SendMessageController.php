<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Pusher\Pusher;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class SendMessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('send_message');
    }
    public function sendMessage(Request $request)
    {

        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment();

        if(isset($request->parent_id)) {
            $comment->parent_id = $request->parent_id;
        }

        $comment->content = $request->content;
        $comment->new_id = $request->new_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        
        $data['title'] = $comment->new->username;
        $data['content'] = $comment->content;
        $data['username'] = $comment->user->username;

        $options = array(
            'cluster' => 'mt1',
            'encrypted' => true
        );

        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $pusher->trigger('Notify', 'send-message', $data);

        return redirect()->back();
    }
}
