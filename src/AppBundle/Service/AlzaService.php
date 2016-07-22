<?php

namespace AppBundle\Service;

use AppBundle\Entity\Voucher;
use Circle\RestClientBundle\Services\RestClient;

class AlzaService
{
    protected $restClient;

    public function __construct(RestClient $restClient)
    {
        $this->restClient = $restClient;
    }

    public function checkVoucherValidity($voucher)
    {
        $data = $this->sendRequest($voucher)->d;
        return new Voucher($voucher, $data);
    }
    
    private function sendRequest($voucher)
    {
        $payload = [
            'code' => $voucher,
            'confirm' => false
        ];

        $response = $this->restClient->post('https://www.alza.cz/Services/EShopService.svc/InsertDiscountCodeOrder1', json_encode($payload));
        
        return json_decode($response->getContent());
    }
}