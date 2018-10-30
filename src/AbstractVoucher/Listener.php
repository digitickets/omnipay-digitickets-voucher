<?php

namespace DigiTickets\DigiTicketsAbstractVoucher;

interface Listener
{
    public function update($action, $data);
}