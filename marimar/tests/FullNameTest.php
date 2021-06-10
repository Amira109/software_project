<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/FullName.php";
final class FullNameTest extends TestCase
{
    public function testCanBeValidFullName(): void
    {
        $this->assertInstanceOf(
            FullName::class,
            FullName::fromString('Mohammed')
        );
    }
}