<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

interface ListenerInterface
{
    public function update($action, $data);
}