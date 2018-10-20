<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Responses;

use DigiTickets\DigiTicketsVoucher\Messages\Interfaces\RefundResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

class RefundResponse extends AbstractResponse implements RefundResponseInterface
{
}
