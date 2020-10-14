<?php

declare(strict_types = 1);

use function Folded\getRenderedView;
use function Folded\setViewFolderPath;

it("should return the rendered view", function (): void {
    setViewFolderPath(__DIR__ . "/misc/views");

    expect(getRenderedView("view"))->toBe("hello world\n");
});
