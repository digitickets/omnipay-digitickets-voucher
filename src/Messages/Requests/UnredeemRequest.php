<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use DigiTickets\DigiTicketsVoucher\Messages\Responses\UnredeemResponse;
use DigiTickets\DigiTicketsVoucher\Messages\UnredeemMessage;
use Omnipay\Common\Message\AbstractRequest;

class UnredeemRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
        return new UnredeemMessage($this->getVoucherCode());
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
}
