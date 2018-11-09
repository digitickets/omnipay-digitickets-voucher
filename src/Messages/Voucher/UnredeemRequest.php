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
        return new UnredeemMessage($this->getTransactionReference(), $this->getVoucherCode(), $this->getOriginalTransactionId());
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
