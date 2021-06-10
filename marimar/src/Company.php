<?php declare(strict_types=1);
final class Company
{
    private $Company;

    private function __construct(string $Company)
    {
        $this->ensureIsValidCompany($Company);

        $this->Company= $Company;
    }

    public static function fromString(string $Company): self
    {
        return new self($Company);
    }

    public function __toString(): string
    {
        return $this->Company;
    }

    private function ensureIsValidCompany(string $Company): void
    {
        if (preg_match('~[0-9]+~', $Company)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not accepted  Company name must be char',
                    $Company
                )
            );
        }
        if ( strlen( $Company ) <= 3) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted Company name',
                    $Company
                )
            );
        }

       
    }
}