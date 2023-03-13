<?php

namespace Core;

/**
 * View
 *
 * PHP version 7.0
 */
class View {

    public static function twig_dirname($path, $level = 1) {
        return dirname($path, $level);
    }

    /**
     * Render a view template using Twig
     *
     * @param string $template  The template file
     * @param array $args  Associative array of data to display in the view (optional)
     *
     * @return void
     */
    public static function renderTemplate($template, $args = []) {
        static $twig = null;

        if ($twig === null) {
            $loader = new \Twig\Loader\FilesystemLoader(dirname(__DIR__) . '/App/Views');
            $twig = new \Twig\Environment($loader);
            $twig->addGlobal('rootDir', dirname(__DIR__));
        }

        echo $twig->render($template, $args);
    }
}
