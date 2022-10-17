<?php

namespace Test\Dritter\NixHasher\Hasher;

use Dritter\NixHasher\Hasher;
use PHPUnit\Framework\TestCase;

class FromFileTest extends TestCase
{
    public function providedData(): array
    {
        return [
            [['input' => __DIR__ . '/../fixtures/file.txt', 'expected' => 'sha256-8sobtsfpB9Btr+Roflefznazfk6Tt2BQItpS5szCb9I=']],
        ];
    }

    /**
     * @dataProvider providedData
     */
    public function testWorksAsExpected(array $data) {
        $this->assertEquals($data['expected'], Hasher::createFromFile($data['input']));
    }
}