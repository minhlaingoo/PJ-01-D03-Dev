@php
    $id = Str::random(10);
@endphp

<div class="h-80">
    <canvas id="{{ $id }}" />
</div>

@once
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @endpush
@endonce

@push('scripts')
    <script>
        var chart = new Chart(
            document.getElementById("{{ $id }}"), {
                type: 'bar',
                data: {
                    labels: @json($labels),
                    datasets: @json($dataset)
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                            title: {
                                display: true,
                                text: 'Chamber' // 🠔 X-Axis Label
                            }
                        },
                        y: {
                            stacked: true,
                            title: {
                                display: true,
                                text: 'Volume (ml)' // 🠔 Y-Axis Label
                            }
                        }
                    }
                }
            }
        );
    </script>
@endpush
