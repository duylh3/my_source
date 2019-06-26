<?php

namespace App\MyCore\Bootstrap;

use Illuminate\Log\Writer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Foundation\Bootstrap\ConfigureLogging as IlluminateConfigureLogging;

class ConfigureLogging extends IlluminateConfigureLogging {
    protected function configureSingleHandler(Application $app, Writer $log)
    {
        $log->useFiles(env('PATH_LOG_FILE', app('path.storage')) . '/' . date('Ymd') . '-system.txt');
    }
}