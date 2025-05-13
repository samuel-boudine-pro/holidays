<?php

namespace App\DTO;

use App\Enum\StateEnum;
use Carbon\Carbon;
use Carbon\CarbonInterface;

final readonly class HolidayItemDTO
{
    public function __construct(
        public string $name,
        public CarbonInterface $date,
        public string $type,
        /** @var StateDTO[] */
        public array $states,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            name: $data['name'],
            date: Carbon::parse($data['date']['iso']),
            type: $data['primary_type'],
            states: array_map(fn(array $state): StateDTO => StateDTO::fromArray(data: $state), $data['states']),
        );
    }

    public function isGeneveState(StateEnum $iso): bool
    {
        return collect($this->states)->contains(fn(StateDTO $state): bool => $state->iso === $iso->value);
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'date' => $this->date,
            'annee' => $this->date->year,
        ];
    }
}
