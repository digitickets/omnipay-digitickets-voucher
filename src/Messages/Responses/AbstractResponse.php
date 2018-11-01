<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Responses;

use Omnipay\Common\Message\RequestInterface;
use Omnipay\Common\Message\ResponseInterface;

abstract class AbstractResponse implements ResponseInterface
{
    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var bool
     */
    protected $successful = false;

    /**
     * @var string|null
     */
    protected $errorMessage;

    public function __construct(RequestInterface $request, $response)
    {
        $this->request = $request;

error_log('[Driver] AbstractResponse: $response: '.var_export($response, true));
        $this->successful = isset($response['redeemable']) && $response['redeemable'] === true;
        $this->errorMessage = isset($response['reason']) ? $response['reason'] : null;
    }

    /**
     * Get the original request which generated this response
     *
     * @return RequestInterface
     */
    public function getRequest()
    {
        return $this->request;
    }

    public function isRedirect()
    {
        return false; // It's never a redirect
    }

    public function getData()
    {
        // TODO: Implement getData() method.
    }

    public function isSuccessful()
    {
        return $this->successful;
    }

    public function isCancelled()
    {
        // TODO: Implement isCancelled() method.
    }

    public function getMessage()
    {
error_log('[Driver] AbstractResponse getMessage() being called');
        return $this->errorMessage;
    }

    public function getCode()
    {
        // TODO: Implement getCode() method.
    }

    public function getTransactionReference()
    {
        // TODO: Implement getTransactionReference() method.
    }
}
