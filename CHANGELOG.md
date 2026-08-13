# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

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
