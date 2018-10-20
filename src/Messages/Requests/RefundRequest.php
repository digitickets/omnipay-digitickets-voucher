<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use Omnipay\Common\Message\AbstractRequest;

class RefundRequest extends AbstractRequest
{
//    /**
//     * @var UnredeemRequest
//     */
//    private $unredeemRequest;
//
//    /**
//     * Store the instance of the unredeem request, which we'll use to unredeem the voucher.
//     * @param $unredeemRequest
//     */
//    public function setUnredeemRequest($unredeemRequest)
//    {
//        $this->unredeemRequest = $unredeemRequest;
//    }
//
//    public function getData()
//    {
//        return $this->getTransactionReference();
//    }
//
//    public function sendData($data)
//    {
//        $this->unredeemRequest->setVoucherCode($data);
//        /** @var UnredeemResponse $unredeemResponse */
//        $unredeemResponse = $this->unredeemRequest->send();
//
//        return new RefundResponse($this, $unredeemResponse);
//    }
}
