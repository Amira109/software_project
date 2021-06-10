<?php declare(strict_types=1);
final class Subject
{
    private $subject;

    private function __construct(string $subject)
    {
        $this->ensureIsValidSubject($subject);

        $this->subject= $subject;
    }

    public static function fromString(string $subject): self
    {
        return new self($subject);
    }

    public function __toString(): string
    {
        return $this->subject;
    }

    private function ensureIsValidSubject(string $subject): void
    {
        if (preg_match('~[0-9]+~', $subject)) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" not vaild  subject must be charcter',
                    $subject
                )
            );
        }
        if ( strlen( $subject ) <= 5) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is short not accepted subject',
                    $subject
                )
            );
        }

        if ( strlen( $subject ) > 150) {
            throw new InvalidArgumentException(
                sprintf(
                    '"%s" is too long not accepted subject',
                    $subject
                )
            );
        }
        
    }
}