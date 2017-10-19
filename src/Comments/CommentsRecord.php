<?php
/**
 * ----------------------------------------------
 * | Author: Андрей Рыжов (Dune) <info@rznw.ru>  |
 * | Site: www.rznw.ru                           |
 * | Phone: +7 (4912) 51-10-23                   |
 * | Date: 19.10.2017                               |
 * -----------------------------------------------
 *
 */


namespace AndyDune\Hypercomments\Comments;


class CommentsRecord
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function getText()
    {
        return $this->data['text'] ?? null;
    }

    public function getId()
    {
        return $this->data['id'] ?? null;
    }

    public function getTimestamp()
    {
        if ($time = $this->data['time'] ?? null) {
            return strtotime($time);
        }
        return null;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }

}