<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src\Controllers;

use DebugBar\DataCollector\MemoryCollector;
use DebugBar\DataCollector\PhpInfoCollector;
use DebugBar\DataCollector\RequestDataCollector;
use DebugBar\DataCollector\TimeDataCollector;
use DebugBar\DebugBar;
use DebugBar\OpenHandler;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector\MessageCollector;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector\RhymixDataCollector;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector\RhymixErrorCollector;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\DataCollector\RhymixQueryCollector;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\Storage\RhymixFileStorage;
use Kkigomi\RxModule\Debugbar\Src\Debugbar\Uuid7IdGenerator;
use Kkigomi\RxModule\Debugbar\Src\DebugbarHelper;
use Kkigomi\RxModule\Debugbar\Src\Module;
use Rhymix\Framework\Debug;

class DebugbarController
{
    /**
     * 디버그바 인스턴스
     */
    protected static DebugBar $debugbar;
    /**
     * HTML 렌더링 여부
     */
    protected static bool $rendered = false;
    /**
     * 데이터 스택 여부
     */
    protected static bool $stacked = false;

    /**
     * 디버그 내용이 저장되었는지 여부 반환
     */
    public static function isStored(): bool
    {
        return static::$rendered || static::$stacked;
    }

    /**
     * 디버그바 인스턴스 생성
     */
    public static function boot(): void
    {
        self::$debugbar = new DebugBar();

        // 로그 저장
        self::$debugbar->setStorage(
            new RhymixFileStorage(\RX_BASEDIR . 'files/debug/kg_deburbar_stack')
        );

        self::$debugbar->setRequestIdGenerator(new Uuid7IdGenerator());

        // DataCollector
        self::$debugbar->addCollector(new RhymixDataCollector());
        self::$debugbar->addCollector(new MessageCollector());
        self::$debugbar->addCollector(new RequestDataCollector());
        self::$debugbar->addCollector(new PhpInfoCollector());
        self::$debugbar->addCollector(new TimeDataCollector(\RX_MICROTIME));
        self::$debugbar->addCollector(new RhymixQueryCollector());
        self::$debugbar->addCollector(new RhymixErrorCollector());
        self::$debugbar->addCollector(new MemoryCollector());

        // HtmlVarDumper
        // @phpstan-ignore-next-line
        self::$debugbar->getCollector('messages')->useHtmlVarDumper();
        // @phpstan-ignore-next-line
        self::$debugbar->getCollector('request')->useHtmlVarDumper();
    }

    /**
     * HTML 렌더링
     * @return string|void
     */
    public static function render()
    {
        if (self::isStored()) {
            return;
        }

        self::$rendered = true;

        $oModuel = Module::getInstance();

        $debugbarRenderer = self::$debugbar->getJavascriptRenderer(
            "/modules/{$oModuel->module}/public/debugbar",
            "{$oModuel->module_path}public/debugbar"
        );

        $debugbarRenderer->setOpenHandlerUrl(\RX_BASEURL . '?module=debugbar&act=getDebugbarHandle');

        $html = $debugbarRenderer->renderHead();
        $html .= $debugbarRenderer->render(true, false);

        return $html;
    }

    /**
     * 데이터 저장
     */
    public static function stack(bool $header = false): void
    {
        if (self::isStored()) {
            return;
        }

        self::$stacked = true;

        self::$debugbar->stackData();
        if ($header === true) {
            self::$debugbar->sendDataInHeaders(true);
        }
    }

    public static function openHandle(): string
    {
        if (
            !DebugbarHelper::enabled()
            || !Debug::isEnabledForCurrentUser()
        ) {
            return '';
        }

        $openHandler = new OpenHandler(static::$debugbar);

        return $openHandler->handle(null, false, false);
    }
}
