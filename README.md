# Hypercomments
Hypercomments API 


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