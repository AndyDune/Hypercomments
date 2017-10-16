# Hypercomments
Hypercomments API 

[![Packagist Version](https://img.shields.io/packagist/v/andydune/hypercomments.svg?style=flat-square)](https://packagist.org/packages/andydune/hypercomments)
[![Total Downloads](https://img.shields.io/packagist/dt/andydune/hypercomments.svg?style=flat-square)](https://packagist.org/packages/andydune/hypercomments)


## Usage

### comments/list

```php
use AndyDune\Hypercomments\Api;

$data = (Api($widget_id, $secret))
->comments()->list()
->setLink('<page url with comments')
->setOffset(<int>)
->setLimit(<int>)
->get();


$this->assertTrue(is_array($data));
$this->assertArrayHasKey('result', $data);
$this->assertArrayHasKey('data', $data);

```
