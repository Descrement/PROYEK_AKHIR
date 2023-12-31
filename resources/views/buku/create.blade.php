@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Input Buku</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>

<body>
  <header>
    
  </header>

  <main>
    @if ($errors->any())
      <div style="color: red;">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="container mt-4">
      @if(session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <div class="card">
        <div class="card-header text-center font-weight-bold">
          INPUT BUKU
        </div>
        <div class="card-body">
          <form name="add-blog-post-form" id="add-blog-post-form" method="POST" action="{{ route('buku.store') }}"enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="nama">JUDUL</label>
              <input type="text" id="judul" name="judul" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
              <label for="ttl">PENULIS</label>
              <input type="text" id="penulis" name="penulis" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
              <label for="alamat">TAHUN TERBIT</label>
              <input type="date" id="tahun_terbit" name="tahun_terbit" class="form-control form-control-sm" required>
            </div>
            <div class="form-group">
              <label for="email">FOTO BUKU</label>
              <input type="file" id="foto" name="foto" class="form-control form-control-sm" required>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
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