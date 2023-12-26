<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src;

include_once __DIR__ . '/../vendor/autoload.php';

use Context;
use Kkigomi\RxModule\Debugbar\Src\Controllers\DebugbarController;
use Kkigomi\RxModule\Debugbar\Src\Models\ConfigModel;
use Kkigomi\RxModule\Debugbar\Src\Module;
use Rhymix\Framework\Template;

class EventHandler extends Module
{
    /**
     * shutdown 시 디버그바 데이터 저장
     */
    public function beforeModuleHandlerInit(): void
    {
        if (Context::getRequestVars()->act === 'getDebugbarHandle') {
            return;
        }

        register_shutdown_function(function () {
            if (!DebugbarController::isStored()) {
                DebugbarController::boot();
                DebugbarController::stack();
            }
        });
    }

    /**
     * @param string $output
     */
    public function afterDisplay(&$output): void
    {
        // openHandle() 호출일 때는 처리하지 않음
        if (Context::getRequestVars()->act == 'getDebugbarHandle') {
            return;
        }

        $config = new ConfigModel();
        if (!$config->printableDebugbar()) {
            return;
        }

        DebugbarController::boot();

        if (Context::getResponseMethod() == 'HTML') {
            $html = DebugbarController::render();
            $output = self::replaceLast('</body>', $html . '</body>', $output);
        } else {
            DebugbarController::stack(true);
        }
    }

    /**
     * 관리자 대시보드에 디버그 모드 활성화 정보를 표시
     */
    public static function adminDashboard(object $object)
    {
        if (!config('debug.enabled')) {
            return;
        }

        $oTemplate = new Template(Module::getInstance()->module_path . '/views/admin', 'rx-dashboard');

        $config = [
            'debug' => [
                'display_type' => config('debug.display_type'),
                'display_to' => config('debug.display_to'),
            ]
        ];
        $oTemplate->addVars($config);
        $html = $oTemplate->compile();

        array_unshift($object->left, $html);
    }

    /**
     * 마지막에 발견된 문자열을 치환
     */
    protected static function replaceLast(string $search, string $replace, string $subject): string
    {
        if ($search === '') {
            return $subject;
        }

        $position = strrpos($subject, $search);

        if ($position !== false) {
            return substr_replace($subject, $replace, $position, strlen($search));
        }

        return $subject;
    }

}
