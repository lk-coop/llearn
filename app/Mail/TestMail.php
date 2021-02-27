<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($body )
    {
        // Для того, чтобы при создании экземпляра данного класса мы могли передать в него какие-нибудь данные
        $this->body = $body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
//        return $this->view('test');


        // Прикрепление файла к письму
        return $this->view('test')->attach(url('img/1.png')); // Вложение
    }
}
