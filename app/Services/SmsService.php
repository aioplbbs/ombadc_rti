<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{
    protected $username;
    protected $password;
    protected $sender;

    public function __construct()
    {
        $this->username = "20200887";
        $this->password = "BV0P99np";
        $this->sender   = "DMBASP";
    }

    public function send($to, $msg)
    {
        $url = "https://prpsms.co.in/API/SendMsg.aspx";

        $response = Http::get($url, [
            'uname'   => $this->username,
            'pass'    => $this->password,
            'send'    => $this->sender,
            'dest'    => $to,
            'msg'     => $msg,
            'priority'=> 1
        ]);

        return $response->body(); // API returns "Message Submitted" or error
    }
}
