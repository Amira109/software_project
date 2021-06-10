<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Nationality.php";
final class NationalityTest extends TestCase
{
    public function testCanBeValidSubject(): void
    {
        $this->assertInstanceOf(
            Nationality ::class,
            Nationality::fromString('Booking')
        );
    }
}