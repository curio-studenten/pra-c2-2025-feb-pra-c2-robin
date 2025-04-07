<x-layouts.app>
    <h1>Categories</h1>
    <li>
        @foreach ($categories as $category)
            <ul><a href="{{route('home', $category->id)}}">{{$category->name}}</a></ul>
        @endforeach
    </li>
    
</x-layouts.app>
