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
        <mijnui:table>

            <mijnui:table.columns>
                <mijnui:table.column>Name</mijnui:table.column>
                <mijnui:table.column>Model</mijnui:table.column>
                <mijnui:table.column>Status</mijnui:table.column>
                <mijnui:table.column>Last Active</mijnui:table.column>
                @if (checkPermission('user', 'update') || checkPermission('user', 'delete'))
                    <mijnui:table.column>Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>
                <mijnui:table.row>
                    <mijnui:table.cell>ChemLab</mijnui:table.cell>
                    <mijnui:table.cell>IoT3201</mijnui:table.cell>
                    <mijnui:table.cell>
                        <mijnui:badge color="success" size="xs">Running</mijnui:badge>
                    </mijnui:table.cell>
                    <mijnui:table.cell>{{now()->subDay()}}</mijnui:table.cell>
                    <mijnui:table.cell>
                        <mijnui:button size="sm" color="primary">View Detail</mijnui:button>
                    </mijnui:table.cell>
                </mijnui:table.row>
            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
