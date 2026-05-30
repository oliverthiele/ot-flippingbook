# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [2.1.0] — 2026-05-30

### Added

- Site Set `OtFlippingbook` for auto-inclusion of TypoScript (TYPO3 v13+ Site Sets API)
- `Configuration/SiteKit.yaml` for SiteKit integration
- `phpstan.neon.dist` for static analysis at level 8

### Changed

- Replace deprecated `ExtensionManagementUtility::addPiFlexFormValue()` with direct TCA assignment (v13/v14 compatible, removes deprecation warning in v14)
- FlexForm `page` field: migrated from `type="input" eval="trim,int"` to `type="number" format="integer"`
- `FlexFormUserFunc::getDirectoriesTwoLevels()`: added `string` type declaration, guard `glob()` against returning `false`
- `composer.json`: added `php >=8.2` constraint, phpstan dev dependencies, keywords, support links
- Fixed typo "TYPOP3" → "TYPO3" in `composer.json` and `ext_emconf.php` description

## [2.0.0] — 2025-01-28

### Added

- TYPO3 v13.4 compatibility

### Removed

- `ext_localconf.php` (old plugin registration, replaced by TCA-based approach)
- `Configuration/page.tsconfig`

## [1.0.1] — 2024-08-19

### Added

- TYPO3 v12.4 compatibility

### Fixed

- Type casting issue in `FlexFormUserFunc`

## [1.0.0] — 2023-12-18

### Added

- Initial release: content element for FlippingBook Publisher documents
- Two-level folder structure with grouped backend select
- FlexForm for book selection and optional start page
- Extension Configuration for configurable base directory

[2.1.0]: https://github.com/oliverthiele/ot-flippingbook/compare/v2.0.0...v2.1.0
[2.0.0]: https://github.com/oliverthiele/ot-flippingbook/compare/v1.0.1...v2.0.0
[1.0.1]: https://github.com/oliverthiele/ot-flippingbook/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/oliverthiele/ot-flippingbook/releases/tag/v1.0.0