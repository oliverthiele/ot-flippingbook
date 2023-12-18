# EXT:ot_flippingbook

## TYPO3 Extension

This extension for TYPO3 v11.5 allows the output of FlippingBooks.

### Installation

Composer Installation

```shell
composer require oliverthiele/ot-flippingbook
```

Don't forget to add the TypoScript in your root template.

### Configuration

The path to the FlippingBooks can be defined in the extension configuration.
By default, `public/flippingbook/` is preconfigured.
All subfolders of this folder are automatically output as an optgroup in the content element.
The sub-subfolders must then contain the generated FlippingBooks.

#### Example

The following folder structure for 4 catalogs is in the public folder:

    public/
        flippingbook/
            kataloge_de/
                katalog-2023/
                katalog-2024/
            catalogs_en/
                catalog-2023/
                catalog-2024/

In the content element, the select box appears with this structure:

    kataloge_de/
        katalog-2023/
        katalog-2024/
    catalogs_en/
        catalog-2023/
        catalog-2024/

The FluidTemplate of the extension then automatically integrates the JavaScript file
_.../files/html/static/embed.js_ from the FlippingBook folders.
