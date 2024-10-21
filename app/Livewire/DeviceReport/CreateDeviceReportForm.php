<?php

namespace App\Livewire\DeviceReport;

use App\Exports\DeviceReportExport;
use App\Models\Device;
use Carbon\Carbon;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class CreateDeviceReportForm extends Component
{
    public string $device;

    public function createReport() {
        $this->validate([
            "device" => "required|exists:devices,id"
        ]);

        $device = Device::findOrFail($this->device);

        $deviceReport = $device->reports()->create([
            "device_name" => $device->name,
            "device_city" => $device->city,
            "device_latitude" => $device->latitude,
            "device_longitude" => $device->longitude,
            "device_id" => $device->id,
            "owner_id" => auth()->id(),
        ]);

        foreach ($device->slots as $slot) {
            $deviceReport->slots()->create([
                "name" => $slot->name,
                "volume" => $slot->volume,
                "max_volume" => $slot->max_volume,
                "slot_id" => $slot->id
            ]);
        }

        // create the xlsx
        $datetime = Carbon::make($deviceReport->created_at)
            ->timezone('Europe/Bucharest')
            ->format('Y-m-d-H-i-s');
        $filePath =
            "device-reports/device-report-" .
            "{$deviceReport->id}-{$datetime}.xlsx";
        Excel::store(
            new DeviceReportExport($deviceReport),
            $filePath
        );

        $deviceReport->update([
            "spreadsheet_link" => $filePath
        ]);

        return redirect()
            ->route(auth()->user()->role . '.device-reports.index')
            ->with('success', __("Raportul a fost creat cu succes."));
    }

    public function render()
    {
        return view('livewire.device-report.create-device-report-form');
    }
}
