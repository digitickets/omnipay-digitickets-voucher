<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

interface VoucherResponseInterface
{
    public function isSuccessful(): bool;

    /**
     * @return string|null
     */
    public function getMessage();
}