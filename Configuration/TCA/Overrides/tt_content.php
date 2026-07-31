<?php

declare(strict_types=1);

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die();

call_user_func(
    static function () {
        ExtensionManagementUtility::addPlugin(
            [
                'label' => 'ot_flippingbook.be:wizard.title',
                'description' => 'ot_flippingbook.be:wizard.description',
                'value' => 'ot_flippingbook',
                'icon' => 'icon-flippingbook',
                'group' => 'plugins',
            ],
            'CType',
            'ot_flippingbook'
        );

        // Registers the FlexForm data structure. ExtensionManagementUtility::
        // addPiFlexFormValue() is deprecated since v14 and removed in v15.
        $GLOBALS['TCA']['tt_content']['types']['ot_flippingbook']['columnsOverrides']['pi_flexform']['config']['ds']
            = 'FILE:EXT:ot_flippingbook/Configuration/FlexForm/FlexForm.xml';

        $GLOBALS['TCA']['tt_content']['types']['ot_flippingbook']['showitem'] = '
            --div--;core.form.tabs:general,
            --palette--;frontend.ttc:palette.general;general,
            --palette--;frontend.ttc:palette.headers;headers,
            --div--;ot_flippingbook.be:tt_content.tab.configuration,pi_flexform,
            --div--;frontend.ttc:tabs.appearance,
            --palette--;frontend.ttc:palette.frames;frames,
            --palette--;frontend.ttc:palette.appearanceLinks;appearanceLinks,
            --div--;core.form.tabs:language,
            --palette--;;language,--div--;core.form.tabs:access,
            --palette--;;hidden,--palette--;frontend.ttc:palette.access;access,
            --div--;core.form.tabs:categories,
            --div--;core.tca:sys_category.tabs.category,categories,
            --div--;core.form.tabs:notes,rowDescription,
            --div--;core.form.tabs:extended';
    }
);
