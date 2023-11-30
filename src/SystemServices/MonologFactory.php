<?php

namespace App\SystemServices;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class MonologFactory
{
    private static $logger;

    public static function getInstance()
    {
        if (self::$logger == null) {
            self::$logger = new Logger("MeuApp");
            self::$logger->pushHandler(new StreamHandler("meuslogs.log", Logger::DEBUG));
        }

        return self::$logger;
    }

    public static function logError($message)
    {
 
        self::getInstance()->error($message);
    }


}
