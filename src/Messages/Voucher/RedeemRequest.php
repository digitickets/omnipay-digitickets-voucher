<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\Messages\Common\AbstractVoucherRequest;

class RedeemRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
error_log('RedeemRequest::buildMessage(): Amount: '.$this->getAmount());
        return new RedeemMessage($this->getVoucherCode(), $this->getAmount(), $this->getTransactionId(), $this->getOrderLineRef());
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
        return new RedeemResponse($request, $response);
    }

    protected function getListenerAction(): string
    {
        return 'redeemRequestSend';
    }
}
