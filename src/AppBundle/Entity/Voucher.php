<?php

namespace AppBundle\Entity;

class Voucher
{
    protected $code;

    protected $answer;

    /**
     * Voucher constructor.
     * @param $code
     * @param $answer
     */
    public function __construct($code, $answer)
    {
        $this->code = $code;
        $this->answer = $answer;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * @param mixed $answer
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
    }

    

}