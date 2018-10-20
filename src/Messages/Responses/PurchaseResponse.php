<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Responses;

use DigiTickets\DigiTicketsVoucher\Messages\Interfaces\PurchaseResponseInterface;
use Omnipay\Common\Message\RequestInterface;

class PurchaseResponse extends AuthorizeResponse implements PurchaseResponseInterface
{
}
