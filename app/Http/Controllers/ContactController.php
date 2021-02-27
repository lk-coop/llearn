<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        #Mail::to('lyonya-dev@mail.ru')->send(new TestMail()); // Кому надо отправить письмо

        if ($request->method() == 'POST') {
            $body = "<p><b>Имя:</b> {$request->input('name')}</p>";
            $body .= "<p><b>E-mail:</b> {$request->input('email')}</p>";
            $body .= "<p><b>Сообщение:</b>" .  nl2br($request->input('text')) . "</p>";


            Mail::to('lyonya-dev@mail.ru')->send(new TestMail($body));
            $request->session()->flash('success', 'Сообщение отправлено.');
            return redirect('/send');
        }


        return view('send');
    }
}
