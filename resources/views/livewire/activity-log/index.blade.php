<mijnui:table :paginate="$logs">

    <mijnui:table.columns>
        <mijnui:table.column>Log Name</mijnui:table.column>
        <mijnui:table.column>Event</mijnui:table.column>
        <mijnui:table.column>Description</mijnui:table.column>
        <mijnui:table.column>Status</mijnui:table.column>
        <mijnui:table.column>Created At</mijnui:table.column>
        <mijnui:table.column>Created By</mijnui:table.column>
        <mijnui:table.column>Action</mijnui:table.column>

    </mijnui:table.columns>

    <mijnui:table.rows>
        @foreach ($logs as $log)
            <mijnui:table.row>
                <mijnui:table.cell>
                    {{ $log->log_name }}
                </mijnui:table.cell>
                <mijnui:table.cell>
                    {{ $log->event }}
                </mijnui:table.cell>
                <mijnui:table.cell>
                    {{ $log->description }}
                </mijnui:table.cell>
                <mijnui:table.cell>
                    <mijnui:badge size="xs"
                        color="{{ $log->status == 'success' ? 'success' : ($log->status == 'fail' ? 'danger' : 'warning') }}"
                        rounded="lg" outline>
                        {{ $log->status }}
                    </mijnui:badge>
                </mijnui:table.cell>
                <mijnui:table.cell>
                    {{ $log->created_at->format('H:i:s d-M-Y') }}
                </mijnui:table.cell>
                <mijnui:table.cell>
                    {{ $log->createdUser->name ?? 'unknown' }}
                </mijnui:table.cell>

                <mijnui:table.cell>
                    <a wire:navigate href="{{ route('activity-logs.detail', ['id' => $log->id]) }}">
                        <mijnui:button size="xs" color="primary">
                            View
                        </mijnui:button>
                    </a>
                </mijnui:table.cell>
            </mijnui:table.row>
        @endforeach
    </mijnui:table.rows>
</mijnui:table>
