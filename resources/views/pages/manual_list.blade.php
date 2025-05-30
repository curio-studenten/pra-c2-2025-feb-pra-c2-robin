<x-layouts.app>

    <x-slot:head>
        <meta name="robots" content="index, nofollow">
    </x-slot:head>

    <x-slot:breadcrumb>
        <li><a href="/{{ $brand->id }}/{{ $brand->getNameUrlEncodedAttribute() }}/" alt="Manuals for '{{$brand->name}}'"
                title="Manuals for '{{$brand->name}}'">{{ $brand->name }}</a></li>
    </x-slot:breadcrumb>


    <h1> {{ $brand->name }}</h1>

    <p>{{ __('introduction_texts.type_list', ['brand' => $brand->name]) }}</p>


    @foreach ($top5 as $item)
        <li>{{$item->name}}</li>
    @endforeach

    <h3>{{__('introduction_texts.popular_text_2')}}</h3>
    @foreach ($top10 as $item)
        <li>{{$brand->name}}: {{$item->name}}, Number of views : {{$tellerCount}}</li>
    @endforeach

    <div class="wrap">
        @foreach ($manuals as $manual)
            @if ($manual->locally_available)
                <a href="{{route('manual.trackClick', $manual->id)}}" alt="{{ $manual->name }}" title="{{ $manual->name }}"
                    class="manual-a">{{ $manual->name }}</a>
                ({{$manual->filesize_human_readable}})
            @else
                <a href="{{ route('manual.trackClick', $manual->id) }}" target="new" alt="{{ $manual->name }}"
                    title="{{ $manual->name }}" class="manual-a">{{ $manual->name }} : {{$tellerCount}}</a>
            @endif

            <!-- <br /> -->
        @endforeach
    </div>

</x-layouts.app>
