<?php

/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Block_Reviews extends Mage_Core_Block_Template
{
    /**
     * @var LCB_Ekomi_Model_Resource_Review_Collection|array
     */
    private $reviews = [];

    /**
     * @return LCB_Ekomi_Model_Resource_Review_Collection
     */
    public function getReviews()
    {
        if (!$this->reviews) {
            $this->reviews = Mage::getModel('lcb_ekomi/review')
                ->getCollection()
                ->addOrder('submitted', Varien_Data_Collection::SORT_ORDER_DESC);
        }

        return $this->reviews;
    }

    /**
     * @return float|null
     */
    public function getAverageRating()
    {
        $reviews = $this->getReviews();
        $reviewsCount = count($reviews);

        if (!$reviewsCount) {
            return null;
        }

        $averageRating = array_sum($reviews->getColumnValues('rating')) / $reviewsCount;

        return round($averageRating, 2);
    }
}
