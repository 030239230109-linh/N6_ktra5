<x-movie-layout>
    <x-slot name="title">
        Thêm phim mới
    </x-slot>

    <div class="container">
        <h4 class="text-center text-primary mt-3"><b>THÊM PHIM</b></h4>
        
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data" class="mt-4">
            @csrf

            <div class="form-group">
                <label>Tên tiếng Anh</label>
                <input type="text" name="movie_name" class="form-control" value="{{ old('movie_name') }}">
                @error('movie_name') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Tên tiếng Việt</label>
                <input type="text" name="movie_name_vn" class="form-control" value="{{ old('movie_name_vn') }}">
                @error('movie_name_vn') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Ngày phát hành</label>
                <input type="text" name="release_date" class="form-control" placeholder="yyyy-mm-dd" value="{{ old('release_date') }}">
                @error('release_date') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Mô tả</label>
                <textarea name="overview_vn" class="form-control" rows="4">{{ old('overview_vn') }}</textarea>
                @error('overview_vn') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="form-group">
                <label>Ảnh đại diện</label>
                <input type="file" name="image" class="form-control border-0 p-0">
                @error('image') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="text-center mt-4 mb-5">
                <button type="submit" class="btn btn-primary px-4">Lưu</button>
                <a href="{{ route('movies.index3') }}" class="btn btn-secondary px-4">Hủy</a>
            </div>
        </form>
    </div>
</x-movie-layout>