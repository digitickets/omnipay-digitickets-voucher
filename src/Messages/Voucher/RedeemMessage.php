<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Voucher;

use DigiTickets\DigiTicketsVoucher\AbstractVoucher\AbstractMessage;

class RedeemMessage extends AbstractMessage
{
    const REQUEST_TYPE = 'Redemption';
}
