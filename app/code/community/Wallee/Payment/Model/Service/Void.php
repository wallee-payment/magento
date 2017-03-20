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
 * This service provides functions to deal with Wallee transaction voids.
 */
class Wallee_Payment_Model_Service_Void extends Wallee_Payment_Model_Service_Abstract
{

    /**
     * The transaction void API service.
     *
     * @var \Wallee\Sdk\Service\TransactionVoidService
     */
    private $transactionVoidService;

    /**
     * Void the transaction of the given payment.
     *
     * @param Mage_Sales_Model_Order_Payment $payment
     * @return \Wallee\Sdk\Model\TransactionVoid
     */
    public function void(Mage_Sales_Model_Order_Payment $payment)
    {
        return $this->getTransactionVoidService()->transactionVoidVoidOnlinePost(
            $payment->getOrder()
            ->getWalleeSpaceId(), $payment->getOrder()
            ->getWalleeTransactionId()
        );
    }

    /**
     * Returns the transaction void API service.
     *
     * @return \Wallee\Sdk\Service\TransactionVoidService
     */
    private function getTransactionVoidService()
    {
        if ($this->transactionVoidService == null) {
            $this->transactionVoidService = new \Wallee\Sdk\Service\TransactionVoidService(Mage::helper('wallee_payment')->getApiClient());
        }

        return $this->transactionVoidService;
    }
}