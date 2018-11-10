<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\OmnipayAbstractVoucher\AbstractMessage;

class UnredeemMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Unredeem';
}
