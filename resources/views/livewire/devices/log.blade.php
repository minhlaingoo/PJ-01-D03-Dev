<mijnui:table wire:poll.1s="checkForUpdate" class="table-fixed">

    <mijnui:table.columns>

        <mijnui:table.column class="w-4">No.</mijnui:table.column>
        <mijnui:table.column class="w-48">Log</mijnui:table.column>
        <mijnui:table.column class="w-24">Device Name</mijnui:table.column>
        <mijnui:table.column class="w-24">Sensor Name</mijnui:table.column>
        <mijnui:table.column class="w-24">Logged at</mijnui:table.column>
    </mijnui:table.columns>

    <mijnui:table.rows>

        @foreach ($logs as $index => $log)
            <mijnui:table.row>
                <mijnui:table.cell>{{ $index + 1 }}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->value}}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->sensor->device->name}}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->sensor->name}}</mijnui:table.cell>
                <mijnui:table.cell>{{$log->created_at->diffForHumans()}}</mijnui:table.cell>
            </mijnui:table.row>
        @endforeach

    </mijnui:table.rows>

</mijnui:table>
