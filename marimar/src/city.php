<?php declare(strict_types=1);
final class City
{
    private $city;

    private function __construct(string $city)
    {
        $this->ensureIsValidCity($city);

        $this->city= $city;
    }

    public static function fromString(string $city): self
    {
        return new self($city);
    }

    public function __toString(): string
    {
        return $this->city;
    }

    private function ensureIsValidCity(string $city): void
    {
        if (preg_match('~[0-9]+~', $city)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not accepted Name',
                    $city
                )
            );
        }
        if ( strlen( $city ) <= 3) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted city name',
                    $city
                )
            );
        }

        if ( strlen( $city ) > 80) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is too long not accepted city name',
                    $city
                )
            );
        }
        
    }
}