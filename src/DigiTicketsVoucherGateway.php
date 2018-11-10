<?php

namespace DigiTickets\DigiTicketsVoucher;

use DigiTickets\OmnipayAbstractVoucher\AbstractVoucherGateway;
use DigiTickets\DigiTicketsVoucher\Messages\Omnipay\AuthorizeRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Omnipay\PurchaseRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Omnipay\RefundRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Voucher\RedeemRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Voucher\ValidateRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Voucher\UnredeemRequest;

class DigiTicketsVoucherGateway extends AbstractVoucherGateway
{
    public function getName()
    {
        return 'DigiTickets Gift Vouchers';
    }

    protected function createRequest($class, array $parameters)
    {
        $parameters['gateway'] = $this;

        return parent::createRequest($class, $parameters);
    }

    // These are the standard Omnipay methods, which actually call the methods below.
    public function authorize(array $parameters = array())
    {
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function refund(array $parameters = array())
    {
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    // These are the methods that the DigiTickets voucher interface demands.
    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function validate(array $parameters = array())
    {
error_log('[Driver] This is validate');
error_log('[Driver] Class name is: '.ValidateRequest::class);
        return $this->createRequest(ValidateRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function redeem(array $parameters = array())
    {
        return $this->createRequest(RedeemRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function unredeem(array $parameters = array())
    {
        return $this->createRequest(UnredeemRequest::class, $parameters);
    }

    public function setVirtualApi($value)
    {
error_log('[Driver] setVirtualApi is being called');
        $this->setParameter('virtualApi', $value);
    }

    public function getVirtualApi()
    {
error_log('[Driver] getVirtualApi is being called');
        return $this->getParameter('virtualApi');
    }
}