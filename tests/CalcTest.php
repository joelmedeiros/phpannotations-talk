<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

class CalcTest extends TestCase 
{
    /**
     * @test Sum two numbers and assert if they are matching the result
     */
    public function testSum()
    {
        $this->assertEquals(1 + 1, 2);
        $this->assertEquals(2 + 2, 4);
        $this->assertEquals(3 + -123, -120);
        $this->assertEquals(-99 + 100, 1);
    }

    /**
     * @test
     * @dataProvider sumDataProvider
     */
    public function sum(int $a, $b, $result)
    {
        $this->assertEquals($a + $b, $result);
    }

    public function sumDataProvider()
    {
        $scenarios = [];

        $scenarios['1 + 1 equals 2'] = [1,1,2];
        $scenarios['2 + 2 equals 4'] = [2,2,4];
        $scenarios['81327091237 + 319832098 equals 2'] = [81327091237, 319832098, 81646923335];

        return $scenarios;
    }
}
