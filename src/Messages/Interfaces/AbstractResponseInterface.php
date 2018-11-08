<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Interfaces;

// @TODO: This doesn't seem to be used
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
