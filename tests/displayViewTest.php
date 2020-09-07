<?php

declare(strict_types = 1);

use function Folded\displayView;
use function Folded\setViewFolderPath;

it("should display the view", function (): void {
    setViewFolderPath(__DIR__ . "/misc/views");

    ob_start();

    displayView("view");

    $content = ob_get_clean();

    expect($content)->toBe("hello world\n");
});
