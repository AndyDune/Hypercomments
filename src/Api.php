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
use GuzzleHttp\Client;
/**
 * @method Comments comments()
 */
class Api
{
    protected $secretKey = null;

    protected $widgetId;

    protected $channels = [
        'comments' => Comments::class
    ];

    protected $url = 'http://c1api.hypercomments.com/{version}/{category}/{method}';

    protected $category = '';
    protected $method   = 'list'; // @todo make it right
    protected $version   = '1.0';

    public function __construct($id, $key = null)
    {
        $this->widgetId = $id;
        $this->secretKey = $key;
    }

    public function __call($name, $arguments)
    {
        if (!isset($this->channels[$name])) {
            throw new Exception('Operator is not exist. May be yet.');
        }
        $this->category = $name;
        return new $this->channels[$name]($this);
    }

    public function setRequestCategory($category)
    {
        $this->category = $category;
        return $this;
    }


    public function getWidgetId()
    {
        return $this->widgetId;
    }

    protected function getUrl()
    {
        return str_replace(['{version}', '{category}', '{method}'], [$this->version, $this->category, $this->method], $this->url);
    }

    protected function buildSignature($body)
    {
        return sha1($body . $this->secretKey);
    }

    public function executeRequest($body)
    {
        $body['widget_id'] = $this->getWidgetId();

        $client = new Client([
            'timeout'  => 2.0,
        ]);
        $body = \GuzzleHttp\json_encode($body);
        $url = $this->getUrl();
        $response = $client->request('POST', $url, [
            'form_params' => [
                'body' => $body,
                'signature' => $this->buildSignature($body),
            ]
        ]);

        if ($response->getStatusCode() == '200') {
            $body = $response->getBody();
            $resultString = $body->getContents();
            $array = \GuzzleHttp\json_decode($resultString, true);
            return $array;
        }
        return null;
    }
}