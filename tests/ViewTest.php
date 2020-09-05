<?php

declare(strict_types = 1);

use Foled\View;
use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;

it("should throw an exception if the folder is not found", function (): void {
    $this->expectException(FolderNotFoundException::class);

    View::setFolderPath(__DIR__ . "/misc/not-found");
});

it("should throw an exception if the path is not a folder", function (): void {
    $this->expectException(NotAFolderException::class);

    View::setFolderPath(__DIR__ . "/misc/views/view.blade.php");
});

it("should set the folder path", function (): void {
    $viewsFolderPath = __DIR__ . "/misc";

    View::setFolderPath($viewsFolderPath);

    expect(View::getFolderPath())->toBe($viewsFolderPath);
});

it("should set the cache folder path", function (): void {
    $cachedViewsFolderPath = __DIR__ . "/misc/cache/views";

    View::setCacheFolderPath($cachedViewsFolderPath);

    expect(View::getCacheFolderPath())->toBe($cachedViewsFolderPath);
});

it("should render blade views", function (): void {
    View::setFolderPath(__DIR__ . "/misc/views");
    View::setCacheFolderPath(__DIR__ . "/misc/cache/views");

    expect(View::render("view"))->toBe("hello world\r\n");
});

it("should render plain PHP views", function (): void {
    View::setFolderPath(__DIR__ . "/misc/views");
    View::setCacheFolderPath(__DIR__ . "/misc/cache/views");

    expect(View::render("plain-view"))->toBe("hello world\r\n");
});
