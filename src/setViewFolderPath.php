<?php

declare(strict_types = 1);

namespace Folded;

use Folded\Exceptions\NotAFolderException;
use Folded\Exceptions\FolderNotFoundException;

if (!function_exists("Folded\setViewFolderPath")) {
    /**
     * Set the folder path for the engine to find and compile views from.
     *
     * @param string $path The path to the folder containing the views.
     *
     * @throws FolderNotFoundException If the folder path is not found.
     * @throws NotAFolderException     If the path is not a folder.
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
