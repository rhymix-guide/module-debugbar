<?php

declare(strict_types=1);

namespace Kkigomi\Module\Debugbar\Src\Debugbar\Collector;

use DebugBar\DataCollector\MessagesCollector;
use Rhymix\Framework\Debug;

class MessageCollector extends MessagesCollector
{
    public function __construct()
    {
        $this->name = 'messages';
    }

    /**
     * @return array{count: int, messages: mixed[]}
     */
    public function collect(): array
    {
        $messages = Debug::getEntries();

        $result = [];

        foreach ($messages as $msg) {
            $messageText = $msg->message;

            $messageHtml = '';
            $messageText = $this->getDataFormatter()->formatVar($messageText);
            if ($this->isHtmlVarDumperUsed()) {
                $messageHtml = $this->getVarDumper()->renderVar($msg->message);
            }

            $result[] = array(
                'message' => $messageText,
                'message_html' => $messageHtml,
                'label' => strtolower($msg->type),
                'time' => $msg->time
            );
        }

        return array(
            'count' => count($messages),
            'messages' => $result
        );
    }
}
