<?php
/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Helper_Data extends Mage_Core_Helper_Abstract
{
    /**
     * @var string
     */
    public const XPATH_IS_ENABLED = 'lcb_ekomi/api/enabled';

    /**
     * @var string
     */
    public const XPATH_API_USERNAME = 'lcb_ekomi/api/username';

    /**
     * @var string
     */
    public const XPATH_API_PASSWORD = 'lcb_ekomi/api/password';

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return Mage::getStoreConfigFlag(self::XPATH_IS_ENABLED);
    }

    /**
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return Mage::getStoreConfig(self::XPATH_API_USERNAME);
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return Mage::getStoreConfig(self::XPATH_API_PASSWORD);
    }

}
