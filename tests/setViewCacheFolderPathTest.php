<?php

declare(strict_types = 1);

use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;
use Folded\View;
use function Folded\setViewCacheFolderPath;

it("should set the cache folder path", function (): void {
    $cachedViewsFolderPath = __DIR__ . "/misc/cache/views";

    setViewCacheFolderPath($cachedViewsFolderPath);

    expect(View::getCacheFolderPath())->toBe($cachedViewsFolderPath);
});

it("should throw an exception if the folder is not found", function (): void {
    $this->expectException(FolderNotFoundException::class);

    setViewCacheFolderPath(__DIR__ . "/misc/not-found");
});

it("should set the folder path in the exception if the folder is not found", function (): void {
    $folder = __DIR__ . "/misc/not-found";

    try {
        setViewCacheFolderPath($folder);
    } catch (FolderNotFoundException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});

it("should throw an exception if the path is not a folder", function (): void {
    $this->expectException(NotAFolderException::class);

    setViewCacheFolderPath(__DIR__ . "/misc/views/view.blade.php");
});

it("should set the folder path in the exception if the path is not a folder", function (): void {
    $folder  = __DIR__ . "/misc/views/view.blade.php";

    try {
        setViewCacheFolderPath($folder);
    } catch (NotAFolderException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});
