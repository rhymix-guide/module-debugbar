<?php

declare(strict_types=1);

namespace Kkigomi\Module\Debugbar\Src;

include_once __DIR__ . '/../vendor/autoload.php';

use Context;
use Kkigomi\Module\Debugbar\Src\Controllers\AdminController;
use Kkigomi\Module\Debugbar\Src\Controllers\DebugbarController;
use Kkigomi\Module\Debugbar\Src\Models\ConfigModel;
use ModuleObject;

class DebugbarModule extends ModuleObject
{
    /**
     * @uses \ModuleHandler::procModule()
     */
    public function dispDebugbarAdminConfig(): void
    {
        Context::set('kgDebugbarConfig', new ConfigModel());

        // 템플릿 파일
        $this->setTemplatePath($this->module_path . 'views/admin/');
        $this->setTemplateFile('config');
    }

    /**
     * 관리자 설정 저장 액션
     *
     * @uses \ModuleHandler::procModule()
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

    /**
     * @uses \ModuleHandler::procModule()
     */
    public function getDebugbarHandle(): void
    {
        Context::setResponseMethod('JSON');

        DebugbarController::boot();

        $payload = DebugbarController::openHandle();

        $payload = json_decode($payload);

        $this->add('data', $payload);
    }
}
