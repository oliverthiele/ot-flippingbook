<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

call_user_func(
    static function () {
        if (!isset($GLOBALS['TCA']['tt_content']['types']) ||
            !is_array($GLOBALS['TCA']['tt_content']['types'])) {
            $GLOBALS['TCA']['tt_content']['types'] = [];
        }

        if (!array_key_exists('ot_flippingbook', $GLOBALS['TCA']['tt_content']['types']) ||
            !is_array($GLOBALS['TCA']['tt_content']['types']['ot_flippingbook'])) {
            $GLOBALS['TCA']['tt_content']['types']['ot_flippingbook'] = [];
        }

        ExtensionManagementUtility::addTcaSelectItem(
            'tt_content',
            'CType',
            [
                'LLL:EXT:ot_flippingbook/Resources/Private/Language/locallang_be.xlf:wizard.title',
                'ot_flippingbook',
                'icon-flippingbook',
            ],
            'html',
            'after'
        );

        $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['ot_flippingbook'] = 'layout,select_key,pages';
        $GLOBALS['TCA']['tt_content']['columns']['pi_flexform']['config']['ds']['*,ot_flippingbook'] = 'FILE:EXT:ot_flippingbook/Configuration/FlexForm/FlexForm.xml';

        /*************
         * Assign Icon
         */
        $GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['ot_flippingbook'] = 'icon-flippingbook';

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
                --div--;Configuration,pi_flexform,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                --div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended',
            ]
        );
    }
);
