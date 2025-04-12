<!-- Table -->
<section id="table" class="">
    <x-alert />
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Protocol List</h2>
        @if (checkPermission('user', 'create'))
            <mijnui:button color="primary" href="{{ route('protocols.create') }}" wire:navigate>Create</mijnui:button>
        @endif
    </div>

    <div>
        <mijnui:table>

            <mijnui:table.columns>
                <mijnui:table.column>No</mijnui:table.column>
                <mijnui:table.column>Name</mijnui:table.column>
                <mijnui:table.column>Description</mijnui:table.column>
                @if (checkPermission('user', 'update') || checkPermission('user', 'delete'))
                    <mijnui:table.column>Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>
                <mijnui:table.row>
                    <mijnui:table.cell>1</mijnui:table.cell>
                    <mijnui:table.cell>Sample Protocol</mijnui:table.cell>
                    <mijnui:table.cell> Lorem ipsum dolor sit amet consectetur. </mijnui:table.cell>
                </mijnui:table.row>
            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
