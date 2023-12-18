<?php

declare(strict_types=1);

namespace OliverThiele\OtFlippingbook\UserFunc;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class FlexFormUserFunc
 */
class FlexFormUserFunc
{
    /**
     * @param array<mixed> $fConfig
     * @throws ExtensionConfigurationPathDoesNotExistException
     * @throws ExtensionConfigurationExtensionNotConfiguredException
     */
    public function getFlippingBooks(array &$fConfig): void
    {
        $publicPath = Environment::getProjectPath();

        $extensionSettings = GeneralUtility::makeInstance(
            ExtensionConfiguration::class
        )->get('ot_flippingbook');


        if (is_array($extensionSettings) && is_string(
                $extensionSettings['flippingBookDirectory']
            ) && $extensionSettings['flippingBookDirectory'] !== '') {
            $directoryFlippingBooks = $publicPath . $extensionSettings['flippingBookDirectory'];
        }

        if (isset($directoryFlippingBooks) && is_dir($directoryFlippingBooks)) {
            $directories = $this->getDirectoriesTwoLevels($directoryFlippingBooks);


            foreach ($directories as $key => $directory) {
                $fConfig['items'][] = [
                    $key,
                    '--div--'
                ];

                foreach ($directory as $subKey => $subDirectory) {
                    $fConfig['items'][] = [
                        str_replace($key . '/', '', $subDirectory),
                        $subDirectory
                    ];
                }
            }
        }
    }

    protected function getDirectoriesTwoLevels($baseDir): array
    {
        $result = [];

        $baseDir = rtrim($baseDir, '/');

        $removePath = $baseDir;

        $firstLevelDirs = glob($baseDir . '/*', GLOB_ONLYDIR);

        foreach ($firstLevelDirs as $dir) {
            $relativeDir = str_replace($removePath, '', $dir);

            $result[$relativeDir] = [];

            $secondLevelDirs = glob($dir . '/*', GLOB_ONLYDIR);
            foreach ($secondLevelDirs as $subDir) {
                $relativeSubDir = str_replace($removePath, '', $subDir);
                $result[$relativeDir][] = $relativeSubDir;
            }
        }
        return $result;
    }

}
