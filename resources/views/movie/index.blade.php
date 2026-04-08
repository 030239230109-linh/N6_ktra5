<x-movie-layout>
    <x-slot name="title">Trang Chủ Movie</x-slot>

    <div class="list-movie" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px;">
        @foreach($movies as $item)
            {{-- Toàn bộ thẻ movie được bọc trong thẻ <a> để có thể nhấn vào bất cứ đâu --}}
            <a href="{{ route('movie.detail', $item->id) }}" style="text-decoration: none; color: inherit;">
                <div class="movie" style="border: 1px solid #ddd; padding: 10px; border-radius: 8px;">
                    <img src="{{ asset('storage/' . $item->image) }}" 
                         alt="{{ $item->movie_name_vn }}" 
                         style="width: 100%; height: 300px; object-fit: cover; border-radius: 5px;">
                    
                    <div class="movie-info">
                        <h3 style="font-size: 16px; margin: 10px 0;">{{ $item->movie_name_vn }}</h3>
                        <p style="font-size: 14px; color: #666;">{{ $item->release_date }}</p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</x-movie-layout>