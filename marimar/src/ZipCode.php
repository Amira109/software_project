<?php declare(strict_types=1);
final class ZipCode
{
    private $zipcode;

    private function __construct(string $zipcode)
    {
        $this->ensureIsValidZipCode($zipcode);

        $this->zipcode= $zipcode;
    }

    public static function fromString(string $zipcode): self
    {
        return new self($zipcode);
    }

    public function __toString(): string
    {
        return $this->zipcode;
    }

    private function ensureIsValidZipCode(string $zipcode): void
    {
        if (!ctype_digit($zipcode)) {
            
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not accepted Zip code must be only digit',
                    $zipcode
                )
            );
             }
            
       
        if ( strlen( $zipcode) != 5) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not accepted Zip code must be Five Digit',
                    $zipcode
                )
            );
        }
    }
}