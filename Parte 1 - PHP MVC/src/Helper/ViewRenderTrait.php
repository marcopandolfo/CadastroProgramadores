<?php

namespace Zebra\CadastroProgramadores\Helper;

trait ViewRenderTrait
{
    public function render(string $viewPath, array $data): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../View/' . $viewPath;
        $html = ob_get_clean();

        return $html;
    }
}