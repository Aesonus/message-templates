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
use Aesonus\Messages\TemplatePrinter;
use Aesonus\TestLib\BaseTestCase;
use RuntimeException;

class TemplatePrinterTest extends BaseTestCase
{
    public $testObj;

    public $message;

    protected function setUp() : void
    {
        $this->testObj = new TemplatePrinter();
        $this->message = new class() extends AbstractSprintMessage {
            protected function getTemplate(): string
            {
                return "Hello %s!";
            }
        };
    }

    /**
     * @test
     * @dataProvider outputReturnsRenderedMessageDataProvider
     */
    public function outputReturnsRenderedMessage($data, $expected)
    {
        $this->message->setData($data);
        $this->testObj->setMessage($this->message);
        $actual = $this->testObj->output();
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data Provider
     */
    public function outputReturnsRenderedMessageDataProvider()
    {
        return [
            [['World'], 'Hello World!'],
            [[''], 'Hello !']
        ];
    }

    /**
     * @test
     */
    public function outputThrowsExceptionIfMessageIsNotSet()
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('No message set');
        $this->testObj->output();
    }
}
