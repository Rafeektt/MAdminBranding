<?php
/**
 * Copyright © Rafeektt. All rights reserved.
 * See LICENCE.txt for licence details.
 */
declare(strict_types=1);

namespace Rafeektt\MAdminBranding\Model;

use Rafeektt\MAdminBranding\Model\Config\Backend\AdminLoginLogo;
use Rafeektt\MAdminBranding\Model\Config\Backend\AdminMenuLogo;
use Rafeektt\MAdminBranding\Scope\Config;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem\Driver\File as FileDriver;
use Magento\Framework\UrlInterface;

class AdminLogo
{
    /** @var Config */
    private Config $moduleConfig;

    /** @var FileDriver */
    private FileDriver $fileDriver;

    /** @var UrlInterface */
    private UrlInterface $urlBuilder;

    /** @var array */
    private array $cachedLogo = [];

    /**
     * @param Config $moduleConfig
     * @param FileDriver $fileDriver
     * @param UrlInterface $urlBuilder
     */
    public function __construct(
        Config $moduleConfig,
        FileDriver $fileDriver,
        UrlInterface $urlBuilder
    ) {
        $this->moduleConfig = $moduleConfig;
        $this->fileDriver = $fileDriver;
        $this->urlBuilder = $urlBuilder;
    }

    /**
     * @return string|null
     */
    public function getCustomAdminLoginLogoSrc(): ?string
    {
        if (isset($this->cachedLogo['login_logo_src'])) {
            return $this->cachedLogo['login_logo_src'];
        }

        if (!$logoFileName = $this->moduleConfig->getAdminLoginLogoFileName()) {
            return null;
        }

        return $this->cachedLogo['login_logo_src'] = $this->fileDriver->getAbsolutePath(
            $this->urlBuilder->getBaseUrl() . DirectoryList::MEDIA . DIRECTORY_SEPARATOR,
            AdminLoginLogo::UPLOAD_DIR . DIRECTORY_SEPARATOR . $logoFileName
        );
    }

    /**
     * @return string|null
     */
    public function getCustomAdminMenuLogoSrc(): ?string
    {
        if (isset($this->cachedLogo['menu_logo_src'])) {
            return $this->cachedLogo['menu_logo_src'];
        }

        if (!$logoFileName = $this->moduleConfig->getAdminMenuLogoFileName()) {
            return null;
        }

        return $this->cachedLogo['menu_logo_src'] = $this->fileDriver->getAbsolutePath(
            $this->urlBuilder->getBaseUrl() . DirectoryList::MEDIA . DIRECTORY_SEPARATOR,
            AdminMenuLogo::UPLOAD_DIR . DIRECTORY_SEPARATOR . $logoFileName
        );
    }

    /**
     * @return string|null
     */
    public function getCopyrightText(): ?string
    {
        return $this->moduleConfig->getCopyrightText();
    }
}
