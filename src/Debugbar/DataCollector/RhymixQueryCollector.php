<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector;

use DebugBar\DataCollector;
use DebugBar\DataCollector\AssetProvider;
use Rhymix\Framework\Debug;

class RhymixQueryCollector extends DataCollector\DataCollector implements DataCollector\Renderable, AssetProvider
{
    /**
     * @return array{nb_statements: int, statements: mixed[]}
     */
    public function collect(): array
    {
        $debugData = Debug::getDebugData();

        $queries = [];
        foreach ($debugData->queries as $query) {
            $sqlString = [];
            $sqlString[] = "-- Connection : {$query->query_connection}";
            if ($query->query_id) {
                $sqlString[] = "-- Query ID   : {$query->query_id}";
            }
            if ($query->method || $query->file) {
                $sqlString[] = "-- Caller     : {$query->method}()";
                $sqlString[] = "--              {$query->file}:{$query->line}";
            }
            // $sqlString[] = '';
            $sqlString[] = $query->query_string;
            $sqlString[] = '';
            $sqlString = implode(PHP_EOL, $sqlString);

            $queries[] = [
                'sql' => $sqlString,
                // 'stmt_id' => $query->query_id,
                // 'params' => '',
                'duration' => $query->query_time,
                // 'row_count' => $query->count,
                'is_success' => $query->error_code === 0,
                'error_code' => $query->error_code ?: null,
                'error_message' => $query->message,
                'duration_str' => $query->query_time ? $this->getDataFormatter()->formatDuration($query->query_time) : null,
            ];
        }

        return array(
            'nb_statements' => count($queries),
            // 'accumulated_duration' => $this->accumulated_duration,
            // 'accumulated_duration_str' => $this->accumulated_duration ? $this->getDataFormatter()->formatDuration($this->accumulated_duration) : null,
            'statements' => $queries
        );
    }

    public function getName(): string
    {
        return 'dbquery';
    }

    /**
     * @return mixed[]
     */
    public function getWidgets(): array
    {
        return array(
            'queries' => array(
                'icon' => 'database',
                'widget' => 'PhpDebugBar.Widgets.SQLQueriesWidget',
                'map' => 'dbquery',
                'default' => '[]'
            ),
            'queries:badge' => array(
                'map' => 'dbquery.nb_statements',
                'default' => 0
            )
        );
    }

    /**
     * @return array{css?: string, js?: string}
     */
    public function getAssets(): array
    {
        return array(
            'css' => 'widgets/sqlqueries/widget.css',
            'js' => 'widgets/sqlqueries/widget.js'
        );
    }
}