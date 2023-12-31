@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Title</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <header>
    <!-- place navbar here -->
  </header>
  <main>
    <div class="container mt-4">
      @if(session('status'))
      <div class="alert alert-success">
        {{ session('status') }}
      </div>
      @endif
      <div class="card">
        <div class="card-header text-center font-weight-bold">
          Data Mahasiswa
        </div>
        <div class="card-body">
          <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{ url('edit_pelanggan') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nim">No</label>
              <input type="text" id="id_pelanggan" name="id_pelanggan" class="form-control form-control-sm" value="{{ $data->id_pelanggan }}" readonly >
            </div>
            <div class="form-group">
              <label for="nim">Nama</label>
              <input type="text" id="nama" name="nama" class="form-control form-control-sm" required="" value="{{ $data->nama }}" >
            </div>
            <div class="form-group">
              <label for="alamat">Tanggal Lahir</label>
               <input type="date" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-sm" required="" value="{{ $data->tgl_lahir }}" >
            </div>
            <div class="form-group">
              <label for="alamat">Foto</label>
              <img src="{{ url('foto_pelanggan/' . $data->foto) }}" width="200px" alt="{{ $data->foto }}" >
              <input type="file" id="foto" name="foto" class="form-control form-control-sm" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </main>
  <footer>
    <!-- place footer here -->
  </footer>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
@endsection
