<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

interface VoucherResponseInterface
{
    public function isSuccessful(): bool;
}