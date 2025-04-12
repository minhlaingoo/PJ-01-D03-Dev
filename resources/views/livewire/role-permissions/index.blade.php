<!-- Table -->
<section id="table" class="">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">Role & Permission Table</h2>
        @if (checkPermission('role', 'create'))
            <mijnui:button color="primary" href="{{ route('role-permissions.create') }}" wire:navigate>Create
            </mijnui:button>
        @endif
    </div>
    <x-alert />
    <div>
        <mijnui:table :paginate="$roles">

            <mijnui:table.columns>
                <mijnui:table.column>Name</mijnui:table.column>
                @if (checkPermission('role', 'update') || checkPermission('role', 'delete'))
                    <mijnui:table.column>Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>
                @foreach ($roles as $role)
                    <mijnui:table.row>
                        <mijnui:table.cell>
                            {{ $role->name }}
                        </mijnui:table.cell>
                        @if (checkPermission('role', 'update') || checkPermission('role', 'delete'))
                            <mijnui:table.cell class="flex items-center text-start">
                                @if ($role->id == 1)
                                    <p>Default Role</p>
                                @else
                                    <mijnui:dropdown>
                                        <mijnui:dropdown.trigger>
                                            <mijnui:button size="xs">
                                                Action
                                            </mijnui:button>
                                        </mijnui:dropdown.trigger>
                                        <mijnui:dropdown.content>
                                            <mijnui:dropdown.body>
                                                <mijnui:list>
                                                    @if (checkPermission('role', 'update'))
                                                        <mijnui:list.item wire:navigate
                                                            href="{{ route('role-permissions.edit', ['role' => $role->id]) }}">
                                                            Edit
                                                        </mijnui:list.item>
                                                    @endif
                                                    @if (checkPermission('role', 'delete'))
                                                        <mijnui:list.item
                                                            x-on:click="if(confirm('Are you sure to delete')) $wire.call('delete',{{ $role->id }})">
                                                            Delete
                                                        </mijnui:list.item>
                                                    @endif
                                                </mijnui:list>
                                            </mijnui:dropdown.body>
                                        </mijnui:dropdown.content>
                                    </mijnui:dropdown>
                                @endif
                            </mijnui:table.cell>
                        @endif
                    </mijnui:table.row>
                @endforeach
            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
