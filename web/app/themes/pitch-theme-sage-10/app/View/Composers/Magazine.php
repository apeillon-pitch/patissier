<?php

namespace app\View\Composers;

use Roots\Acorn\View\Composer;

class Magazine extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-magazine',
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
            'number' => get_the_title(),
            'date' => get_field('date_string'),
            'title' => get_field('title'),
            'thumbnail' => get_field('thumbnail'),
            'excerpt' => get_field('excerpt'),
            'magazine' => get_field('magazine'),
            'introduction' => get_field('introduction'),
            'recipes' => get_field('recipes'),
        ];

        return $data;
    }
}
