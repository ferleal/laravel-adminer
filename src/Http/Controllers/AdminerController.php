<?php

namespace Ferleal\Adminer\Http\Controllers;

use Illuminate\Routing\Controller;

class AdminerController extends Controller
{
    protected $adminer;
    protected $version;

    public function __construct()
    {

    }

    public function index()
    {
        require('adminer-with-plugins.php');
        return new EmptyResponse();
    }

    public function sqlite()
    {
        require('adminer-with-sqlite.php');
        return new EmptyResponse();
    }
}
