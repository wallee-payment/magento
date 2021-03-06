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
 * This service provides functions to deal with wallee transaction completions.
 */
class Wallee_Payment_Model_Service_TransactionCompletion extends Wallee_Payment_Model_Service_Abstract
{

    /**
     * The transaction completion API service.
     *
     * @var \Wallee\Sdk\Service\TransactionCompletionService
     */
    protected $_transactionCompletionService;

    /**
     * Completes a transaction completion.
     *
     * @param Mage_Sales_Model_Order_Payment $payment
     * @return \Wallee\Sdk\Model\TransactionCompletion
     */
    public function complete(Mage_Sales_Model_Order_Payment $payment)
    {
        return $this->getTransactionCompletionService()->completeOnline(
            $payment->getOrder()
                ->getWalleeSpaceId(), $payment->getOrder()
                ->getWalleeTransactionId());
    }

    /**
     * Returns the transaction completion API service.
     *
     * @return \Wallee\Sdk\Service\TransactionCompletionService
     */
    protected function getTransactionCompletionService()
    {
        if ($this->_transactionCompletionService == null) {
            $this->_transactionCompletionService = new \Wallee\Sdk\Service\TransactionCompletionService(
                $this->getHelper()->getApiClient());
        }

        return $this->_transactionCompletionService;
    }
}