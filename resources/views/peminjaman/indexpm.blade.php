@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>INPUT BUKU</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css"
        integrity="sha384-E1xNwr/BJvr+Gmcr0FWFNpXniTwhDQ4z3T9Hs2ta8PrZKJAI9l5dyhoHf8L+X6fP" crossorigin="anonymous">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcg4LzBsLJD3lp4A/Bhr/QA=="
        crossorigin="anonymous" />
    <!-- Roboto Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto&display=swap">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ public_path('css/styles.css') }}">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="https://coreui.io/v/bootstrap/css/coreui.min.css">
    <!-- CoreUI JS -->
    <script src="https://coreui.io/v/bootstrap/js/coreui.bundle.min.js"></script>
</head>

<body class="c-app">
    <!-- Sidebar -->
    <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
        <!-- Sidebar content -->
    </div>
    <!-- Main wrapper -->
    <div class="c-wrapper">
        <!-- Header -->
        <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
            <!-- Header content -->
        </header>
        <!-- Main content -->
        <div class="c-body">
            <main class="c-main">
                <!-- Main content -->
                <div class="container mt-5">
                    <div class="row">
                        <div class="row-md-12">
                            <!-- Use Bootstrap card component for the table -->
                            <div class="card border-0 shadow-sm rounded">
                                <div class="card-body">
                                    <center>
                                        <h1>DATA PEMINJAMAN</h1>
                                    </center>
                                    <!-- Use Font Awesome icons for the buttons -->
                                    <a href="{{ route('peminjaman.create') }}"
                                        class="btn btn-md btn-success mb-3"><i class="fas fa-plus"></i> TAMBAH POST</a>
                                    <!-- Use Bootstrap table component for the data -->
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="row">ID</th>
                                                <th scope="row">JUDUL BUKU</th>
                                                <th scope="row">PEMINJAM</th>
                                                <th scope="row">CATATAN</th>
                                                <th scope="row">TANGGAL PINJAM</th>
                                                <th scope="row">TANGGAL KEMBALI</th>
                                                <th scope="row">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bukus as $buku)
                                            <tr>
                                                <td>{{ $buku->id_peminjaman }}</td>
                                                <td>{{ $buku->judul_buku }}</td>
                                                <td>{{ $buku->nama_pelanggan }}</td>
                                                <td>{{ $buku->note }}</td>
                                                <td>{{ $buku->created_at }}</td>
                                                <td>{{ $buku->updated_at }}</td>
                                                <td class="text-center">
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('peminjaman.destroy', $buku->id_peminjaman) }}"
                                                        method="POST">
                                                        <a href="{{ url('kembali/'. $buku->id_peminjaman) }}"
                                                            class="btn btn-sm btn-dark"><i
                                                                class="fas fa-eye"></i>BUKU SUDAH KEMBALI</a>
                                                        <a href="{{ route('peminjaman.edit', $buku->id_peminjaman) }}"
                                                            class="btn btn-sm btn-primary"><i
                                                                class="fas fa-edit"></i> EDIT</a>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-sm btn-danger"><i
                                                                class="fas fa-trash"></i> HAPUS</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @empty
                                            <!-- Use Bootstrap alert component for error messages -->
                                            <div class="alert alert-danger">
                                                Data Post belum Tersedia.
                                            </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $bukus->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
            integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd"
            crossorigin="anonymous"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

        <script>
            @if(session()->has('success'))
            toastr.success('{{ session('success') }}', 'BERHASIL!');
            @elseif(session()->has('error'))
            toastr.error('{{ session('error') }}', 'GAGAL!');
            @endif
        </script>
    </body>

    </html>
@endsection
