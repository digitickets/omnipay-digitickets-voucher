<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\Messages\Common\AbstractVoucherRequest;

class ValidateRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
error_log('ValidateRequest: buildMessage(): Amount: '.$this->getAmount());
        return new ValidateMessage($this->getVoucherCode(), $this->getAmount(), $this->getTransactionId(), $this->getOrderLineRef());
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

    protected function getListenerAction(): string
    {
        return 'validateRequestSend';
    }
}
