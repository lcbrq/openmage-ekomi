<?php
/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Model_Api extends Mage_Core_Model_Abstract
{
    /**
     * @var string
     */
    public const API_URL = 'https://api.ekomi.de/v3/getFeedback';

    /**
     * @return array
     */
    public function getReviews()
    {
        $username = Mage::helper('lcb_ekomi')->getUsername();
        $password = Mage::helper('lcb_ekomi')->getPassword();

        if (!$username || !$password) {
            return [];
        }

        $endpointUrl = self::API_URL;


        $endpointUrl .= "?version=cust-1.0.0&type=json&charset=utf-8&auth=$username|$password";
        $json = file_get_contents($endpointUrl);

        return json_decode($json, true);
    }

}
