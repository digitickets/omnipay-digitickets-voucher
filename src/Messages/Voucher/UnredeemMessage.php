<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractMessage;

class UnredeemMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Unredeem';
}
