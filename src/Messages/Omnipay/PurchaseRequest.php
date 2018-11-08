<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\DigiTicketsVoucher\Messages\Voucher\RedeemRequest;

/**
 * This is a wrapper for the redeem request. The only thing it does differently is return a purchase response rather
 * than a redeem response.
 */
class PurchaseRequest extends RedeemRequest
{
    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractResponse
     */
    protected function buildResponse($request, $response)
    {
error_log('PurchaseRequest::buildResponse(): response: '.var_export($response, true));
        return new PurchaseResponse($request, $response);
    }
}
