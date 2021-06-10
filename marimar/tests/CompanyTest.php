<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
require __DIR__ . "/../src/Company.php";
final class CompanyTest extends TestCase
{
    public function testCanBeValidCompany(): void
    {
        $this->assertInstanceOf(
            Company::class,
            Company::fromString('ruhhhhh')
        );
    }
}