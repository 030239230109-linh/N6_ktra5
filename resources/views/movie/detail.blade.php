<x-movie-layout>
    <x-slot name="title">Chi tiết phim</x-slot>

    <div class="card p-3">
        <h2 style="margin-bottom: 15px;">{{ $movie->movie_name_vn }}</h2>

        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('storage/' . ltrim(str_replace('public/', '', $movie->image), '/')) }}"
                     alt="{{ $movie->movie_name_vn }}"
                     style="width:100%; height:450px; object-fit:cover; border-radius:8px;">
            </div>

            <div class="col-md-8">
                <p><strong>Ngày phát hành:</strong> {{ $movie->release_date }}</p>

                <p>
                    <strong>Quốc gia:</strong>
                    {{ $movie->country_name ?? $movie->country ?? 'Đang cập nhật' }}
                </p>

                <p><strong>Thời gian:</strong> {{ $movie->runtime }} phút</p>

                <p><strong>Doanh thu:</strong> {{ number_format($movie->revenue, 0, ',', '.') }}</p>

                <p><strong>Mô tả:</strong></p>
                <p>{{ $movie->overview_vn ?? $movie->overview }}</p>

                @if(!empty($movie->trailer))
                    <a href="{{ $movie->trailer }}" target="_blank" class="btn btn-success">
                        Xem trailer
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-movie-layout>