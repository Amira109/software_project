<?php declare(strict_types=1);
final class LastName
{
    private $last_name;

    private function __construct(string $last_name)
    {
        $this->ensureIsValidLastName($last_name);

        $this->last_name= $last_name;
    }

    public static function fromString(string $last_name): self
    {
        return new self($last_name);
    }

    public function __toString(): string
    {
        return $this->last_name;
    }

    private function ensureIsValidLastName(string $last_name): void
    {
        if (preg_match('~[0-9]+~', $last_name)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" not valid  Last name must be character',
                    $last_name
                )
            );
        }
        if ( strlen( $last_name ) <= 3) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted lastName',
                    $last_name
                )
            );
        }

        if ( strlen( $last_name ) > 30) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is too long not accepted LastName',
                    $last_name
                )
            );
        }
        
    }
}