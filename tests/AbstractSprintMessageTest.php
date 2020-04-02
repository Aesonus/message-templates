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

use Aesonus\Messages\AbstractSprintMessage;
use Aesonus\TestLib\BaseTestCase;
use PHPUnit\Framework\MockObject\MockObject;

class AbstractSprintMessageTest extends BaseTestCase
{
    /**
     *
     * @var MockObject|AbstractSprintMessage
     */
    public $testObj;

    protected function setUp() : void
    {
        $this->testObj = $this->getMockBuilder(AbstractSprintMessage::class)
            ->getMockForAbstractClass();
    }

    /**
     * @test
     * @dataProvider renderReturnsMessageDataProvider
     */
    public function renderReturnsMessageWithData($template, $data, $expected)
    {
        $this->testObj->expects($this->once())->method('getTemplate')->willReturn($template);
        $this->testObj->setData($data);
        $actual = $this->testObj->render();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data Provider
     */
    public function renderReturnsMessageDataProvider()
    {
        return [
            ["Hello world!",[], 'Hello world!'],
            ["Hello %s!", ['world'], 'Hello world!']
        ];
    }
}
