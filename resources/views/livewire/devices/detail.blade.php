<div class="space-y-2">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
        <mijnui:card class="col-span-1 md:col-span-2 lg:col-span-1">
            <mijnui:card.header class="text-lg font-medium">Device Detail</mijnui:card.header>
            <mijnui:card.content class="text-sm space-y-2">

                <div class="flex items-center">
                    <p class="w-24">Device Name</p>
                    <p>: {{ $device->name }}</p>
                </div>
                <div class="flex items-center">
                    <p class="w-24">Device Model</p>
                    <p>: {{ $device->model }}</p>
                </div>
                <div class="flex items-center">
                    <p class="w-24">Device Status</p>
                    <mijnui:badge color="{{ $device->is_active ? 'success' : 'danger' }}" size="xs">
                        {{ $device->is_active ? 'Running' : 'Offline' }}
                    </mijnui:badge>
                </div>

            </mijnui:card.content>
        </mijnui:card>

        <mijnui:card>
            <mijnui:card.header class="text-lg font-medium">Uptime Monitor</mijnui:card.header>
            <mijnui:card.content class="text-sm space-y-2">

                <div class="flex items-center">
                    <p class="w-24">Uptime:</p>
                    <p>ChemiLab</p>
                </div>
                <div class="flex items-center">
                    <p class="w-24">Running Time:</p>
                    <p>36 days</p>
                </div>
                <div class="flex items-center">
                    <p class="w-24">Last Online:</p>
                    <p>2025-03-21 10:02</p>
                </div>

            </mijnui:card.content>
        </mijnui:card>

        <mijnui:card>
            <mijnui:card.header class="text-lg font-medium">Battery Status</mijnui:card.header>
            <mijnui:card.content class="text-sm space-y-2">
                <div class="flex items-center">
                    <p class="w-24">Battery Level:</p>
                    <p>86%</p>
                </div>
                <div class="flex items-center">
                    <p class="w-24">Status:</p>
                    <p>Charging</p>
                </div>
            </mijnui:card.content>
        </mijnui:card>
    </div>

    <div class="col-span-3">
        <livewire:devices.log id="{{ $device->id }}" />
    </div>
</div>
