<?php

namespace App\Http\Controllers;

use App\Action\CreateHolidayAction;
use App\DTO\HolidayDTO;
use App\Enum\StateEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class HolidayController
{
    public function index(CreateHolidayAction $action)
    {
        try {
            $holidays = json_decode(file_get_contents(public_path('assets/feries.json')), true);
            $holidays = $holidays['response']['holidays'];
            $holidays = HolidayDTO::fromApi(data: $holidays, state: StateEnum::GENEVE);
            $action->execute(holidayDTO: $holidays);

            return $holidays->toArray();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
