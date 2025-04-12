<mijnui:table>

    <mijnui:table.columns>
        <mijnui:table.column>Name</mijnui:table.column>
        <mijnui:table.column>Sensor Type</mijnui:table.column>
        <mijnui:table.column>Device Name</mijnui:table.column>
        <mijnui:table.column>Unit</mijnui:table.column>
        @if (checkPermission('role', 'update') || checkPermission('role', 'delete'))
            <mijnui:table.column>Action</mijnui:table.column>
        @endif
    </mijnui:table.columns>

    <mijnui:table.rows>
        <mijnui:table.row>
            <mijnui:table.cell colspan="5" class='text-center py-8'>No Data</mijnui:table.cell>
        </mijnui:table.row>
    </mijnui:table.rows>

</mijnui:table>
