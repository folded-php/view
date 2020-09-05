<?php

declare(strict_types = 1);

namespace Folded;

use Foled\View;

if (!function_exists("setViewFolderPath")) {
    /**
     * Set the folder path for the engine to find and compile views from.
     *
     * @param string $path The path to the folder containing the views.
     *
     * @throws Folded\Exceptions\FolderNotFound If the folder path is not found.
     * @throws Folded\Exceptions\NotAFolder     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * setViewFolderPath(__DIR__ . "/views");
     */
    function setViewFolderPath(string $path): void
    {
        View::setFolderPath($path);
    }
}
