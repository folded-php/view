<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\getRenderedView")) {
    /**
     * Get the rendered view.
     *
     * @param string              $path The path to the view (you can use dot syntax).
     * @param array<string,mixed> $data The data to pass to the view.
     *
     * @since 0.3.0
     *
     * @example
     * $content = getRenderedView("emails.account-created");
     */
    function getRenderedView(string $path, array $data = []): string
    {
        return View::render($path, $data);
    }
}
