<h2>{{ $movie->title }}</h2>

<img src="{{ $movie->image }}" width="200">

<p>{{ $movie->description }}</p>
<p>Ngày phát hành: {{ $movie->release_date }}</p>
<p>Rating: {{ $movie->rating }}</p>

<a href="{{ route('movies.index') }}">Quay lại</a>