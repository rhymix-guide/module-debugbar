<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Models;

use ModuleController;
use ModuleModel;
use Rhymix\Framework\Debug;

/**
 * 디버그바 모듈의 설정을 다루는 모델
 */
class ConfigModel
{
    protected string $configKey = 'debugbar';

    /**
     * @var object
     */
    protected object $config;

    /**
     * @var array{
     *     enable: string
     * }
     */
    protected array $defaultConfig = [
        'enable' => 'N',
    ];

    public function __construct()
    {
        $moduleConfig = ModuleModel::getModuleConfig($this->configKey);
        if (is_null($moduleConfig) || !is_object($moduleConfig)) {
            $moduleConfig = new \stdClass();
        }

        $this->config = $moduleConfig;
        $this->config->enable ??= $this->defaultConfig['enable'];

        if ($this->config->enable !== 'Y') {
            $this->config->enable = 'N';
        }
    }

    /**
     * 모듈 활성화 여부
     */
    public function isEnable(): bool
    {
        return ($this->config->enable ?? 'N') === 'Y';
    }


    /**
     * 모듈 활성화
     */
    public function enable(): void
    {
        $this->config->enable = 'Y';
    }

    /**
     * 모듈 비활성화
     */
    public function disable(): void
    {
        $this->config->enable = 'N';
    }

    public function printableDebugbar(): bool
    {
        return $this->isEnable()
            && config('debug.enabled')
            && !in_array('panel', config('debug.display_type'))
            && Debug::isEnabledForCurrentUser();
    }

    /**
     * 설정 변경사항 저장
     */
    public function save(): \BaseObject
    {
        if (($this->config->enable ?? 'N') !== 'Y') {
            $this->config->enable = 'N';
        }

        $oModuleController = ModuleController::getInstance();
        $output = $oModuleController->insertModuleConfig($this->configKey, $this->config);

        return $output;
    }
}
