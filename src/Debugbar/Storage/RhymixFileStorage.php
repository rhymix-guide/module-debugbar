<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Debugbar\Storage;

use DebugBar\Storage\FileStorage;
use Rhymix\Framework\Storage;

class RhymixFileStorage extends FileStorage
{
    public int $maxItems = 100;

    /**
     * {@inheritdoc}
     * @return mixed[]
     */
    public function get($id): array
    {
        $data = include $this->makeFilename($id);
        return $data;
    }

    /**
     * {@inheritdoc}
     */
    public function save($id, $data): void
    {
        if (!file_exists($this->dirname)) {
            Storage::createDirectory($this->dirname);
        }

        $output = [];
        $output[] = '<?php';
        $output[] = "if (!defined('RX_VERSION')) { header('HTTP/1.1 404 Not Found'); exit; }";
        $output[] = 'return ' . var_export($data, true) . ';';

        Storage::write($this->makeFilename($id), implode(PHP_EOL, $output));

        $files = Storage::readDirectory($this->dirname);
        if (count($files) > $this->maxItems) {
            $files = array_reverse($files);
            $files = array_slice($files, $this->maxItems);
            foreach ($files as $file) {
                Storage::delete($file);
            }
        }
    }

    /**
     * {@inheritdoc}
     * @param array{
     *     'utime'?: string,
     *     'datetime'?: string,
     *     'uri'?: string,
     *     'ip'?: string,
     *     'method'?: string
     * } $filters
     * @return mixed[]
     */
    public function find(array $filters = [], $max = 20, $offset = 0): array
    {
        $offset = (int) $offset;
        $max = (int) $max;

        $files = Storage::readDirectory($this->dirname);
        $files = array_reverse($files);
        $files = array_reduce($files, function ($carry, $file) {
            if (!str_ends_with($file, '.php')) {
                return $carry;
            }

            $carry[] = basename($file, '.php');

            return $carry;
        }, []);

        $results = [];
        $i = 0;
        foreach ($files as $file) {
            if ($i++ < $offset && empty($filters)) {
                $results[] = null;
                continue;
            }
            $data = $this->get($file);
            $meta = $data['__meta'];
            if ($this->filter($meta, $filters)) {
                $results[] = $meta;
            }
            if (count($results) >= ($max + $offset)) {
                break;
            }
        }

        return array_slice($results, $offset, $max);
    }

    /**
     * {@inheritdoc}
     */
    public function clear(): void
    {
        Storage::deleteDirectory($this->dirname, false);
    }

    /**
     * {@inheritdoc}
     */
    public function makeFilename($id)
    {
        return $this->dirname . basename($id) . '.php';
    }
}