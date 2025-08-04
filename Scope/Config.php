<?php
/**
 * Copyright © Rafeektt. All rights reserved.
 * See LICENCE.txt for licence details.
 */
declare(strict_types=1);

namespace Rafeektt\MAdminBranding\Scope;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    private const XML_PATH_ADMIN_LOGIN_LOGO = 'admin/madmin_branding/login';
    private const XML_PATH_ADMIN_MENU_LOGO = 'admin/madmin_branding/menu';
    private const XML_PATH_COPYRIGHT_TEXT = 'admin/madmin_branding/copyright_text';

    /** @var ScopeConfigInterface */
    private ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string|null
     */
    public function getAdminLoginLogoFileName(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ADMIN_LOGIN_LOGO);
    }

    /**
     * @return string|null
     */
    public function getAdminMenuLogoFileName(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_ADMIN_MENU_LOGO);
    }

    /**
     * @return string|null
     */
    public function getCopyrightText(): ?string
    {
        return $this->scopeConfig->getValue(self::XML_PATH_COPYRIGHT_TEXT);
    }
}
