<?php

declare(strict_types=1);

namespace OliverThiele\OtFlippingbook\UserFunc;

use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Core\Environment;
use TYPO3\CMS\Core\Utility\GeneralUtility;

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
            $directoryFlippingBooks = $this->normalizePath(
                $publicPath . '/' . $extensionSettings['flippingBookDirectory']
            );
        }

        if (isset($directoryFlippingBooks) && is_dir($directoryFlippingBooks)) {
            $directories = $this->getDirectoriesTwoLevels($directoryFlippingBooks);

            foreach ($directories as $key => $directory) {
                $fConfig['items'][] = [
                    'label' => $key,
                    'value' => '--div--',
                ];

                foreach ($directory as $subDirectory) {
                    $fConfig['items'][] = [
                        'label' => str_replace($key . '/', '', $subDirectory),
                        'value' => $subDirectory,
                    ];
                }
            }
        }
    }

    protected function normalizePath(string $path): string
    {
        return preg_replace('#/{2,}#', '/', $path) ?? $path;
    }

    /**
     * @return array<string, list<string>>
     */
    protected function getDirectoriesTwoLevels(string $baseDirectory): array
    {
        $result = [];
        $baseDirectory = rtrim($baseDirectory, '/');

        $firstLevelDirectories = glob($baseDirectory . '/*', GLOB_ONLYDIR);
        if ($firstLevelDirectories === false) {
            return $result;
        }

        foreach ($firstLevelDirectories as $directory) {
            $relativeDirectory = str_replace($baseDirectory, '', $directory);
            $result[$relativeDirectory] = [];

            $secondLevelDirectories = glob($directory . '/*', GLOB_ONLYDIR);
            if ($secondLevelDirectories === false) {
                continue;
            }

            foreach ($secondLevelDirectories as $subDirectory) {
                $result[$relativeDirectory][] = str_replace($baseDirectory, '', $subDirectory);
            }
        }

        return $result;
    }
}
