<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use DigiTickets\DigiTicketsVoucher\Messages\RedeemMessage;
use DigiTickets\DigiTicketsVoucher\Messages\Responses\RedeemResponse;

class RedeemRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
        return new RedeemMessage($this->getVoucherCode());
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
}
