<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractMessage;

class ValidateMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Validation';
}
