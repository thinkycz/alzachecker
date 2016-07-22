<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route(path="/", name="Default:index")
     * @Template()
     * @return array
     */
    public function indexAction()
    {
        return [];
    }

    /**
     * @Route(path="/check", name="Default:check")
     * @Method(methods={"POST"})
     * @Template()
     * @param Request $request
     * @return array
     */
    public function checkAction(Request $request)
    {
        $vouchers = explode("\n", $request->get('vouchers'));
        $alza = $this->get('alza_service');
        $result = [];

        foreach ($vouchers as $voucher)
        {
            $voucher = str_replace("\r", '', $voucher);
            if (!empty($voucher))
                $result[] = $alza->checkVoucherValidity($voucher);
        }

        return compact('result');
    }
}
