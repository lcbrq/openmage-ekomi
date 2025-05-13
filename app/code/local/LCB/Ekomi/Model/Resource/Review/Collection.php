<?php
/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Model_Resource_Review_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    protected function _construct()
    {
        $this->_init('lcb_ekomi/review');
    }
}
