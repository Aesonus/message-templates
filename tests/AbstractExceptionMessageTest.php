<?php

/*
 * This file is part of the aesonus/message-templates project.
 *
 * (c) Cory Laughlin <corylcomposinger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aesonus\Tests;

use Aesonus\Messages\AbstractExceptionMessage;
use Aesonus\Messages\MessageException;
use Aesonus\TestLib\BaseTestCase;

class AbstractExceptionMessageTest extends BaseTestCase
{
    public $testObj;

    public $testException;

    protected function setUp() : void
    {
        $this->getMockBuilder(MessageException::class)
            ->setMockClassName('TestMessageException')
            ->getMockForAbstractClass();
        $this->testException = 'TestMessageException';
        //Shows an example of how to use this with vsprintf
        $this->testObj = new class() extends AbstractExceptionMessage {
            public function render(): string
            {
                return vsprintf($this->getTemplate(), $this->data);
            }
        };
    }

    /**
     * @test
     * @dataProvider renderReturnsMessageDataProvider
     */
    public function renderReturnsMessage($data, $expected)
    {
        $template = 'Hello %s!';
        try {
            throw new $this->testException($template);
        } catch (MessageException $exc) {
            $exc->setData($data);
            $this->testObj->setException($exc);
            $actual = $this->testObj->render();
            $this->assertEquals($expected, $actual);
        }
    }

    /**
     * Data Provider
     */
    public function renderReturnsMessageDataProvider()
    {
        return [
            [['world'], 'Hello world!'],
            [['Bob'], 'Hello Bob!']
        ];
    }
}
