<?php

/*
 * This file is part of the aesonus/messagetemplates project.
 *
 * (c) Cory Laughlin <corylcomposinger@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Aesonus\Tests;

use Aesonus\Messages\Contracts\TemplateExceptionSourceInterface;
use Aesonus\Messages\Contracts\TemplateSourceInterface;
use Aesonus\Messages\RenderVsprintfMessage;
use Aesonus\TestLib\BaseTestCase;
use Exception;
use PHPUnit\Framework\MockObject\MockObject;
use Throwable;

class RenderVsprintfMessageTest extends BaseTestCase
{
    public $testObj;
    
    /**
     *
     * @var TemplateSourceInterface|MockObject
     */
    public $testSource;

    protected function setUp() : void
    {
        $this->testObj = new RenderVsprintfMessage();
    }
    
    /**
     * @test
     * @dataProvider renderTestDataProvider
     */
    public function renderReturnsRenderedTemplateWithData($data, $expected)
    {
        //Set up the source to use for this test
        $source = new class() implements TemplateSourceInterface {
            public function getTemplate(): string
            {
                return 'Hello %s!';
            }
        };
        $this->testObj->setSource($source);
        $actual = $this->testObj->render($data);
        $this->assertEquals($expected, $actual);
    }

    /**
     * Data Provider
     */
    public function renderTestDataProvider()
    {
        return [
            [['World'], 'Hello World!'],
            [['Bob'], 'Hello Bob!']
        ];
    }
    
    /**
     * @test
     * @dataProvider renderTestDataProvider
     */
    public function renderReturnsRenderedTemplateUsingException($data, $expected)
    {
        $source = new class() implements TemplateExceptionSourceInterface {
            public function getTemplate(): string
            {
                return $this->exception->getMessage(); //Could be more complex than this
            }

            public function setException(Throwable $exception): TemplateExceptionSourceInterface
            {
                $this->exception = $exception;
                return $this;
            }
        };
        $source->setException(new Exception('Hello %s!'));
        $this->testObj->setSource($source);
        $actual = $this->testObj->render($data);
        $this->assertEquals($expected, $actual);
    }
}
