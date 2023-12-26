<?php

declare(strict_types=1);

namespace Kkigomi\RxModule\Debugbar\Src;

include_once __DIR__ . '/../vendor/autoload.php';

use Context;
use Kkigomi\RxModule\Debugbar\Src\Models\ConfigModel;
use ModuleObject;
use Kkigomi\RxModule\Debugbar\Src\Controllers\AdminController;
use Kkigomi\RxModule\Debugbar\Src\Controllers\DebugbarController;

class Module extends ModuleObject
{
    public function dispDebugbarAdminConfig(): void
    {
        Context::set('kgDebugbarConfig', new ConfigModel());

        // 템플릿 파일
        $this->setTemplatePath($this->module_path . 'views/admin/');
        $this->setTemplateFile('config');
    }

    /**
     * 관리자 설정 저장 액션
     * @return void|\BaseObject
     */
    public function procDebugbarAdminConfig()
    {
        $output = AdminController::saveConfig(Context::getRequestVars());

        if (!$output->toBool()) {
            return $output;
        }

        // 설정 화면으로 리다이렉트
        $this->setMessage('success_saved');
        $this->setRedirectUrl(Context::get('success_return_url'));
    }

    public function getDebugbarHandle(): void
    {
        Context::setResponseMethod('JSON');

        DebugbarController::boot();

        $payload = DebugbarController::openHandle();

        $payload = json_decode($payload);

        $this->add('data', $payload);
    }
}
