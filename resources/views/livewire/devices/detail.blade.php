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

    <hr>
    <h3 class="text-xl font-semibold">Sensor List</h3>
    <div>
        <mijnui:table>

            <mijnui:table.columns>

                <mijnui:table.column>ID.</mijnui:table.column>
                <mijnui:table.column>Name</mijnui:table.column>
                <mijnui:table.column>Sensor Type</mijnui:table.column>
                <mijnui:table.column>Sensor Unit</mijnui:table.column>
                <mijnui:table.column>Action</mijnui:table.column>
            </mijnui:table.columns>

            <mijnui:table.rows>

                @foreach ($sensors as $index => $sensor)
                    <mijnui:table.row>
                        <mijnui:table.cell>{{ $sensor->id }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->name }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->type }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->unit }}</mijnui:table.cell>
                        <mijnui:table.cell>
                            <a href="{{route('sensors.edit', ['id' => request()->route('id'), 'sensor' => $sensor->id])}}">
                                <mijnui:button color="primary">Edit</mijnui:button>
                            </a>
                            <mijnui:button color="danger">Delete</mijnui:button>
                        </mijnui:table.cell>
                    </mijnui:table.row>
                @endforeach

            </mijnui:table.rows>

        </mijnui:table>
    </div>

    {{-- <div class="col-span-3">
        <livewire:devices.log id="{{ $device->id }}" />
    </div> --}}
</div>
