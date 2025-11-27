<?php

/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
class LCB_Ekomi_Model_Cron
{
    /**
     * @return void
     */
    public function importReviews(): void
    {
        try {

            if (!Mage::helper('lcb_ekomi')->isEnabled()) {
                return;
            }

            $api = Mage::getModel('lcb_ekomi/api');
            $reviewsData = $api->getReviews();

            $collection = Mage::getModel('lcb_ekomi/review')->getCollection();
            foreach ($collection as $item) {
                $item->delete();
            }

            foreach ($reviewsData as $data) {
                Mage::getModel('lcb_ekomi/review')
                    ->setData([
                        'submitted' => $data['submitted'],
                        'order_id'  => $data['order_id'],
                        'rating'    => $data['rating'],
                        'review'    => $data['review'],
                        'comment'   => $data['comment']
                    ])->save();
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
            Mage::logException($e);
        }
    }
}
