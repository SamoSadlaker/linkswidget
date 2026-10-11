# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.2.0] - 2026-10-11

### Added
- Local PHPUnit test suite and a `composer test` script.
- `title` and `description` options for the widget itself.
- Translatable widget strings (`lang/en/messages.php`).
- Addon metadata (`support`, developer info) for the Statamic Marketplace.

### Changed
- Build tooling now uses Tailwind CSS v4 via `@statamic/cms/tailwind.css` so the
  widget uses the Control Panel's own design tokens and dark mode.
- Redesigned widget markup to match the Control Panel in light and dark mode.
- Config file moved to `config/statamic/linkswidget.php` (config key
  `statamic.linkswidget`) so it is published and stored alongside Statamic's own
  config files.
- PHP namespace renamed from `SamoSadlaker\Linkswidget` to `SamoSadlaker\LinksWidget`.

### Fixed
- A configured icon that does not exist no longer throws an exception; it falls
  back to the default link icon.
- Removed duplicate view registration and a stale `mix-manifest.json` ignore entry.

### Migration
- Republish the config (`php artisan vendor:publish --tag=linkswidget-config`)
  and move your links from `config/statamic/links.php` to
  `config/statamic/linkswidget.php`. The old location is no longer read.

## [0.1.0] - 2026-08-13

### Changed
- Added Statamic v6 compatibility while keeping Statamic v5 support.
- Updated addon build tooling by removing the Vue 2 plugin and modernizing Vite dependencies.
- Refreshed widget visuals to better match newer Statamic CP styling.

### Fixed
- Removed legacy addon boot behavior that could cause duplicate boot issues.
- Improved widget link data handling to prevent malformed config entries from breaking rendering.

### Migration
- Icon format now uses Statamic native icon names (for example `home`) instead of Boxicons class names.
- Legacy Boxicons values now fall back to a default icon.

## [0.0.1] - 2024-06-19

### Added
- Started versioning
- Updated for Statamic v5
