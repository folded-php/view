<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\displayView")) {
    /**
     * Display the view by echoing its content.
     *
     * @param array<string,mixed> $data The data to pass to the view.
     *
     * @since 0.1.0
     *
     * @example
     * setViewFolderPath(__DIR__ . "/views");
     * displayView("home.index"); // Will display content from views/home/index.blade.php
     */
    function displayView(string $path, array $data = []): void
    {
        echo View::render($path, $data);
    }
}
