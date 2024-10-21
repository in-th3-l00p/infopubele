<?php

namespace App\Livewire\DeviceReport;

use App\Exports\DeviceReportExport;
use App\Models\Device;
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
        Excel::store(
            new DeviceReportExport($deviceReport),
            "device-reports/device-report-{$deviceReport->id}.xlsx"
        );

        $deviceReport->update([
            "spreadsheet_link" => "device-reports/device-report-{$deviceReport->id}.xlsx"
        ]);

        return redirect()
            ->route('admin.device-reports.index')
            ->with('success', __("Raportul a fost creat cu succes."));
    }

    public function render()
    {
        return view('livewire.device-report.create-device-report-form');
    }
}
