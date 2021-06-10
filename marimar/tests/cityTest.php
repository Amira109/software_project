<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/city.php";
final class CityTest extends TestCase
{
    public function testCanBeValidCity(): void
    {
        $this->assertInstanceOf(
            City::class,
            City::fromString('Mohammed')
        );
    }
}