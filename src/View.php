<?php

declare(strict_types = 1);

namespace Foled;

use Folded\Exceptions\NotAFolderException;
use Folded\Exceptions\FolderNotFoundException;
use Illuminate\View\Factory;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Compilers\BladeCompiler;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Engines\PhpEngine;
use Illuminate\View\FileViewFinder;

/**
 * Represent the view to display.
 *
 * @since 0.1.0
 */
class View
{
    /**
     * The path to the folder containing the cached (e.g. compiled) views.
     *
     * @since 0.1.0
     */
    private static string $cacheFolderPath = "";

    /**
     * The engine that is responsible for compiling the views.
     *
     * @since 0.1.0
     */
    private static ?Factory $engine = null;

    /**
     * The path to the folder containing the views.
     *
     * @since 0.1.0
     */
    private static string $folderPath = "";

    /**
     * Get the cached views folder path.
     *
     * @since 0.1.0
     *
     * @example
     * View::setCacheFolderPath(__DIR__ . "/cache/views");
     *
     * echo View::getCacheFolderPath();
     */
    public static function getCacheFolderPath(): string
    {
        return self::$cacheFolderPath;
    }

    /**
     * Gets the folder path to the views.
     *
     * @since 0.1.0
     *
     * @example
     * View::setFolderPath(__DIR__ . "/views");
     *
     * echo View::getFolderPath();
     */
    public static function getFolderPath(): string
    {
        return self::$folderPath;
    }

    /**
     * Returns the compiled view as a string.
     *
     * @param string $path The path to the view (can be expressed using dot syntax).
     * @param array  $data An associative array of key and values to pass to the view.
     *
     * @since 0.1.0
     *
     * @example
     * View::setFolderPath(__DIR__ . "/views");
     *
     * echo View::render("home.index"); // Which means it is stored at views/home/index.blade.php
     */
    public static function render(string $path, array $data = []): string
    {
        return self::engine()->make($path, $data)->render();
    }

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
     * View::setCacheFolderPath(__DIR__ . "/cache/views");
     */
    public static function setCacheFolderPath(string $path): void
    {
        self::checkFolder($path);

        self::$cacheFolderPath = $path;
    }

    /**
     * Set the folder path for the engine to find and compile views from.
     *
     * @param string $path The path to the folder containing the views.
     *
     * @throws Folded\Exceptions\FolderNotFound If the folder path is not found.
     * @throws Folded\Exceptions\NotAFolder     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * View::setFolderPath(__DIR__ . "/views");
     */
    public static function setFolderPath(string $path): void
    {
        self::checkFolder($path);

        self::$folderPath = $path;
    }

    /**
     * Throws exceptions if the folder is not correct.
     *
     * @throws FolderNotFound If the folder is not found.
     * @throws NotAFolder     If the path is not a folder.
     *
     * @since 0.1.0
     *
     * @example
     * View::checkFolder("some/folder");
     */
    private static function checkFolder(string $path): void
    {
        if (!file_exists($path)) {
            throw (new FolderNotFoundException("folder $path not found"))->setFolder($path);
        }

        if (!is_dir($path)) {
            throw (new NotAFolderException("$path is not a folder"))->setFolder($path);
        }
    }

    /**
     * Setup the required class to get an instance of the view engine (acting as a singleton).
     *
     * @since 0.1.0
     *
     * @example
     * $engine = View::engine();
     */
    private static function engine(): Factory
    {
        if (!(static::$engine instanceof Factory)) {
            // Dependencies
            $filesystem = new Filesystem();
            $eventDispatcher = new Dispatcher(new Container());

            // Create View Factory capable of rendering PHP and Blade templates
            $viewResolver = new EngineResolver();
            $bladeCompiler = new BladeCompiler($filesystem, static::$cacheFolderPath);

            $viewResolver->register('blade', function () use ($bladeCompiler) {
                return new CompilerEngine($bladeCompiler);
            });

            $viewResolver->register('php', function () {
                return new PhpEngine();
            });

            $viewFinder = new FileViewFinder($filesystem, [static::$folderPath]);
            $viewFactory = new Factory($viewResolver, $viewFinder, $eventDispatcher);

            static::$engine = $viewFactory;
        }

        return static::$engine;
    }
}
