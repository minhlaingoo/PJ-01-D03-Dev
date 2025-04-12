<mijnui:table>

    <mijnui:table.columns>
        <mijnui:table.column>Log</mijnui:table.column>
        <mijnui:table.column>Device Name</mijnui:table.column>
        <mijnui:table.column>Sensor</mijnui:table.column>
        <mijnui:table.column>Logged At</mijnui:table.column>
        <mijnui:table.column>Action</mijnui:table.column>

    </mijnui:table.columns>

    <mijnui:table.rows>
        <mijnui:table.row>
            <mijnui:table.cell>Heat has been detected up to 50*C </mijnui:table.cell>
            <mijnui:table.cell>ChemLab</mijnui:table.cell>
            <mijnui:table.cell>Heat sensor</mijnui:table.cell>
            <mijnui:table.cell>{{now()}}</mijnui:table.cell>
            <mijnui:table.cell>
                <mijnui:button color="primary" size="xs">View</mijnui:button>
            </mijnui:table.cell>
        </mijnui:table.row>
    </mijnui:table.rows>
</mijnui:table>
