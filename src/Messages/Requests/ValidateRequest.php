<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use DigiTickets\DigiTicketsVoucher\Messages\Responses\ValidateResponse;
use DigiTickets\DigiTicketsVoucher\Messages\ValidateMessage;
use Omnipay\Common\Message\AbstractRequest;

class ValidateRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
        return new ValidateMessage($this->getVoucherCode());
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
        return new ValidateResponse($request, $response);
    }
}
