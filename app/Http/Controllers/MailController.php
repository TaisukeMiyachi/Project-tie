<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SendGrid;
use SendGrid\Mail\Mail;
use \Symfony\Component\HttpFoundation\Response;
use App\Models\Message;
use App\Models\User;

class MailController extends Controller
{
    public function index() {
        return view('mail');
    }

    public function send(Request $request) {
        // $requeszt->validate([
        //     'email'    => 'required',
        //     'subject'  => 'required',
        //     'contents' => 'required',
        // ]);
        // send_toに対応するuserのemailアドレスを取得


        $user = User::find($request -> send_to);
        $address = $user->email;
            // dd($address);
        //SendGrid
        $email = new Mail();
        $email->setFrom('taisuke.m.lotus.elise@gmail.com', '教員へのメッセージ');
        $email->setSubject("生徒・教員からのメッセージ");
        $email->addTo($address);
// dd($email);
        $fixedContent
            = "{$user->name} さんからメッセージが届いてます。下のurlからログインして確認しましょう。
            https://gsacademy-fdev05.sakura.ne.jp/project/";
        $email->addContent("text/plain", $fixedContent);
// dd($email);
        $apiKey = getenv('SENDGRID_API_KEY');
        $sendGrid = new \SendGrid($apiKey);
        // $sendgrid = new SendGrid(env('SENDGRID_API_KEY'));
// dd($sendGrid);
        $response = $sendGrid->send($email);

        
// dd($response);        
    //     if ($response->statusCode() == Response::HTTP_ACCEPTED) {
    //         return view('mail.send-complete');
    //     } else {
    //         return view('mail.send-incomplete');
    //     }
    }
}
