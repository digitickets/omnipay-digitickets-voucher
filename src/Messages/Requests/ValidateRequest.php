<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use DigiTickets\DigiTicketsVoucher\Messages\Responses\ValidateResponse;
use Omnipay\Common\Message\AbstractRequest;

class ValidateRequest extends AbstractRequest
{
    public function getVoucherCode()
    {
        return $this->getParameter('voucherCode');
    }

    public function setVoucherCode($voucherCode)
    {
        return $this->setParameter('voucherCode', $voucherCode);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
error_log('This would get the data');
    }

    /**
     * @param mixed $data
     * @return AbstractRemoteResponse
     */
    public function sendData($data)
    {
error_log('sendData: This would send the data (to us!)');
        return new ValidateResponse($this, null);
    }
//    /**
//     * @return AbstractMessage
//     */
//    protected function buildMessage()
//    {
//        return new ValidateMessage($this->getVoucherCode());
//    }
//
//    /**
//     * @param RequestInterface $request
//     * @param mixed $response
//     * @return AbstractResponse
//     */
//    protected function buildResponse($request, $response)
//    {
//        return new ValidateResponse($request, $response);
//    }
}
