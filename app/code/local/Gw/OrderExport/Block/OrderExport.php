<?php

class Gw_OrderExport_Block_OrderExport extends Mage_Core_Block_Template
{
    /**
     * Get order export collection.
     *
     * @return mixed
     */
    public function getOrderExportCollection()
    {
        $pcollection = Mage::getModel('catalog/product')
            ->getCollection()
            ->addAttributeToSort('created_at', 'DESC')
            ->addAttributeToSelect('*');

            return $pcollection;
    }
}
