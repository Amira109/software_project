<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Password.php";
final class PasswordTest extends TestCase
{
    public function testCanBeValidPassword(): void
    {
        $this->assertInstanceOf(
            Password::class,
            Password::fromString('123rah')
        );
    }
}