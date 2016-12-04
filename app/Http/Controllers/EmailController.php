<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function send(Request $request){
    	$title = $request->input('title');
    	$content = $request->input('content');

    	Mail::send('emails.send', ['title'=> $title, 'content' => $content], function ($message)
    	{
    		$message->from('shinigv@gmail.com', 'Victor GV');

    		$message->to('shinigv2@gmail.com');

    		//Resto de metodos disponibles
    		//$message->from($address, $name = null);
			//$message->sender($address, $name = null);
			//$message->to($address, $name = null);
			//$message->cc($address, $name = null);
			//$message->bcc($address, $name = null);
			//$message->replyTo($address, $name = null);
			//$message->subject($subject);
			//$message->priority($level);
			//$message->attach($pathToFile, array $options = []);

    	});
    	return response()->json(['message'=> 'Request completed']);
    }
}
