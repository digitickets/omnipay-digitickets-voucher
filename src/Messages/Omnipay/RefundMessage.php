<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Omnipay;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractMessage;

// @TODO: This may not be used any more.
class RefundMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Refund';
}