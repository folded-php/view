# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Added

- New function `getRenderedView()` to store the content of a view (useful to send emails from a blade file for example).

## [0.2.3] 2020-10-03

### Fixed

- Updated dependency `folded/exception` to version 0.4.\*.

## [0.2.2] 2020-10-01

### Fixed

- Added missing namespace `Folded` to `function_exists` statements.

## [0.2.1] 2020-09-18

### Fixed

- Dependency updated.

## [0.2.0] 2020-09-12

### Added

- New method `Folded\addDataToView` to always add certain data to a specific view.

## [0.1.2] 2020-09-11

### Fixed

- Using all the methods will no longer raise a namespace error.

## [0.1.1] 2020-09-07

### Added

- **Nothing change** on your code. We are now using an internal package for our exception instead of local exception for `Folded\Exceptions\FolderNotFoundException` and `Folded\Exceptions\NotAFolderException`.

## [0.1.0] 2020-09-05

### Added

- First working version.
