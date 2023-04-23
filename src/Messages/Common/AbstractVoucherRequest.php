<?php

namespace DigiTickets\DigiTicketsVoucher\Messages\Common;

use DigiTickets\DigiTicketsVoucher\DigiTicketsVoucherGateway;
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

    /**
     * Method to return the action for the listener.
     * @return string
     */
    abstract protected function getListenerAction(): string;

    public function setGateway($value)
    {
        $this->setParameter('gateway', $value);
    }

    /**
     * @return DigiTicketsVoucherGateway
     */
    public function getGateway()
    {
        return $this->getParameter('gateway');
    }

    public function setOrderLineRef($value)
    {
        $this->setParameter('orderLineRef', $value);
    }

    public function getOrderLineRef()
    {
        return $this->getParameter('orderLineRef');
    }

    public function getVoucherCode()
    {
        return $this->getParameter('voucherCode');
    }

    public function setVoucherCode($voucherCode)
    {
        return $this->setParameter('voucherCode', $voucherCode);
    }

    public function getOriginalTransactionId()
    {
        return $this->getParameter('originalTransactionId');
    }

    public function setOriginalTransactionId($originalTransactionId)
    {
        return $this->setParameter('originalTransactionId', $originalTransactionId);
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->buildMessage();
    }

    /**
     * @param mixed $data
     * @return AbstractRemoteResponse
     */
    public function sendData($data)
    {
        $this->getGateway()->log('AbstractVoucherRequest::sendData.', ["props"=>$data]);
        $virtualApi = $this->getGateway()->getVirtualApi();
        if ($virtualApi) {
            $response = json_decode($virtualApi->sendRequest($data), true);
            $this->getGateway()->log('$response from virtualapi decoded', ["response"=>var_export($response, true)]);
            // Send all the information to any listeners.
            foreach ($this->getGateway()->getListeners() as $listener) {
                $listener->update($this->getListenerAction(), $response);
            }
        } else {
            $this->getGateway()->log('Missing $virtualApi');
            // Error @TODO: Build an appropriate response
        }

        return $this->response = $this->buildResponse($this, $response);
    }
}