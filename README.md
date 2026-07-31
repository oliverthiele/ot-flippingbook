# ot_flippingbook — FlippingBook Content Element for TYPO3

Adds a content element to embed [FlippingBook Publisher](https://flippingbook.com/) documents in TYPO3. Catalogs are
organised in a two-level folder structure; the backend select shows grouped books automatically.

[![TYPO3](https://img.shields.io/badge/TYPO3-14.3-orange.svg)](https://typo3.org/)
[![Packagist Version](https://img.shields.io/packagist/v/oliverthiele/ot-flippingbook.svg)](https://packagist.org/packages/oliverthiele/ot-flippingbook)
[![PHP](https://img.shields.io/packagist/dependency-v/oliverthiele/ot-flippingbook/php.svg)](https://php.net/)
[![License](https://img.shields.io/packagist/l/oliverthiele/ot-flippingbook.svg)](LICENSE)
[![Changelog](https://img.shields.io/badge/Changelog-CHANGELOG.md-blue.svg)](CHANGELOG.md)

## Features

- TYPO3 v13 and v14 compatible (Site Set ready)
- Embed via the official FlippingBook JavaScript embed script
- Two-level catalog folder structure with grouped backend select
- Configurable base directory via Extension Configuration
- Optional start page per content element (FlexForm)
- TypoScript auto-included via Site Set

## Requirements

| Requirement | Version        |
|-------------|----------------|
| TYPO3       | ^14.3          |
| PHP         | >=8.4          |

## Installation

```bash
composer require oliverthiele/ot-flippingbook
```

After installation, activate the **Site Set "OtFlippingbook"** for your site in the TYPO3 backend.

## Configuration

### Extension Configuration

Set the base directory in the TYPO3 Extension Manager under **ot_flippingbook**:

| Key                     | Default                | Description                                  |
|-------------------------|------------------------|----------------------------------------------|
| `flippingBookDirectory` | `public/flippingbook/` | Filesystem path relative to the project root |

### Folder Structure

The extension reads two levels of sub-directories. The first level becomes the optgroup label; the second level contains
the selectable books:

```
public/
└── flippingbook/
    ├── catalogs_en/
    │   ├── catalog-2023/
    │   └── catalog-2024/
    └── kataloge_de/
        ├── katalog-2023/
        └── katalog-2024/
```

The backend select displays the books grouped by their parent folder.

### TypoScript

TypoScript is auto-included via the Site Set. For manual integration without Site Set:

```typoscript
@import 'EXT:ot_flippingbook/Configuration/TypoScript/constants.typoscript'
@import 'EXT:ot_flippingbook/Configuration/TypoScript/setup.typoscript'
```

## Usage

1. Create a new content element and select **FlippingBook** as the content type.
2. Select the book from the dropdown.
3. Optionally enter a start page number.

The extension generates the embed `<a>` tag and loads the FlippingBook `embed.js` from the selected book's directory.

## License

GPL-2.0-or-later — © 2025 Oliver Thiele
