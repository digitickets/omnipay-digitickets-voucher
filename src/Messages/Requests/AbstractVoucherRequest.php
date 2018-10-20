<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Requests;

use Omnipay\Common\Message\AbstractRequest;

abstract class AbstractVoucherRequest extends AbstractRequest
{
    /**
     * @param mixed $data
     * @return AbstractMessage
     */
    abstract protected function buildMessage();

    /**
     * @param RequestInterface $request
     * @param mixed $response
     * @return AbstractRemoteResponse
     */
    abstract protected function buildResponse($request, $response);

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
error_log('AbstractVoucherRequest::getData(): This would get the data. This would validate the voucher code in the appropriate client');
        return $this->buildMessage();
    }

    /**
     * @param mixed $data
     * @return AbstractRemoteResponse
     */
    public function sendData($data)
    {
error_log('AbstractVoucherRequest::sendData(): This would send the data (to us!)');
        $listener = $this->getListener();
        if ($listener && method_exists($listener, 'sendRequest')) {
            $response = $listener->sendRequest($data);
        } else {
            // Error @TODO: Build an appropriate response
        }

        return $this->response = $this->buildResponse($this, $response);
    }
}