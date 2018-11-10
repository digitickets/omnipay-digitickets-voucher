<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\OmnipayAbstractVoucher\AbstractMessage;

class AuthorizeMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Authorization';
}