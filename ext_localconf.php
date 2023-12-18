<?php

declare(strict_types=1);

defined('TYPO3') or die();

use TYPO3\CMS\Core\Information\Typo3Version;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;

call_user_func(
    static function () {
        $versionInformation = GeneralUtility::makeInstance(Typo3Version::class);

        if ($versionInformation->getMajorVersion() < 12) {
            ExtensionManagementUtility::addPageTSConfig(
                '@import "EXT:ot_flippingbook/Configuration/page.tsconfig"'
            );
        }
    }
);
