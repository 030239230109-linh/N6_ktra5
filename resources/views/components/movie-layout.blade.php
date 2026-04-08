<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('library/bootstrap.min.css') }}">

    <script src="{{ asset('library/jquery.slim.min.js') }}"></script>
    <script src="{{ asset('library/popper.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="{{ asset('library/jquery-3.7.1.js') }}"></script>

    <style>
        body {
            background: #f5f5f5;
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .banner {
            width: 100%;
            max-width: 1200px;
            height: 180px;
            background-image: url('{{ asset('images/banner.jpg') }}');
            background-size: cover;
            background-position: center;
            color: white;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .banner-content {
            padding: 20px 30px 10px 30px;
            text-align: center;
        }

        .banner-content h2,
        .banner-content h3 {
            margin: 0;
        }

        .search-input {
            width: 90%;
            position: relative;
            margin: 10px auto 0;
        }

        .search-input input {
            width: 100%;
            height: 40px;
            border-radius: 30px;
            border: none;
            padding: 0 110px 0 15px;
            outline: none;
            font-size: 14px;
        }

        .search-btn {
            width: 90px;
            height: 40px;
            color: white;
            background-image: linear-gradient(to right, rgba(30,213,169,1) 0%, rgba(1,180,228,1) 100%);
            border-radius: 30px;
            border: none;
            position: absolute;
            right: 0;
            top: 0;
            font-size: 13px;
        }

        .page-wrap {
            max-width: 1200px;
            margin: 10px auto;
        }

        .genre-card {
            background-color: #222;
            color: white;
            border-radius: 4px;
            overflow: hidden;
        }

        .genre-card .card-header {
            background-color: #1f1f1f;
            border-bottom: 1px solid #333;
            font-weight: bold;
        }

        .list-group-movie a {
            display: block;
            padding: 10px 14px;
            text-decoration: none;
            color: white;
            border-bottom: 1px solid #333;
            font-size: 14px;
        }

        .list-group-movie a:hover {
            background: #000;
            color: #fff;
        }

        .list-movie {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
        }

        .movie {
            background: white;
            border-radius: 6px;
            border: 1px solid #dbdbdb;
            overflow: hidden;
            cursor: pointer;
            box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            transition: 0.2s;
        }

        .movie:hover {
            transform: translateY(-3px);
        }

        .movie a {
            color: black;
            text-decoration: none;
            display: block;
        }

        .movie img {
            width: 100%;
            height: 300px;
            object-fit: cover;
            display: block;
        }

        .movie-info {
            padding: 12px;
        }

        .movie-info h3,
        .movie-info h4 {
            font-size: 18px;
            margin: 0 0 8px 0;
            line-height: 1.4;
        }

        .movie-info p {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        @media (max-width: 992px) {
            .list-movie {
                grid-template-columns: repeat(3, 1fr);
            }

            .movie img {
                height: 260px;
            }
        }

        @media (max-width: 768px) {
            .list-movie {
                grid-template-columns: repeat(2, 1fr);
            }

            .movie img {
                height: 240px;
            }
        }

        @media (max-width: 576px) {
            .list-movie {
                grid-template-columns: 1fr;
            }

            .movie img {
                height: 320px;
            }
        }
    </style>
</head>
<body>
    <header style="text-align:center">
        <div class="banner">
            <div class="banner-content">
                <h2>Welcome.</h2>
                <h3>Millions of movies, TV shows and people to discover. Explore now.</h3>
            </div>

            <div class="search-input">
                <form method="post" action="{{ url('/timkiem') }}">
                    @csrf
                    <input type="text" name="keyword" placeholder="Nhập tên bộ phim yêu thích để tìm kiếm">
                    <button class="search-btn" type="submit">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </header>

    <main class="page-wrap">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="genre-card">
                    <div class="card-header">
                        <i class="fa fa-film" aria-hidden="true"></i> <b>Thể loại phim</b>
                    </div>
                    <div class="list-group-movie">
                        @foreach($genre as $row)
                            <a href="{{ url('/theloai/' . $row->id) }}">{{ $row->genre_name_vn }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>
</html>