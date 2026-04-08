<x-movie-layout>
    <x-slot name="title">
        Danh sách phim
    </x-slot>

    <h2 class="text-center">DANH SÁCH PHIM</h2>

    {{-- Bọc bảng vào một div để dễ nhìn hơn --}}
    <div class="bg-white p-3 rounded shadow-sm">
        
    <a href="/movie/create" class='btn btn-sm btn-success mb-2'>Thêm</a>
        <table id="id-table" class="table table-bordered table-striped w-100">
            <thead class="thead-dark">
                <tr>
                    <th>Ảnh đại diện</th>
                    <th>Tiêu đề</th>
                    <th>Giới thiệu</th>
                    <th>Ngày phát hành</th>
                    <th>Điểm</th>
                    <th style="width: 120px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td class="text-center">
                        <img src="{{ $movie->image_link ?? asset('storage/' . $movie->image) }}" class="img-thumbnail" style="width: 60px;">
                    </td>
                    <td><b>{{ $movie->movie_name_vn }}</b></td>
                    <td>{{ Str::limit($movie->overview_vn, 60) }}</td>
                    <td>{{ $movie->release_date }}</td>
                    <td><span class="badge badge-warning">{{ $movie->vote_average }}</span></td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" onsubmit="return confirm('Xác nhận xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm ml-1">Xóa</button>
                            </form>
                            
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- 
        QUAN TRỌNG: Đặt toàn bộ thư viện ở đây để ghi đè bản jQuery Slim của Layout 
    --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

    <script>
        // Sử dụng jQuery.noConflict() nếu cần để tránh xung đột với layout cũ
        var $j = jQuery.noConflict();
        
        $j(document).ready(function() {
            // Khởi tạo DataTable
            $j('#id-table').DataTable({
                responsive: true,
                pageLength: 5,         // HIỆN ĐÚNG 5 PHIM
                lengthMenu: [5, 10, 25, 50, 100], 
                bStateSave: false,      // Tắt tạm cái này để nó nhận pageLength: 5 ngay lập tức
                language: {
                    url: "//cdn.datatables.net/plug-ins/1.10.25/i18n/Vietnamese.json"
                }
            });
        });
    </script>

<style>
    /* Ép màu chữ tiêu đề bảng sang màu trắng */
    #id-table thead th {
        color: white !important;
        background-color: #343a40; /* Màu nền xám đậm của Bootstrap dark */
        text-align: center;
        vertical-align: middle;
    }

    /* Các CSS cũ của bạn giữ nguyên bên dưới */
    .dataTables_wrapper .dataTables_length, 
    .dataTables_wrapper .dataTables_filter, 
    .dataTables_wrapper .dataTables_info, 
    .dataTables_wrapper .dataTables_processing, 
    .dataTables_wrapper .dataTables_paginate {
        color: #333 !important;
        margin-bottom: 10px;
    }
    table.dataTable {
        border-collapse: collapse !important;
    }
</style>
</x-movie-layout>