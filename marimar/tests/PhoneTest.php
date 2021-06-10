<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Phone.php";
final class PhoneTest extends TestCase
{
    public function testCanBeValidPassword(): void
    {
        $this->assertInstanceOf(
            Phone::class,
            Phone::fromString('123456789098')
        );
    }
}