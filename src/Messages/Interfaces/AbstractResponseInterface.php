<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Interfaces;

interface AbstractResponseInterface
{
    /**
     * @return bool
     */
    public function success();

    /**
     * @return string|null
     */
    public function getErrorMessage();
}
