<?php declare(strict_types=1);
final class Phone
{
    private $phone;

    private function __construct(string $phone)
    {
        $this->ensureIsValidPhone($phone);

        $this->phone= $phone;
    }

    public static function fromString(string $phone): self
    {
        return new self($phone);
    }

    public function __toString(): string
    {
        return $this->phone;
    }

    private function ensureIsValidPhone(string $phone): void
    {
        if (!ctype_digit($phone)) {
            
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is not accepted phone you must enter only digit',
                    $phone
                )
            );
             }
            
       
        if ( strlen( $phone ) < 12) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted phone',
                    $phone
                )
            );
        }
  
        
    }
}