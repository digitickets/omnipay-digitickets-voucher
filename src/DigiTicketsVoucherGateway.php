<?php

namespace DigiTickets\DigiTicketsVoucher;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractVoucherGateway;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\AuthorizeRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\PurchaseRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\RedeemRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\RefundRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\UnredeemRequest;
use DigiTickets\DigiTicketsVoucher\Messages\Requests\ValidateRequest;
use Omnipay\Common\AbstractGateway;

class DigiTicketsVoucherGateway extends AbstractVoucherGateway
{
    public function getName()
    {
        return 'DigiTickets Vouchers';
    }

    // These are the standard Omnipay methods, which actually call the methods below.
    public function authorize(array $parameters = array())
    {
        $parameters['validateRequest'] = $this->validate($parameters);
        return $this->createRequest(AuthorizeRequest::class, $parameters);
    }

    public function purchase(array $parameters = array())
    {
        $parameters['validateRequest'] = $this->validate($parameters);
        $parameters['redeemRequest'] = $this->redeem($parameters);
        return $this->createRequest(PurchaseRequest::class, $parameters);
    }

    public function refund(array $parameters = array())
    {
        $parameters['unredeemRequest'] = $this->unredeem($parameters);
        return $this->createRequest(RefundRequest::class, $parameters);
    }

    // These are the methods that the DT voucher interface demand. @TODO: That interface needs to be built.
    // @TODO: Could we put these methods in the abstract voucher gateway class?
    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function validate(array $parameters = array())
    {
error_log('This is validate');
error_log('Class name is: '.ValidateRequest::class);
        $parameters['gateway'] = $this;
        return $this->createRequest(ValidateRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function redeem(array $parameters = array())
    {
        $parameters['gateway'] = $this;
        return $this->createRequest(RedeemRequest::class, $parameters);
    }

    /**
     * @param array $parameters
     * @return AbstractRequest
     */
    public function unredeem(array $parameters = array())
    {
        $parameters['gateway'] = $this;
        return $this->createRequest(UnredeemRequest::class, $parameters);
    }
}