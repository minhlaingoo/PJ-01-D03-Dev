<mijnui:table wire:poll.1s="checkForUpdate">

    <mijnui:table.columns>
        <mijnui:table.column>Log</mijnui:table.column>
        <mijnui:table.column>Device Name</mijnui:table.column>
        <mijnui:table.column>Sensor</mijnui:table.column>
        <mijnui:table.column>Logged At</mijnui:table.column>
        <mijnui:table.column>Action</mijnui:table.column>

    </mijnui:table.columns>

    <mijnui:table.rows>
        @foreach ($logs as $log)
            <mijnui:table.row>
                <mijnui:table.cell>{{$log->value}}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->sensor->device->name}}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->sensor->name}}</mijnui:table.cell>
                <mijnui:table.cell>{{ $log->created_at->diffForHumans()}}</mijnui:table.cell>
                <mijnui:table.cell>
                    <mijnui:button color="primary" size="xs">View</mijnui:button>
                </mijnui:table.cell>
            </mijnui:table.row>
        @endforeach

    </mijnui:table.rows>
</mijnui:table>
