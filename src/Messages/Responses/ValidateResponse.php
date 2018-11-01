<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Responses;

use DigiTickets\DigiTicketsVoucher\Messages\Interfaces\ValidateResponseInterface;

class ValidateResponse extends AbstractResponse implements ValidateResponseInterface
{
    // @TODO: Do I need these two methods?
    public function success()
    {
        return $this->isSuccessful();
    }

    public function getErrorMessage()
    {
        return $this->getMessage();
    }

    public function getValue()
    {
        // TODO: Implement getValue() method.
    }
}
