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
    /** @var callable*/
    private $logger = null;

    /** @var string */
    private $uniqueLogKey = '';

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
        $this->setParameter('virtualApi', $value);
    }

    public function getVirtualApi()
    {
        return $this->getParameter('virtualApi');
    }

    /**
     * Pass in a callback, with properties of type (string $message, array $data=null)
     * @param callable $callback
     *
     * @return void
     */
    public function registerLoggerCallback(callable $callback)
    {
        $this->logger = $callback;
        $this->uniqueLogKey = uniqid();
    }

    public function log(string $message, array $data = null)
    {
        if (is_callable($this->logger)) {
            $message = '[DTVoucher-'.$this->uniqueLogKey.'] '.$message;
            ($this->logger)($message, $data);
        }
    }
}