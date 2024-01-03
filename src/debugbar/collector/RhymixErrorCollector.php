<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Debugbar\Collector;

use DebugBar\DataCollector\DataCollector;
use DebugBar\DataCollector\Renderable;
use Rhymix\Framework\Debug;

class RhymixErrorCollector extends DataCollector implements Renderable
{
    protected bool $useHtmlVarDumper = false;

    /**
     * @return array{count: int, exceptions: mixed[]}
     */
    public function collect(): array
    {
        $errors = [];
        foreach (Debug::getDebugData()->errors as $entry) {
            $errors[] = [
                'type' => $entry->type,
                'message' => $entry->message,
                'file' => $entry->file,
                'line' => $entry->line,
                'stack_trace' => $this->formatTraceAsString($entry),
            ];
        }

        return array(
            'count' => count($errors),
            'exceptions' => $errors
        );
    }

    public function formatTraceAsString(object $entry): string
    {
        $backtraces = [];
        foreach ($entry->backtrace as $key => $backtrace) {
            if (isset($backtrace['file']) && isset($backtrace['line'])) {
                // if ($entry->file === $backtrace['file'] && $entry->line === $backtrace['line']) {
                //     continue;
                // }
                $backtraces[] = sprintf('#%d %s:%d', $key, $backtrace['file'], $backtrace['line']);
            }
        }

        return implode(PHP_EOL, $backtraces);
    }

    public function useHtmlVarDumper(bool $value = true): self
    {
        $this->useHtmlVarDumper = $value;
        return $this;
    }

    public function isHtmlVarDumperUsed(): bool
    {
        return $this->useHtmlVarDumper;
    }

    public function getName(): string
    {
        return 'exceptions';
    }

    /**
     * @return mixed[]
     */
    public function getWidgets(): array
    {
        return array(
            'exceptions' => array(
                'icon' => 'bug',
                'widget' => 'PhpDebugBar.Widgets.ExceptionsWidget',
                'map' => 'exceptions.exceptions',
                'default' => '[]'
            ),
            'exceptions:badge' => array(
                'map' => 'exceptions.count',
                'default' => 'null'
            )
        );
    }
}
