<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src;

include_once __DIR__ . '/../vendor/autoload.php';

use Context;
use Kkigomi\RxModule\Debugbar\Src\Controllers\DebugbarController;
use Kkigomi\RxModule\Debugbar\Src\Models\ConfigModel;
use Kkigomi\RxModule\Debugbar\Src\ModuleBase;
use Rhymix\Framework\Template;

class EventHandler extends ModuleBase
{
    /**
     * shutdown 시 디버그바 데이터 저장
     *
     * @uses \ModuleHandler::triggerCall()
     */
    public function beforeModuleHandlerInit(): void
    {
        if (!DebugbarHelper::stackable()) {
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
     * @uses \ModuleHandler::triggerCall()
     * @param string $output
     */
    public function afterDisplay(&$output): void
    {
        if (!DebugbarHelper::stackable()) {
            return;
        }

        DebugbarController::boot();

        if (DebugbarHelper::printable() && Context::getResponseMethod() === 'HTML') {
            $html = DebugbarController::render();
            $output = self::replaceLast('</body>', $html . '</body>', $output);
        } else {
            DebugbarController::stack(true);
        }
    }

    /**
     * 관리자 대시보드에 디버그 모드 활성화 정보를 표시
     *
     * @uses \ModuleHandler::triggerCall()
     */
    public static function adminDashboard(object $object): void
    {
        if (!config('debug.enabled')) {
            return;
        }

        $oTemplate = new Template(ModuleBase::getInstance()->module_path . '/views/admin', 'rx-dashboard');

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
