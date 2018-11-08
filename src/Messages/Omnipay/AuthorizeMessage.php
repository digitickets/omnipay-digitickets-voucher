<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractMessage;

class AuthorizeMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Authorization';
}