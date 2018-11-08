<?php

namespace DigiTickets\DigiTicketsVoucher\AbstractVoucher;

class AbstractMessage
{
    const REQUEST_TYPE = '!';

    /**
     * @var string $voucherNumber
     */
    private $voucherNumber;

    /**
     * @var float|null The value that was redeemed from this voucher in this redemption (it's not always the total value of the voucher).
     */
    private $allocationAmount;

    /**
     * @var int|null
     */
    private $paymentID;

    /**
     * @var string|null A reference to the line(s) that the host system has redeemed the voucher against.
     */
    private $orderLineRef;

    public function __construct(string $voucherNumber, float $allocationAmount = null, string $transactionId = null, string $orderLineRef = null)
    {
        $this->voucherNumber = $voucherNumber;
        $this->allocationAmount = $allocationAmount;
        $this->orderLineRef = $orderLineRef;

        if ($transactionId) {
            $transactionParts = explode('x', $transactionId);
            if (count($transactionParts) == 2) {
                $this->paymentID = (int)$transactionParts[1];
            }
        }
    }

    /**
     * @return string
     */
    public function getVoucherNumber()
    {
        return $this->voucherNumber;
    }

    /**
     * @return float|null
     */
    public function getAllocationAmount(): float
    {
        return $this->allocationAmount;
    }

    /**
     * @return null|string
     */
    public function getOrderLineRef(): string
    {
        return $this->orderLineRef;
    }

    /**
     * @return int|null
     */
    public function getPaymentID()
    {
        return $this->paymentID;
    }

    /**
     * @return string
     */
    public function getRequestType()
    {
        assert(static::REQUEST_TYPE != self::REQUEST_TYPE, 'Request type must be specified in the subclass');

        return static::REQUEST_TYPE;
    }
}