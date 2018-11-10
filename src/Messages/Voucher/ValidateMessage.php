<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\OmnipayAbstractVoucher\AbstractMessage;

class ValidateMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Validation';
}
