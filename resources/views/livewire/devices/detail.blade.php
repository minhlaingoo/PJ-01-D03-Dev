<div class="space-y-2">
    <x-alert />
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
    <div class="flex items-center justify-between mb-4">
        <h3 class="text-xl font-semibold">Sensor List</h3>
        @if (checkPermission('device', 'create'))
            <a href="{{ route('devices.sensors', ['id' => $device->id]) }}">
                <mijnui:button color="primary">
                    + Add Sensor
                </mijnui:button>
            </a>
        @endif
    </div>
    <div>
        <mijnui:table>

            <mijnui:table.columns>

                <mijnui:table.column>ID.</mijnui:table.column>
                <mijnui:table.column>Name</mijnui:table.column>
                <mijnui:table.column>Sensor Type</mijnui:table.column>
                <mijnui:table.column>Sensor Unit</mijnui:table.column>
                @if (checkPermission('device', 'update'))
                    <mijnui:table.column>Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>

                @foreach ($sensors as $index => $sensor)
                    <mijnui:table.row>
                        <mijnui:table.cell>{{ $sensor->id }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->name }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->type }}</mijnui:table.cell>
                        <mijnui:table.cell>{{ $sensor->unit }}</mijnui:table.cell>
                        @if (checkPermission('device', 'update'))
                            <mijnui:table.cell>
                                <div class="flex gap-1 items-center">
                                    <a
                                        href="{{ route('sensors.edit', ['id' => $device->id, 'sensor' => $sensor->id]) }}">
                                        <mijnui:button color="primary">Edit</mijnui:button>
                                    </a>
                                    <div x-cloak x-data="{ open: false, sensor_id: null }">
                                        <!-- Sensor Delete Modal -->
                                        <div x-show="open" x-transition
                                            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40"
                                            @click.self="open = false">
                                            <div class="bg-white dark:bg-zinc-800 rounded shadow-lg p-6 w-full max-w-md">
                                                <h2 class="text-lg font-semibold mb-4">Delete Sensor</h2>
                                                <p class="mb-6">Are you sure you want to delete this sensor?</p>
                                                <div class="flex justify-end gap-2">
                                                    <mijnui:button type="button" outline
                                                        @click="open = false">
                                                        Cancel
                                                    </mijnui:button>

                                                    <mijnui:button type="button" color="danger" has-loading
                                                        wire:click="deleteSensor(sensor_id)"
                                                        wire:loading.attr="disabled" wire:target="deleteSensor"
                                                        x-on:sensor-delete="open=false">
                                                        Delete
                                                    </mijnui:button>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Trigger Button -->
                                        <mijnui:button color="danger" 
                                            @click="open = true; sensor_id = {{ $sensor->id }}">
                                            Delete
                                        </mijnui:button>
                                    </div>

                                </div>
                            </mijnui:table.cell>
                        @endif
                    </mijnui:table.row>
                @endforeach

            </mijnui:table.rows>

        </mijnui:table>
    </div>

    {{-- <div class="col-span-3">
        <livewire:devices.log id="{{ $device->id }}" />
    </div> --}}


</div>
