<div {{$attributes->merge([
    'class' => 'fixed bottom-4 right-4 z-[9999] '
])}}>
    @if (session()->has('message'))
        <mijnui:alert class="w-full mb-3" color="success">
            <mijnui:alert.icon icon="fa-solid fa-rocket" />
            <mijnui:alert.title> {{ session('message') }}</mijnui:alert.title>
        </mijnui:alert>
    @endif
    @if (session()->has('error'))
        <mijnui:alert class="w-full mb-3" color="error">
            <mijnui:alert.icon icon="fa-solid fa-rocket" />
            <mijnui:alert.title> {{ session('error') }}</mijnui:alert.title>
        </mijnui:alert>
    @endif
</div>
