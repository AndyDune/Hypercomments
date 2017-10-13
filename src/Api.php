<?php
/**
 * Hypercomments API
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

/**
 * @method Comments comments()
 */
class Api
{
    protected $secretKey = null;

    protected $channels = [
        'comments' => Comments::class
    ];

    public function __construct($key = null)
    {
        $this->secretKey = $key;
    }

    public function __call($name, $arguments)
    {
        if (!isset($this->channels[$name])) {
            throw new Exception('Operator is not exist. May be yet.');
        }
        return new $this->channels[$name]($this);
    }


    public function executeRequest($body)
    {
        // Выполнение запроса
    }
}