<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Responses;

use DigiTickets\DigiTicketsVoucher\Messages\Interfaces\AuthorizeResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class AuthorizeResponse extends AbstractResponse implements AuthorizeResponseInterface
{
}
