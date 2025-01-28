<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

call_user_func(
    static function () {
        ExtensionManagementUtility::addPlugin(
            [
                'label' => 'LLL:EXT:ot_flippingbook/Resources/Private/Language/locallang_be.xlf:wizard.title',
                'description' => 'LLL:EXT:ot_flippingbook/Resources/Private/Language/locallang_be.xlf:wizard.description',
                'value' => 'ot_flippingbook',
                'icon' => 'icon-flippingbook',
                'group' => 'plugins'
            ],
            'CType',
            'ot_flippingbook'
        );

        ExtensionManagementUtility::addPiFlexFormValue(
            '*',
            'FILE:EXT:ot_flippingbook/Configuration/FlexForm/FlexForm.xml',
            'ot_flippingbook',
        );

        /************************
         * Configure element type
         */
        $GLOBALS['TCA']['tt_content']['types']['ot_flippingbook'] = array_replace_recursive(
            $GLOBALS['TCA']['tt_content']['types']['ot_flippingbook'],
            [
                'showitem' => '
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;headers,
                --div--;LLL:EXT:ot_flippingbook/Resources/Private/Language/locallang_be.xlf:tt_content.tab.configuration,pi_flexform,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
            ]
        );
    }
);
