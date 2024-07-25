<?php

namespace App\View\Composers;

use Roots\Acorn\View\Composer;

class Post extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.page-header',
        'partials.content-single',
    ];

    public function override()
    {
        return [
            'data' => $this->data(),
        ];
    }

    /**
     * Data to be passed to view before rendering, but after merging.
     *
     * @return array
     */
    public function data()
    {
        $data = [
            'title' => get_the_title(),
            'date' => get_the_date('l d F Y'),
            'thumbnail' => get_field('thumbnail'),
            'excerpt' => get_field('excerpt'),
            'category' => get_field('category'),
            'content' => get_the_content(),
        ];

        return $data;
    }
}
