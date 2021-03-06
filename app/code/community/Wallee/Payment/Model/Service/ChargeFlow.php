<?php

/**
 * wallee Magento 1
 *
 * This Magento extension enables to process payments with wallee (https://www.wallee.com/).
 *
 * @package Wallee_Payment
 * @author wallee AG (http://www.wallee.com/)
 * @license http://www.apache.org/licenses/LICENSE-2.0  Apache Software License (ASL 2.0)
 */

/**
 * This service provides functions to deal with wallee charge flows.
 */
class Wallee_Payment_Model_Service_ChargeFlow extends Wallee_Payment_Model_Service_Abstract
{

    /**
     * The charge flow API service.
     *
     * @var \Wallee\Sdk\Service\ChargeFlowService
     */
    protected $_chargeFlowService;

    /**
     * Apply a charge flow to the given transaction.
     *
     * @param \Wallee\Sdk\Model\Transaction $transaction
     */
    public function applyFlow(\Wallee\Sdk\Model\Transaction $transaction)
    {
        $this->getChargeFlowService()->applyFlow($transaction->getLinkedSpaceId(), $transaction->getId());
    }

    /**
     * Returns the charge flow API service.
     *
     * @return \Wallee\Sdk\Service\ChargeFlowService
     */
    protected function getChargeFlowService()
    {
        if ($this->_chargeFlowService == null) {
            $this->_chargeFlowService = new \Wallee\Sdk\Service\ChargeFlowService(
                $this->getHelper()->getApiClient());
        }

        return $this->_chargeFlowService;
    }
}