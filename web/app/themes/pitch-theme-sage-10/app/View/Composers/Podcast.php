<?php

namespace app\View\Composers;

use Roots\Acorn\View\Composer;

class Podcast extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-podcast',
    ];

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function override()
    {
        return [
            'data' => $this->data(),
        ];
    }

    public function data()
    {
        $data = [
            'title' => get_the_title(),
            'episod' => get_field('episod'),
            'excerpt' => get_field('excerpt'),
            'iframe' => get_field('iframe')
         ];

        return $data;
    }
}
