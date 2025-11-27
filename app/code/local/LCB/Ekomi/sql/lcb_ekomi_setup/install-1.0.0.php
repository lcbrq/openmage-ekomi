<?php

/**
 * @author Tomasz Gregorczyk <tomasz@silpion.com.pl>
 */
$installer = $this;
$installer->startSetup();

$table = $installer->getConnection()
    ->newTable($installer->getTable('lcb_ekomi_reviews'))
    ->addColumn('entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [
        'identity' => true, 'nullable' => false, 'primary' => true
    ], 'ID')
    ->addColumn('submitted', Varien_Db_Ddl_Table::TYPE_INTEGER, null, [], 'Submitted')
    ->addColumn('order_id', Varien_Db_Ddl_Table::TYPE_TEXT, 32, [], 'Order ID')
    ->addColumn('rating', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, [], 'Rating')
    ->addColumn('review', Varien_Db_Ddl_Table::TYPE_TEXT, '2k', [], 'Review')
    ->addColumn('comment', Varien_Db_Ddl_Table::TYPE_TEXT, '2k', [], 'Comment')
    ->setComment('Ekomi Reviews');

$installer->getConnection()->createTable($table);
$installer->endSetup();
