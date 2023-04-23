<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Common;

use DigiTickets\DigiTicketsVoucher\DigiTicketsVoucherGateway;
use DigiTickets\OmnipayAbstractVoucher\AbstractMessage;
use DigiTickets\OmnipayAbstractVoucher\VoucherResponseInterface;
use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RequestInterface;

abstract class AbstractVoucherResponse extends AbstractResponse implements VoucherResponseInterface
{
    /**
     * @var bool
     */
    protected $successful = false;

    /**
     * @var string|null
     */
    protected $message;

    public function __construct(RequestInterface $request, $response)
    {
        parent::__construct($request, $response);

        $this->successful = (isset($response['success']) && $response['success'] === true);
        if ($this->successful) {
            $this->message = isset($response['status']) ? $response['status'] : null;
        } else {
            $this->message = isset($response['reason']) ? $response['reason'] : null;
        }
    }

    public function isSuccessful(): bool
    {
        return $this->successful;
    }

    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Gateway Reference
     *
     * @return null|string A reference provided by the gateway to represent this transaction
     */
    public function getTransactionReference()
    {
        /** @var AbstractMessage $message */
        $message = $this->getRequest()->getData();

        return $message->getVoucherNumber();
    }
}
