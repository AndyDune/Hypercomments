<?php
/**
 *
 * PHP version 7.0, 7.1 and 7.2
 *
 * @package andydune/hypercomments
 * @link  https://github.com/AndyDune/Hypercomments for the canonical source repository
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @author Andrey Ryzhov  <info@rznw.ru>
 * @copyright 2017 Andrey Ryzhov
 *
 */
namespace AndyDune\HypercommentsTest;
use AndyDune\Hypercomments\Api;
use AndyDune\Hypercomments\Comments\CommentsList;
use AndyDune\Hypercomments\Result;
use PHPUnit\Framework\TestCase;

class CommentsTest extends TestCase
{
    public function testDescription()
    {
        $secret = 'xzxcvxzcs';
        $id = 57;
        $query = new Api($id, $secret);
        $list = $query->comments()->list();
        $list->setLink('http://hypercomments.rznw.ru/comments/');
        $this->assertInstanceOf(CommentsList::class, $list);

        $data = $list->get();
        $this->assertInstanceOf(Result::class, $data);
        $this->assertGreaterThan(1, count($data->getData()));
    }

}