<?php

/**
 * Wallee Magento
 *
 * This Magento extension enables to process payments with Wallee (https://wallee.com/).
 *
 * @package Wallee_Payment
 * @author customweb GmbH (http://www.customweb.com/)
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache Software License (ASL 2.0)
 * @link https://github.com/wallee-payment/magento
 */

/**
 * This block renders a form field in the system config that shows no scope information.
 */
class Wallee_Payment_Block_Adminhtml_System_Config_Form_Field_Label extends Mage_Adminhtml_Block_System_Config_Form_Field
{

    public function render(Varien_Data_Form_Element_Abstract $element)
    {
        $element->setCanUseWebsiteValue(false);
        $element->setCanUseDefaultValue(false);
        $element->setScopeLabel('');

        return parent::render($element);
    }
}