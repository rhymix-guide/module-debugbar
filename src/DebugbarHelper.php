<?php declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src;

use Rhymix\Framework\Debug;
use Rhymix\Framework\Helpers\SessionHelper;
use Rhymix\Framework\Session;

class DebugbarHelper
{
    /**
     * Undocumented variable
     *
     * @var string[]
     */
    protected static array $excludeActions = [
        'getDebugbarHandle',
        'dispEditorFrame',
    ];
    /**
     * Undocumented variable
     *
     * @var string[]
     */
    protected static array $ignoreActions = [
        'getDebugbarHandle',
    ];


    /**
     * 디버그바 활성화 여부
     *
     * 권한을 체크하지 않고 활성화 상태만 확인
     */
    public static function enabled(): bool
    {
        return config('debug.enabled')
            && in_array('panel', config('debug.display_type'));
    }

    /**
     * 디버그 패널을 출력할 수 있는지 확인
     */
    public static function printable(string $actionName = null): bool
    {
        if (!static::enabled() || !Debug::isEnabledForCurrentUser()) {
            return false;
        }

        if (!$actionName) {
            $actionName = \Context::getRequestVars()->act;
        }

        return !in_array($actionName, static::$excludeActions);
    }

    /**
     * 데이터를 저장할 수 있는지 확인
     */
    public static function stackable(string $actionName = null): bool
    {
        if (!static::enabled()) {
            return false;
        }

        if (!$actionName) {
            $actionName = \Context::getRequestVars()->act;
        }

        return !in_array($actionName, static::$ignoreActions);
    }

    /**
     * dump/dd 함수를 사용할 수 있는지 확인
     */
    public static function dumpable(): bool
    {
        // 최고관리자는 항상 허용
        if (Session::isAdmin()) {
            return true;
        }

        if (!Debug::isEnabledForCurrentUser()) {
            return false;
        }

        return true;
    }
}
