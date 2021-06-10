<?php declare(strict_types=1);
final class FirstName
{
    private $first_name;

    private function __construct(string $first_name)
    {
        $this->ensureIsValidFirstName($first_name);

        $this->first_name= $first_name;
    }

    public static function fromString(string $first_name): self
    {
        return new self($first_name);
    }

    public function __toString(): string
    {
        return $this->first_name;
    }

    private function ensureIsValidFirstName(string $first_name): void
    {
        if (preg_match('~[0-9]+~', $first_name)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" not valid  first name must be character ',
                    $first_name
                )
            );
        }
        if ( strlen( $first_name ) <= 3) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted First name',
                    $first_name
                )
            );
        }

        if ( strlen( $first_name ) > 30) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is too long not accepted  First name',
                    $first_name
                )
            );
        }
        
    }
}