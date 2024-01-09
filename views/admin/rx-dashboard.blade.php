<section style="background-color: #fef2f2; border: 1px solid #fecaca; border-radius: 8px">
    <h2 style="color: #dc2626; border-color: #fecaca;">디버그 기능이 활성화되어 있습니다.</h2>
    <div style="padding: 10px;">
        <dl>
            <dt>출력 대상</dt>
            <dd>{{ $debug['display_to'] }}</dd>
            <dt>디버그 로그 파일 용량</dt>
            <dd>합계: <code>{{ $debug['fileSizeTotal'] }}</code></dd>
            <dd>- Rhymix: <code>{{ $debug['fileSizeRhymix'] }}</code> (file/debug)</dd>
            <dd>- Debugbar: <code>{{ $debug['fileSizeKgStack'] }}</code> (file/debug/kg_debugbar_stack)</dd>
        </dl>
    </div>

    <div class="more">
        <a href="{{ getUrl('', 'module', 'admin', 'act', 'dispAdminConfigDebug') }}">
            디버그 설정 바로가기
            <i class="xi-angle-right"></i>
        </a>
    </div>
</section>
