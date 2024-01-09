<?php

declare(strict_types=1);

namespace Kkigomi\Module\Debugbar\Src;

include_once __DIR__ . '/../vendor/autoload.php';

use Context;
use Kkigomi\Module\Debugbar\Src\Controllers\DebugbarController;
use Kkigomi\Module\Debugbar\Src\DebugbarModule;
use Rhymix\Framework\Template;

class EventHandler extends DebugbarModule
{
    /**
     * shutdown 시 디버그바 데이터 저장
     *
     * @see \ModuleHandler::__construct()
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
     * @see \DisplayHandler::printContent()
     */
    public static function beforeDisplay(): void
    {
        if (!DebugbarHelper::renderable() || Context::getResponseMethod() !== 'HTML') {
            return;
        }

        DebugbarController::boot();
        DebugbarController::renderHead();
    }

    /**
     * @see \DisplayHandler::printContent()
     * @param string $output
     */
    public function afterDisplay(&$output): void
    {
        if (!DebugbarHelper::renderable() || !DebugbarHelper::stackable()) {
            return;
        }


        DebugbarController::boot();

        if (Context::getResponseMethod() === 'HTML') {
            $html = DebugbarController::render();
            $output = self::replaceLast('</body>', $html . '</body>', $output);
        } else {
            DebugbarController::stack(true);
        }
    }

    /**
     * 관리자 대시보드에 디버그 모드 활성화 정보를 표시
     *
     * @see ~/modules/admin/tpl/index.html
     */
    public function adminDashboard(object $object): void
    {
        if (!config('debug.enabled')) {
            return;
        }

        $fileSizeRhymix = self::GetDirectorySize(\RX_BASEDIR . '/files/debug');
        $fileSizeKgStack = self::GetDirectorySize(\RX_BASEDIR . '/files/debug/kg_deburbar_stack');
        $fileSizeTotal = $fileSizeRhymix + $fileSizeKgStack;

        $oTemplate = new Template(DebugbarModule::getInstance()->module_path . '/views/admin', 'rx-dashboard');

        $config = [
            'debug' => [
                'display_type' => config('debug.display_type'),
                'display_to' => config('debug.display_to'),
                'fileSizeTotal' => self::sizeFormat($fileSizeTotal),
                'fileSizeRhymix' => self::sizeFormat($fileSizeRhymix),
                'fileSizeKgStack' => self::sizeFormat($fileSizeKgStack),
            ]
        ];
        $oTemplate->addVars($config);
        $html = $oTemplate->compile();

        array_unshift($object->left, $html);
    }

    protected static function GetDirectorySize(string $path): int
    {
        $bytestotal = 0;

        foreach (\Rhymix\Framework\Storage::readDirectory($path) as $object) {
            $bytestotal += filesize($object);
        }

        return $bytestotal;
    }

    /**
     * 파일 사이즈를 읽기 쉬운 형태로 변환
     *
     * @param int $filesize 파일 사이즈
     * @param bool $shorten 단위를 한 자리 문자로 표시
     * @param int $decimals 소수점 자리수
     * @param bool $binary 1024 또는 1000으로 나눈 값
     */
    protected static function sizeFormat(int $filesize, bool $shorten = false, $decimals = 1, ?bool $binary = true): string
    {
        if ($binary) {
            $num = 1024;
            $sizeUnits = array('B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB');
        } else {
            $num = 1000;
            $sizeUnits = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        }

        if ($shorten) {
            $sizeUnits = array('B', 'K', 'M', 'G', 'T', 'P', 'E', 'Z', 'Y');
        }

        $factor = floor((strlen((string) $filesize) - 1) / 3);
        $unit = $sizeUnits[$factor] ?? end($sizeUnits);

        return sprintf("%.{$decimals}f", (int) $filesize / pow($num, $factor)) . $unit;
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
