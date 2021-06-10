<?php declare(strict_types=1);
final class Nationality
{
    private $nationality;

    private function __construct(string $nationality)
    {
        $this->ensureIsValidNationality($nationality);

        $this->nationality= $nationality;
    }

    public static function fromString(string $nationality): self
    {
        return new self($nationality);
    }

    public function __toString(): string
    {
        return $this->nationality;
    }

    private function ensureIsValidNationality(string $nationality): void
    {
        if (preg_match('~[0-9]+~', $nationality)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" not valid nationality must be a character ',
                    $nationality
                )
            );
        }
        if ( strlen( $nationality ) <= 3) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted nationality',
                    $nationality
                )
            );
        }

        if ( strlen( $nationality ) > 45) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is too long not accepted nationality',
                    $nationality
                )
            );
        }
        
    }
}