<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\OmnipayAbstractVoucher\AbstractMessage;

class RedeemMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Redemption';
}
