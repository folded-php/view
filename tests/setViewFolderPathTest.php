<?php

declare(strict_types = 1);

use Folded\Exceptions\FolderNotFoundException;
use Folded\Exceptions\NotAFolderException;
use Folded\View;
use function Folded\setViewFolderPath;

it("should set the view folder path", function (): void {
    $viewsFolderPath = __DIR__ . "/misc/views";

    setViewFolderPath($viewsFolderPath);

    expect(View::getFolderPath())->toBe($viewsFolderPath);
});

it("should throw an exception if the path is not found", function (): void {
    $this->expectException(FolderNotFoundException::class);

    setViewFolderPath(__DIR__ . "/misc/not-found");
});

it("should set the folder in the exception if the path is not found", function (): void {
    $folder = __DIR__ . "/misc/not-found";

    try {
        setViewFolderPath(__DIR__ . "/misc/not-found");
    } catch (FolderNotFoundException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});

it("should throw an exception if the path is not a folder", function (): void {
    $this->expectException(NotAFolderException::class);

    setViewFolderPath(__DIR__ . "/misc/views/view.blade.php");
});

it("should set the folder in the exception if the path is not a folder", function (): void {
    $folder = __DIR__ . "/misc/views/view.blade.php";

    try {
        setViewFolderPath($folder);
    } catch (NotAFolderException $exception) {
        expect($exception->getFolder())->toBe($folder);
    }
});
