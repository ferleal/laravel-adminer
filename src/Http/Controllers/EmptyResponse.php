<?php

namespace Ferleal\Adminer\Http\Controllers;

use Illuminate\Http\Response;

class EmptyResponse extends Response
{
    public function send()
    {
    }
}
