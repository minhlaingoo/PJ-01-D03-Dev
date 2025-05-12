<!-- Table -->
<section id="table" class="">
    <x-alert />
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold">User Table</h2>
        @if (checkPermission('user', 'create'))
            <mijnui:button color="primary" href="{{ route('users.create') }}" wire:navigate>Create</mijnui:button>
        @endif
    </div>
   
    <div class="w-full overflow-x-auto">
        <mijnui:table class="table-fixed w-full">
            <mijnui:table.columns>
                <mijnui:table.column class="w-32">Name</mijnui:table.column>
                <mijnui:table.column class="w-32">Role</mijnui:table.column>
                <mijnui:table.column class="w-48">Email</mijnui:table.column>
                <mijnui:table.column class="w-48">Joined</mijnui:table.column>
                <mijnui:table.column class="w-24">Active</mijnui:table.column>
                @if (checkPermission('user', 'update') || checkPermission('user', 'delete'))
                    <mijnui:table.column class="w-24">Action</mijnui:table.column>
                @endif
            </mijnui:table.columns>

            <mijnui:table.rows>
                @foreach ($users as $user)
                    <mijnui:table.row>
                        <mijnui:table.cell >
                            {{ $user->name }}
                        </mijnui:table.cell>
                        <mijnui:table.cell >
                            {{ $user->role->name ?? '' }}
                        </mijnui:table.cell>
                        <mijnui:table.cell >
                            {{ $user->email }}
                        </mijnui:table.cell>
                        <mijnui:table.cell >
                            {{ $user->created_at->format('d M Y H:i') }}
                        </mijnui:table.cell>
                        <mijnui:table.cell >
                            <mijnui:badge size="sm" color="{{ $user->is_active ? 'success' : 'danger' }}"
                                rounded="lg" outline>{{ $user->is_active ? 'active' : 'inactive' }}</mijnui:badge>
                        </mijnui:table.cell>
                        @if (checkPermission('user', 'update') || checkPermission('user', 'delete'))
                            <mijnui:table.cell class="flex items-center text-start ">

                                <mijnui:dropdown>
                                    <mijnui:dropdown.trigger>
                                        <mijnui:button size="xs">
                                            Action
                                        </mijnui:button>
                                    </mijnui:dropdown.trigger>
                                    <mijnui:dropdown.content align="right">
                                        <mijnui:dropdown.body>
                                            <mijnui:list>
                                                @if (checkPermission('user', 'update'))
                                                    <mijnui:list.item wire:navigate
                                                        href="{{ route('users.edit', ['id' => $user->id]) }}">
                                                        Edit
                                                    </mijnui:list.item>
                                                @endif
                                                @if (checkPermission('user', 'delete'))
                                                    <mijnui:list.item
                                                        x-on:click="if(confirm('Are you sure to delete')) $wire.call('delete', {{ $user->id }})">
                                                        Delete
                                                    </mijnui:list.item>
                                                @endif
                                            </mijnui:list>
                                        </mijnui:dropdown.body>
                                    </mijnui:dropdown.content>
                                </mijnui:dropdown>
                            </mijnui:table.cell>
                        @endif
                    </mijnui:table.row>
                @endforeach
            </mijnui:table.rows>
        </mijnui:table>
    </div>
</section>
