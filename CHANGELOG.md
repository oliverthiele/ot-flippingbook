# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [3.0.0] — 2026-07-31

### Changed

- **Breaking:** Drop TYPO3 v13 support, require TYPO3 `^14.3`
- **Breaking:** Raise the PHP minimum to `>=8.4`
- Register the FlexForm data structure through the `columnsOverrides` of the
  `ot_flippingbook` type instead of
  `ExtensionManagementUtility::addPiFlexFormValue()`, which is deprecated in
  v14 and removed in v15. Projects on TYPO3 v13 stay on the 2.1 line, where
  that method is the documented registration path
- Migrate the language files from XLIFF 1.2 to XLIFF 2.0. Unit identifiers and
  all translations are unchanged, so no label reference needs adjusting
- Reference labels via translation domain mapping instead of full file paths:
  `ot_flippingbook.be:`, `core.form.tabs:`, `core.tca:` and `frontend.ttc:`
  replace the verbose `LLL:EXT:` references

---

## [2.1.2] — 2026-07-31

### Fixed

- `addPlugin()` call was missing the required third `$extensionKey` argument, causing a fatal `InvalidArgumentException` on every request under TYPO3 v13.4. The FlexForm path had been passed as the second argument, which is the `$type` parameter, leaving `$extensionKey` unset
- FlexForm registration was lost entirely in 2.1.1 (backend showed the generic core fallback form instead of the configured fields); restored via `addPiFlexFormValue()`, the officially documented TYPO3 v13.4 migration path for CType FlexForm registration ([list_type-to-CType migration guide](https://docs.typo3.org/m/typo3/reference-coreapi/13.4/en-us/ApiOverview/ContentElements/MigrationListType.html))

## [2.1.1] — 2026-05-30

### Fixed

- Migrate TCA registration to TYPO3 v14 API: pass FlexForm path directly to `addPlugin()` instead of deprecated direct `$GLOBALS['TCA']` manipulation (fixes fatal error on TYPO3 v14)

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

[3.0.0]: https://github.com/oliverthiele/ot-flippingbook/compare/v2.1.2...v3.0.0
[2.1.2]: https://github.com/oliverthiele/ot-flippingbook/compare/v2.1.1...v2.1.2
[2.1.1]: https://github.com/oliverthiele/ot-flippingbook/compare/v2.1.0...v2.1.1
[2.1.0]: https://github.com/oliverthiele/ot-flippingbook/compare/v2.0.0...v2.1.0
[2.0.0]: https://github.com/oliverthiele/ot-flippingbook/compare/v1.0.1...v2.0.0
[1.0.1]: https://github.com/oliverthiele/ot-flippingbook/compare/v1.0.0...v1.0.1
[1.0.0]: https://github.com/oliverthiele/ot-flippingbook/releases/tag/v1.0.0