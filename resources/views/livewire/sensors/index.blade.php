<!-- Table -->
<section id="table" class="">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Sensors List</h2>
        @if (checkPermission('role', 'create'))
            <mijnui:button color="primary" href="{{ route('role-permissions.create') }}" wire:navigate>Create
            </mijnui:button>
        @endif
    </div>
    <x-alert />
    <div>
        <mijnui:table>

            <mijnui:table.columns>
                <mijnui:table.column>Name</mijnui:table.column>
                <mijnui:table.column>Sensor Type</mijnui:table.column>
                <mijnui:table.column>Device Name</mijnui:table.column>
                <mijnui:table.column>Unit</mijnui:table.column>
                {{-- <mijnui:table.column>Action</mijnui:table.column> --}}
            </mijnui:table.columns>

            <mijnui:table.rows>
                <mijnui:table.row>
                    <mijnui:table.cell>Heat Sensor</mijnui:table.cell>
                    <mijnui:table.cell>Iot3201</mijnui:table.cell>
                    <mijnui:table.cell>ChemLab</mijnui:table.cell>
                    <mijnui:table.cell>*C</mijnui:table.cell>
                    {{-- <mijnui:table.cell>
                        <mijnui:button size="xs" color="primary">View Detail</mijnui:button>
                    </mijnui:table.cell> --}}
                </mijnui:table.row>
                {{-- <mijnui:table.row>
                <mijnui:table.cell colspan="5" class='text-center py-8'>No Data</mijnui:table.cell>
              </mijnui:table.row> --}}
            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
