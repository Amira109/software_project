<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/FirstName.php";
final class FirstNameTest extends TestCase
{
    public function testCanBeValidFirstName(): void
    {
        $this->assertInstanceOf(
            FirstName::class,
            FirstName::fromString('Mohammed')
        );
    }
}