<?php

namespace app\View\Composers;

use Roots\Acorn\View\Composer;

class Recipe extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        'partials.content-single-recipe',
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
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'thumbnail' => get_field('thumbnail'),
            'excerpt' => get_field('excerpt'),
            'magazine' => get_field('magazine'),
            'tag' => get_field('tag'),
            'introduction' => get_field('introduction'),
            'author' => get_field('author_group'),
            'widget-text' => get_field('widget_text_style_one'),
            'widget-recipe' => get_field('widget_recipe_suggestion'),
        ];

        return $data;
    }
}
