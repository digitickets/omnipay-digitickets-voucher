<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\Messages\Common\AbstractVoucherRequest;

class UnredeemRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
        return new UnredeemMessage($this->getTransactionId(), $this->getVoucherCode(), $this->getAmount(), $this->getTransactionId(), $this->getOrderLineRef());
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
        return new UnredeemResponse($request, $response);
    }

    protected function getListenerAction(): string
    {
        return 'UnredeemRequestSend';
    }
}
