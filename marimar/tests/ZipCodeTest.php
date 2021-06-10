<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/ZipCode.php";
final class ZipCodeTest extends TestCase
{
    public function testCanBeValidPassword(): void
    {
        $this->assertInstanceOf(
            ZipCode::class,
            ZipCode::fromString('12345')
        );
    }
}