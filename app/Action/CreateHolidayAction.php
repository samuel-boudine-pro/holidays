<?php

namespace App\Action;

use App\DTO\HolidayDTO;
use App\Models\Holiday;

class CreateHolidayAction
{
    public function execute(HolidayDTO $holidayDTO): void
    {
        Holiday::upsert($holidayDTO->toArray(), ['date', 'annee']);
    }
}