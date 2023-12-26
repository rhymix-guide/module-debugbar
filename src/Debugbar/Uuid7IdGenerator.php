<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Debugbar;

use DebugBar\RequestIdGeneratorInterface;
use Rhymix\Framework\Security;

class Uuid7IdGenerator implements RequestIdGeneratorInterface
{
    public function generate(): string
    {
        return Security::getRandomUUID(7);
    }
}
