<x-movie-layout>
    <x-slot name="title">Trang Chủ Movie</x-slot>

    <div class="list-movie">
        @foreach($movies as $item)
            <div class="movie">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->movie_name_vn }}">
                <div class="movie-info">
                    <h3>{{ $item->movie_name_vn }}</h3>
                    <p>{{ $item->release_date }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-movie-layout>