<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

interface Listener
{
    public function update($action, $data);
}