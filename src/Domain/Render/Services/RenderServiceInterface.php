<?php

namespace MbcApiContent\Domain\Render\Services;

interface RenderServiceInterface
{

    /**
     * @param string $namespace
     * @param string $path
     * @param string $template
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render(string $namespace = '', string $path = '', string $template = '');

}
