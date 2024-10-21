<?php

namespace App\Exports;

use App\Models\DeviceReport;
use Maatwebsite\Excel\Concerns\FromCollection;

class DeviceReportExport implements FromCollection
{
    protected DeviceReport $deviceReport;

    public function __construct(DeviceReport $deviceReport) {
        $this->deviceReport = $deviceReport;
    }

    public function collection(): \Illuminate\Support\Collection
    {
        $keys = ["name", "city"];
        $values = [
            $this->deviceReport->device_name,
            $this->deviceReport->device_city
        ];

        if (
            $this->deviceReport->device_latitude &&
            $this->deviceReport->device_longitude
        ) {
            array_push($keys, "latitude", "longitude");
            array_push($values, $this->deviceReport->device_latitude);
            array_push($values, $this->deviceReport->device_longitude);
        }
        foreach ($this->deviceReport->slots()->get() as $slot) {
            array_push($keys, $slot->name);
            array_push($values, number_format($slot->volume,2));
        }

        return collect([$keys, $values]);
    }
}
