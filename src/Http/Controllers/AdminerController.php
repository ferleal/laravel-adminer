<?php

namespace Ferleal\Adminer\Http\Controllers;

use Illuminate\Routing\Controller;

use Config;

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

    public function auto(){
        if (! isset($_GET['db'])) {

            $database_config = Config::get('database.default');

            $database_driver = Config::get("database.connections.$database_config.driver");
            if ($database_driver === "mysql") {
                $database_driver = "server";
            }

            $_POST['auth']['driver'] = $database_driver;
            $_POST['auth']['server'] = Config::get("database.connections.$database_config.host");
            $_POST['auth']['db'] = Config::get("database.connections.$database_config.database");
            $_POST['auth']['username'] = Config::get("database.connections.$database_config.username");
            $_POST['auth']['password'] = Config::get("database.connections.$database_config.password");
        }

        $this->index();
    }
}
