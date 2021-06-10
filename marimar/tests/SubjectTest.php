<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Subject.php";
final class SubjectTest extends TestCase
{
    public function testCanBeValidSubject(): void
    {
        $this->assertInstanceOf(
            Subject::class,
            Subject::fromString('Booking rooms')
        );
    }
}