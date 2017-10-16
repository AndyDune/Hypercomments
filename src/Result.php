<?php
/**
 * ----------------------------------------------
 * | Author: Андрей Рыжов (Dune) <info@rznw.ru>  |
 * | Site: www.rznw.ru                           |
 * | Phone: +7 (4912) 51-10-23                   |
 * | Date: 16.10.2017                               |
 * -----------------------------------------------
 *
 */


namespace AndyDune\Hypercomments;


class Result
{
    protected $data = [];
    protected $error = '';
    protected $exception = '';

    protected $success = false;

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * @param string $error
     */
    public function setError($error)
    {
        $this->error = $error;
        return $this;
    }

    public function isSuccess()
    {
        return $this->success;
    }

    public function setSuccess($flag = true)
    {
        $this->success = $flag;
        return $this;
    }
}