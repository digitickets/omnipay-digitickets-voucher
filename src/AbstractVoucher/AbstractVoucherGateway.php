<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

use Omnipay\Common\AbstractGateway;

abstract class AbstractVoucherGateway extends AbstractGateway
{
    /**
     * @var Listener[]
     */
    private $listeners = [];

    abstract public function validate(array $parameters = array());

    abstract public function redeem(array $parameters = array());

    abstract public function unredeem(array $parameters = array());

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