<?php

declare(strict_types = 1);

namespace Folded;

if (!function_exists("Folded\addDataToView")) {
    /**
     * Always pass the data provided to a specific view when it is rendered.
     *
     * @param string $viewPath The path to the view (you can use dot syntax).
     * @param array  $data     The data to pass to the view as key-value pairs.
     *
     * @since 0.2.0
     *
     * @example
     * addDataToView("layouts.base", [
     *  "companyName" => "Folded",
     *  "companySlogan" => "Constellation of packages for your web app.",
     * ]);
     */
    function addDataToView(string $viewPath, array $data): void
    {
        View::addData($viewPath, $data);
    }
}
