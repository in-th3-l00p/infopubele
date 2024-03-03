<?php

namespace App\Livewire;

use App\Models\Device;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class CreateDeviceReport extends Component
{
    public $devices;
    public ?int $device_id;

    public function mount() {
        $this->devices = Device::all();
        $this->device_id = null;
    }

    public function render()
    {
        return view('livewire.create-device-report');
    }

    public function store() {
        error_log("called");
        $this->validate([
            'device_id' => 'required|exists:devices,id'
        ]);

        $device = Device::find($this->device_id);
        $report = $device->reports()->create([
            "device_name" => $device->name,
            "device_city" => $device->city,
            "device_latitude" => $device->latitude,
            "device_longitude" => $device->longitude,
            "user_id" => auth()->id()
        ]);

        foreach ($device->slots()->get() as $slot) {
            $report->slots()->create([
                "name" => $slot->name,
                "volume" => $slot->volume,
                "max_volume" => $slot->max_volume,
                "device_id" => $device->id
            ]);
        }

        Excel::store(
            new \App\Exports\DeviceReportExport($report),
            'deviceReports/' . $report->id . '.xlsx',
            "public"
        );
        $report->spreadsheet_link = 'deviceReports/' . $report->id . '.xlsx';
        $report->save();

        return redirect()->route('device-reports.show', [
            'device_report' => $report
        ]);
    }
}
