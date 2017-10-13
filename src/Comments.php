<?php
/**
 *
 * PHP version 7.0 and 7.1
 *
 * @package andydune/hypercomments
 * @link  https://github.com/AndyDune/Hypercomments for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2017 Andrey Ryzhov
 *
 */


namespace AndyDune\Hypercomments;

use AndyDune\Hypercomments\Comments\CommentsList;

/**
 * @method CommentsList list()
 */
class Comments
{
    /**
     * @var Api
     */
    protected $api;

    protected $channels = [
        'list' => CommentsList::class
    ];


    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function __call($name, $arguments)
    {
        if (!isset($this->channels[$name])) {
            throw new Exception('Operator is not exist. May be yet.');
        }
        return new $this->channels[$name]($this);
    }

    /**
     * @return Api
     */
    public function getApi()
    {
        return $this->api;
    }
}