<?php

namespace Test\Dritter\NixHasher\Hasher;

use Dritter\NixHasher\Hasher;
use PHPUnit\Framework\TestCase;

class Base32Test extends TestCase
{
    public function providedData(): array
    {
        return [
            [['input' => 'ab335240fd942ab8191c5e628cd4ff3903c577bda961fb75df08e0303a00527b', 'expected' => '0ysj00x31q08vxsznqd9pmvwa0rrzza8qqjy3hcvhallzm054cxb']],
        ];
    }

    /**
     * @dataProvider providedData
     */
    public function testWorksAsExpected(array $data) {
        $this->assertEquals($data['expected'], Hasher::convertToBase32($data['input']));
    }
}
