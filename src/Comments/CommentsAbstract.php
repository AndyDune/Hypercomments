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
use AndyDune\Hypercomments\Comments;

abstract class CommentsAbstract
{
    protected $body = [];

    /**
     * @var Comments
     */
    protected $comments;

    public function __construct(Comments $comments)
    {
        $this->comments = $comments;
    }

    /**
     * @return Comments
     */
    public function getCommentsContainer()
    {
        return $this->comments;
    }

}