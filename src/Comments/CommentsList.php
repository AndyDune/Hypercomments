<?php
/**
 * ----------------------------------------------
 * | Author: Андрей Рыжов (Dune) <info@rznw.ru>  |
 * | Site: www.rznw.ru                           |
 * | Phone: +7 (4912) 51-10-23                   |
 * | Date: 13.10.2017                               |
 * -----------------------------------------------
 *
 */

namespace AndyDune\Hypercomments\Comments;

class CommentsList extends CommentsAbstract
{
    protected $link;
    protected $sort = 'all';
    protected $limit = 20;
    protected $offset = 0;
    protected $xId = null;

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @param int $offset
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    public function setSortAll()
    {
        $this->sort = 'all';
        return $this;
    }

    public function setSortNew()
    {
        $this->sort = 'new';
        return $this;
    }

    public function setSortPopular()
    {
        $this->sort = 'popular';
        return $this;
    }

    public function setXId($id)
    {
        $this->xId = $id;
        return $this;
    }

    public function get()
    {
        $body = [
            'link' => $this->link,
            'sort' => $this->sort,
            'limit' => $this->limit,
            'offset' => $this->offset,
        ];
        if ($this->xId) {
            $body['xid'] = $this->xId;
        }
        $result =  $this->getCommentsContainer()->getApi()->executeRequest($body);
        if ($result->isSuccess()) {
            $data = $result->getData();
            if (!$data) {
                return $result;
            }
            $data = array_map(function ($value) {
                return new CommentsRecord($value);
            }, $data);
            $result->setData($data);
        }
        return $result;
    }

}