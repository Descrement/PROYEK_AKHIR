@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Data Post - SantriKoding.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('buku.update', $post->id_buku) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                              <label for="nama">JUDUL</label>
                              <input type="text" id="judul" name="judul" class="form-control form-control-sm" required value="{{$post->judul}}">
                            </div>
                            <div class="form-group">
                              <label for="ttl">PENULIS</label>
                              <input type="text" id="penulis" name="penulis" class="form-control form-control-sm" required value="{{$post->penulis}}">
                            </div>
                            <div class="form-group">
                              <label for="alamat">TAHUN TERBIT</label>
                              <input type="date" id="tahun_terbit" name="tahun_terbit" class="form-control form-control-sm" required value="{{$post->tahun_terbit}}">
                            </div>
                            <div class="form-group">
                              <label for="email">FOTO BUKU</label>
                              <input type="file" id="foto" name="foto" class="form-control form-control-sm" required>
                            
                                <!-- error message untuk content -->
                                @error('content')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>
@endsection