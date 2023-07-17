<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;
use Illuminate\Support\Facades\Http;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Data to be passed to view before rendering.
     *
     * @return array
     */
    public function with()
    {
        return [
            'siteName' => $this->siteName(),
            'getJson' => $this->getJson()
        ];
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * Returns the site name.
     *
     * @return string
     */
    public function siteName2()
    {
        return get_bloginfo('name', 'display');
    }

    /**
     * @return string
     */
    public function getJson() {

        $response = Http::get('https://my-json-server.typicode.com/typicode/demo/posts');
        $body = $response -> body();

        return $body;
    }

}
