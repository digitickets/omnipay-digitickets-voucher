<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

use Omnipay\Common\AbstractGateway;

abstract class AbstractVoucherGateway extends AbstractGateway
{
    /**
     * @var Listener[]
     */
    private $listeners = [];

    public function register($listener)
    {
        $this->listeners[] = $listener;
    }

    public function getListeners()
    {
error_log('Returning the listeners');
        return $this->listeners;
    }
}