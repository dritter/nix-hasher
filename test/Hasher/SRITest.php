<?php

namespace Test\Dritter\NixHasher\Hasher;

use Dritter\NixHasher\Hasher;
use PHPUnit\Framework\TestCase;

class SRITest extends TestCase
{
    public function providedData(): array
    {
        return [
            [['input' => '61eae239442a19b74845a613ce6dff8d79cd50856c48dc4243e06a2614b56d12', 'expected' => 'sha256-YeriOUQqGbdIRaYTzm3/jXnNUIVsSNxCQ+BqJhS1bRI=']],
        ];
    }

    /**
     * @dataProvider providedData
     */
    public function testWorksAsExpected(array $data) {
        $this->assertEquals($data['expected'], Hasher::createSRI($data['input']));
    }
}