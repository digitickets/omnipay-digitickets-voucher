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

    public function setGateway($value)
    {
        $this->setParameter('gateway', $value);
    }

    public function getGateway()
    {
        return $this->getParameter('gateway');
    }

    public function setVirtualApi($value)
    {
        $this->setParameter('virtualApi', $value);
    }

    public function getVirtualApi()
    {
        return $this->getParameter('virtualApi');
    }

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
error_log('The data is: '.var_export($data, true));
        $virtualApi = $this->getVirtualApi();
        if ($virtualApi) {
            $response = $virtualApi->sendRequest($data);
error_log('Got the response; sending it to the listeners');
            // Send all the information to any listeners.
            foreach ($this->getGateway()->getListeners() as $listener) {
error_log('Next listener');
                $listener->update('requestSend', $data);
            }

        } else {
            // Error @TODO: Build an appropriate response
        }

        return $this->response = $this->buildResponse($this, $response);
    }
}