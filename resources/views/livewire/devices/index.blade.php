<!-- Table -->
<section id="table" class="">
    <x-alert />
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Devices Table</h2>
        @if (checkPermission('user', 'create'))
            <mijnui:button color="primary" href="{{ route('devices.create') }}" wire:navigate>Create</mijnui:button>
        @endif
    </div>

    <div>
        <mijnui:table class="table-fixed">

            <mijnui:table.columns>
                <mijnui:table.column class="w-32">Name</mijnui:table.column>
                <mijnui:table.column class="w-24">Model</mijnui:table.column>
                <mijnui:table.column class="w-28 text-center">Topic</mijnui:table.column>
                <mijnui:table.column class="w-24">Status</mijnui:table.column>
                <mijnui:table.column class="w-48">Last Active</mijnui:table.column>
                @if (checkPermission('user', 'update') || checkPermission('user', 'delete'))
                    <mijnui:table.column class="w-32">Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>
                @foreach ($devices as $device)
                    <mijnui:table.row>
                        <mijnui:table.cell >{{ $device->name }}</mijnui:table.cell>
                        <mijnui:table.cell >{{ $device->model }}</mijnui:table.cell>
                        <mijnui:table.cell class="text-center">{{ $device->topic ?? '-' }}</mijnui:table.cell>
                        <mijnui:table.cell >
                            <mijnui:badge color="{{ $device->is_active ? 'success' : 'danger' }}" size="xs">{{ $device->is_active ? 'Running' : 'Offline' }}
                            </mijnui:badge>
                        </mijnui:table.cell>
                        <mijnui:table.cell >{{ now()->subDay() }}</mijnui:table.cell>
                        <mijnui:table.cell >
                            <a href="{{ route('devices.detail', ['id' => $device->id]) }}" wire:nagivate>
                                <mijnui:button size="sm" color="primary">View Detail</mijnui:button>
                            </a>
                        </mijnui:table.cell>
                    </mijnui:table.row>
                @endforeach

            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
