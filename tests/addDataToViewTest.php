<?php

declare(strict_types = 1);

use Folded\View;
use function Folded\addDataToView;
use function Folded\setViewFolderPath;
use function Folded\setViewCacheFolderPath;

it("should pre-fill data to a view", function (): void {
    $viewPath = "view-with-data";

    setViewFolderPath(__DIR__ . "/misc/views");
    setViewCacheFolderPath(__DIR__ . "/misc/cache/views");
    addDataToView($viewPath, [
        "companyName" => "Folded",
    ]);

    expect(View::render($viewPath))->toBe("Welcome to Folded.\n");
});
