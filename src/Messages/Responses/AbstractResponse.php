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

    public function __construct(RequestInterface $request, $tmp)
    {
        $this->request = $request;
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
}
