<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector;

use DebugBar\DataCollector;
use DebugBar\DataCollector\AssetProvider;
use Rhymix\Framework\Config;

class RhymixDataCollector extends DataCollector\DataCollector implements DataCollector\Renderable, AssetProvider
{
    protected bool $useHtmlVarDumper = false;

    /**
     * @return mixed[]
     */
    public function collect(): array
    {
        // $includedFiles = get_included_files();
        // $loadedLang = array_filter($includedFiles, function ($file) {
        //     return (
        //         stripos($file, '/lang/') !== false
        //     );
        // });

        return [
            'version' => \RX_VERSION,
            'config' => [
                'locale' => Config::get('locale'),
                'layout' => [
                    'name' => \Context::get('layout_info.layout'),
                    'title' => \Context::get('layout_info.title'),
                    'path' => \Context::get('layout_info.path'),
                    'layoutSrl' => \Context::get('layout_info.layout_srl'),
                    'layoutTitle' => \Context::get('layout_info.layout_title'),
                    'layoutType' => \Context::get('layout_info.layout_type'),
                    'isEdited' => \Context::get('layout_info.is_edited'),
                ],
                'currentModule' => \Context::get('current_module_info'),
            ],
        ];
    }

    public function getName(): string
    {
        return 'rhymix';
    }

    /**
     * @return mixed[]
     */
    public function getWidgets(): array
    {
        return [
            'rhymix' => [
                'icon' => 'chevron-circle-right',
                'tooltip' => 'Rhymix 버전',
                'map' => 'rhymix.version',
                'default' => ''
            ],
        ];
    }

    /**
     * @return mixed[]
     */
    public function getAssets(): array
    {
        return [
            // 'css' => 'widgets/g5/widget.css',
            // 'js' => 'widgets/g5/widget.js'
        ];
    }
}
