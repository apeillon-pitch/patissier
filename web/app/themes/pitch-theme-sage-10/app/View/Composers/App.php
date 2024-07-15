<?php

namespace App\View\Composers;

use bootstrap_5_wp_nav_menu_walker;
use Roots\Acorn\View\Composer;
use function get_field;

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
            'header' => $this->headerData(),
            'footer' => $this->footerData(),
            'mainMenu' => $this->mainMenu(),
            'sectionData' => $this->sectionData(),
            'global' => $this->globalData(),
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
     * Header
     *
     * @return array
     */
    public function headerData()
    {
        $data = get_field('header_group', 'options');
        $data = array(
            'data' => $data,
        );
        return $data;
    }

    /**
     * Header
     *
     * @return array
     */
    public function footerData()
    {
        $data = get_field('footer_group', 'options');
        $data = array(
            'data' => $data,
        );
        return $data;
    }

    /**
     * Header
     *
     * @return array
     */
    public function globalData()
    {
        $data = get_field('general_group', 'options');
        $data = array(
            'data' => $data,
        );
        return $data;
    }

    /**
     * Primary Nav Menu arguments
     * @return array
     */
    public function mainMenu()
    {
        $args = array(
            'theme_location' => 'primary_navigation',
            'container_id' => 'navbarSupportedContent',
            'container_class' => 'navbar-desktop',
            'menu_class' => 'nav navbar-nav w-100',
            'walker' => new bootstrap_5_wp_nav_menu_walker()
        );
        return $args;
    }

    /**
     * Section data
     *
     * @return array
     */
    public function sectionData()
    {
        $data = get_field('flexible_content');
        return $data;
    }

}
