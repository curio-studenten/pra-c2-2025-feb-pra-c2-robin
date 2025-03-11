<div class="manual-details">
    <h1>{{ $manual->title }}</h1>
    <p>{{ $manual->description }}</p>

    <!-- Display the number of views -->
    <p>Views: {{ $manual->views }}</p>
</div>
@foreach($manuals as $manual)
    <div class="manual-item">
        <h3><a href="{{ route('manuals.show', $manual->id) }}">{{ $manual->title }}</a></h3>
        <p>Views: {{ $manual->views }}</p>
    </div>
@endforeach
