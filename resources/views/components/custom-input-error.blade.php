@props(['messages'])

@if ($messages)

        @foreach ((array) $messages as $message)
            <div class="error">{{ $message }}</div>
        @endforeach
@endif
<style>
    .error {
        color: red;
        padding: 4px;
    }
</style>
