<?php
/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Block_Reviews extends Mage_Core_Block_Template
{
    /**
     * @return LCB_Ekomi_Model_Resource_Review_Collection
     */
    public function getReviews()
    {
        return Mage::getModel('lcb_ekomi/api')->getCollection();
    }
}
