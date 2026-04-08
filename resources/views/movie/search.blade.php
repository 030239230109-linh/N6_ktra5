<x-movie-layout>
    <x-slot name="title">Kết quả tìm kiếm</x-slot>

    <h3 style="margin-bottom: 15px;">Kết quả tìm kiếm cho: "{{ $keyword }}"</h3>

    <div class="list-movie">
        @forelse($movies as $item)
            <div class="movie">
                <a href="{{ route('movie.detail', $item->id) }}">
                    <img src="{{ asset('storage/' . ltrim(str_replace('public/', '', $item->image), '/')) }}"
                         alt="{{ $item->movie_name_vn }}">

                    <div class="movie-info">
                        <h3>{{ $item->movie_name_vn }}</h3>
                        <p>{{ $item->release_date }}</p>
                    </div>
                </a>
            </div>
        @empty
            <p>Không tìm thấy bộ phim phù hợp.</p>
        @endforelse
    </div>
</x-movie-layout>