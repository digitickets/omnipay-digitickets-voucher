<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Interfaces;

interface ValidateResponseInterface extends AbstractResponseInterface
{
    /**
     * @return float
     */
    public function getValue();
}
