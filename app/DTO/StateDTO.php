<?php

namespace App\DTO;

final readonly class StateDTO
{
    public function __construct(
        public string $abbrev,
        public string $iso,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            abbrev: $data['abbrev'],
            iso: $data['iso'],
        );
    }
}
