<!-- Table -->
<section id="table" class="">
    <x-alert />

    <div>
        {{-- <mijnui:table>

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
        </mijnui:table> --}}

        <!-- Protocol Section -->
        <section class="mb-8">
            <div class="inline-flex items-end gap-4 my-4">
                <h2 class="text-2xl font-semibold ">Protocol List</h2>
                @if (checkPermission('user', 'create'))
                    <a href="{{ route('protocols.create') }}"
                        class="text-sm border-b-2 border-black border-dotted hover:border-solid leading-0"
                        wire:navigate>Custom Protocol</a>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <img src="https://lh5.googleusercontent.com/proxy/t08n2HuxPfw8OpbutGWjekHAgxfPFv-pZZ5_-uTfhEGK8B5Lp-VN4VjrdxKtr8acgJA93S14m9NdELzjafFfy13b68pQ7zzDiAmn4Xg8LvsTw1jogn_7wStYeOx7ojx5h63Gliw"
                        alt="Protocol 1" class="w-full h-48 object-cover">
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-semibold  text-gray-800">THIOL-MALEIMIDE CONJUGATION</h3>
                        <p class="text-gray-600 text-xs mb-8">
                            This protocol provides a comprehensive framework for
                            implementing secure and efficient data transfer mechanisms across distributed systems.</p>
                        <a wire:navigate href="{{ route('protocols.create') }}" class="block">
                            <mijnui:button color="primary" size="xs"
                                class="text-xs ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">
                                Set Protocol</mijnui:button>
                        </a>
                    </div>

                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <img src="https://lh5.googleusercontent.com/proxy/t08n2HuxPfw8OpbutGWjekHAgxfPFv-pZZ5_-uTfhEGK8B5Lp-VN4VjrdxKtr8acgJA93S14m9NdELzjafFfy13b68pQ7zzDiAmn4Xg8LvsTw1jogn_7wStYeOx7ojx5h63Gliw"
                        alt="Protocol 2" class="w-full h-48 object-cover">
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800">SORTASE ENZYME CONJUGATION</h3>
                        <p class="text-gray-600 text-xs">
                            A lightweight protocol designed for real-time communication
                            between client and server applications with minimal overhead and latency.
                        </p>
                        <a wire:navigate href="{{ route('protocols.create') }}" class="block">
                            <mijnui:button color="primary" size="xs"
                                class="text-xs ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">
                                Set Protocol</mijnui:button>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                    <img src="https://lh5.googleusercontent.com/proxy/t08n2HuxPfw8OpbutGWjekHAgxfPFv-pZZ5_-uTfhEGK8B5Lp-VN4VjrdxKtr8acgJA93S14m9NdELzjafFfy13b68pQ7zzDiAmn4Xg8LvsTw1jogn_7wStYeOx7ojx5h63Gliw"
                        alt="Protocol 3" class="w-full h-48 object-cover">
                    <div class="p-5 space-y-2">
                        <h3 class="text-lg font-semibold text-gray-800">LYSINE-NHS ESTER CONJUGATION</h3>
                        <p class="text-gray-600 text-xs">
                            An advanced protocol that enables secure end-to-end encryption
                            for sensitive data transmission across untrusted networks.
                        </p>
                        <a wire:navigate href="{{ route('protocols.create') }}" class="block">
                            <mijnui:button color="primary" size="xs"
                                class="text-xs ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">
                                Set Protocol</mijnui:button>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Phase Library Section -->
        <section>
            <h2 class="text-2xl font-semibold my-4">Phase Library</h2>

            <div class="flex gap-4">
                <a wire:navigate href="{{ route('phase.initialization-cycle-setup') }}">
                    <mijnui:button color="primary" class="ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">
                        Initialization Procedure</mijnui:button>
                </a>
                <a wire:navigate href="{{ route('phase.storage-cycle-setup') }}">
                    <mijnui:button color="primary" class="ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">System
                        Storage</mijnui:button>
                </a>
                <a wire:navigate href="{{ route('phase.system-cleaning-setup') }}">
                    <mijnui:button color="primary" class="ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500">System
                        Clean
                    </mijnui:button>
                </a>
                {{-- <mijnui:button color="primary" class="ring-1 hover:ring-2 ring-blue-600 hover:bg-blue-500" >Column Performance</mijnui:button> --}}
            </div>
        </section>
    </div>
</section>
