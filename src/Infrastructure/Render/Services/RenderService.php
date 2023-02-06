<?php

namespace MbcApiContent\Infrastructure\Render\Services;

use MbcApiContent\Domain\Render\Services\RenderServiceInterface;

class RenderService implements RenderServiceInterface
{

    /*
     *


    si origine:

        // views : resources/views/welcome.blade.php

        // return view('welcome');

    si custom:

        dans Provider boot:

            $this->loadViewsFrom(_
                _DIR__.'/../../resources/views', // CUSTOM  path
                'api_content_views' // view namespace
            );

            return view('api_content_views::vendor/product/sub/bye');


     */


    /**
     * @param string $namespace
     * @param string $path
     * @param string $template
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render(string $namespace = '', string $path = '', string $template = '')
    {
        return view('welcome');
        return view('api_content_views::vendor/product/sub/bye');
    }


}
