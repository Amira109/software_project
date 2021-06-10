<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/LastName.php";
final class LastNameTest extends TestCase
{
    public function testCanBeValidLastName(): void
    {
        $this->assertInstanceOf(
            LastName::class,
            LastName::fromString('Mohammed')
        );
    }
}