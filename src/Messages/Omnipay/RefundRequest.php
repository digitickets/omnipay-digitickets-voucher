<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\DigiTicketsVoucher\Messages\Voucher\UnredeemRequest;

/**
 * This is a wrapper for the unredeem request. The only thing it does differently is return a refund response rather
 * than an unredeem response.
 */
class RefundRequest extends UnredeemRequest
{
    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
        $this->getGateway()->log('RefundRequest::buildResponse()', ["vars"=> var_export($response, true)]);
        return new RefundResponse($request, $response);
    }
}
