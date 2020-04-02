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

use Aesonus\TestLib\BaseTestCase;

class MessageExceptionTest extends BaseTestCase
{
    public $testObj;

    protected function setUp() : void
    {
        $this->testObj = $this->getMockBuilder(\Aesonus\Messages\MessageException::class)
            ->getMockForAbstractClass();
    }

    /**
     * @test
     */
    public function getDataReturnsSetData()
    {
        $expected = [
            'some' => 'data'
        ];
        $actual = $this->testObj->setData($expected)->getData();
        $this->assertEquals($expected, $actual);
    }
}
