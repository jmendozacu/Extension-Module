<?php

//
//$this->startSetup();
//$this->addAttribute(Mage_Catalog_Model_Product::ENTITY, 'display_on_homepage', array(
//    'group'         => 'General Information',
//    'input'         => 'select',
//    'type'          => 'text',
//    'label'         => 'Display on homepage',
//    'backend'       => '',
//    'visible'       => true,
//    'required'      => false,
//    'visible_on_front' => true,
//    'global'        => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
//    'source' => 'eav/entity_attribute_source_boolean',
//));
//
//$this->endSetup();




$installer = new Mage_Eav_Model_Entity_Setup('core_setup');
$installer->startSetup();
$installer->addAttribute('catalog_product', 'display_on_homepage', array(
    'group'           => 'General',
    'label'           => 'Display on Homepage1',
    'input'           => 'select',
    'type'            => 'varchar',
//    'backend'         => 'test',
    'required'        => 0,
    'visible_on_front'=> 1,
    'filterable'      => 0,
    'searchable'      => 0,
    'comparable'      => 0,
    'user_defined'    => 1,
    'is_configurable' => 0,
    'global'          => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
    'note'            => '',
    'source' => 'eav/entity_attribute_source_boolean',
));
$installer->endSetup();
