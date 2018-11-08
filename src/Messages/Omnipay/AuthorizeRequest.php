<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\DigiTicketsVoucher\Messages\Common\AbstractVoucherRequest;

class AuthorizeRequest extends AbstractVoucherRequest
{
    /**
     * @return AbstractMessage
     */
    protected function buildMessage()
    {
error_log('AuthorizeRequest::buildMessage(): Amount: '.$this->getAmount());
        return new AuthorizeMessage($this->getVoucherCode(), $this->getAmount(), $this->getTransactionId(), $this->getOrderLineRef());
    }

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
error_log('AuthorizeRequest::buildResponse(): response: '.var_export($response, true));
        return new AuthorizeResponse($request, $response);
    }

    protected function getListenerAction(): string
    {
        return 'authorizeRequestSend';
    }
}
