<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\setViewCacheFolderPath")) {
    /**
     * Set the cached views folder path.
     *
     * @param string $path The path to the cached views folder.
     *
     * @throws Folded\Exceptions\FolderNotFound If the folder path is not found.
     * @throws Folded\Exceptions\NotAFolder     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * setViewCacheFolderPath(__DIR__ . "/cache/views");
     */
    function setViewCacheFolderPath(string $path): void
    {
        View::setCacheFolderPath($path);
    }
}
