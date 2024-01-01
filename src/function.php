<?php

declare(strict_types=1);

use Kkigomi\RxModule\Debugbar\Src\DebugbarHelper;
use Symfony\Component\VarDumper\VarDumper;

if (!function_exists('dump')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     */
    function dump($var, ...$moreVars)
    {
        if (!DebugbarHelper::dumpable()) {
            return;
        }

        VarDumper::dump($var);

        foreach ($moreVars as $v) {
            VarDumper::dump($v);
        }

        if (1 < func_num_args()) {
            return func_get_args();
        }

        return $var;
    }
}

if (!function_exists('dd')) {
    /**
     * @author Nicolas Grekas <p@tchwork.com>
     * @return never|void
     */
    function dd(...$vars)
    {
        if (!DebugbarHelper::dumpable()) {
            return;
        }

        if (!in_array(\PHP_SAPI, ['cli', 'phpdbg'], true) && !headers_sent()) {
            header('HTTP/1.1 500 Internal Server Error');
        }

        foreach ($vars as $v) {
            VarDumper::dump($v);
        }

        exit(1);
    }
}
