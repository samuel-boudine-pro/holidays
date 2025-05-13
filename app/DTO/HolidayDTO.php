<?php

namespace App\DTO;

use App\Enum\StateEnum;
use Carbon\CarbonInterface;

final readonly class HolidayDTO
{
    public function __construct(
        public array $holidayItems,
    ) {}

    public static function fromApi(array $data, StateEnum $state = StateEnum::GENEVE): self
    {
        $holidayItems = [];

        foreach ($data as $item) {
            if ($item['primary_type'] === 'Common local holiday') {
                $items = HolidayItemDTO::fromArray(data: $item);
                if ($items->isGeneveState( $state)) {
                    $holidayItems[] = $items;
                }
            }
        }

        return new self(
            holidayItems: $holidayItems,
        );
    }

    public function toArray(): array
    {
        return array_map(fn(HolidayItemDTO $item): array => $item->toArray(), $this->holidayItems);
    }
}
