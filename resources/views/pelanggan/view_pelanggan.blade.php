
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Data Mahasiswa</title>
  <meta charset="utf-8">
</head>

<body>
  <header>
    <!-- Place navbar here -->
  </header>

  <main>
    <div class="container">
      <h2 class="mt-5">Data Mahasiswa</h2>
      <table class="table table-bordered table-striped mt-4">
        <thead class="table-dark">
          <tr>
          	<th>Foto</th>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <tr>
             <td>
           		<img src="{{ url('foto_pelanggan/' . $filename) }}" width="250px" alt="{{ $data['foto'] }}" >
            </td>
            <td>{{ htmlspecialchars($data['nama']) }}</td>
            <td>{{ htmlspecialchars($data['ttl']) }}</td>
            <td>{{ htmlspecialchars($data['email']) }}</td>
 
          </tr>
        </tbody>
      </table>

      <div class="text-center">
        <a href="read_pelanggan" class="btn btn-success mt-3">Tampilkan data</a>
      </div>
    </div>
  </main>

  <footer>
    <!-- Place footer here -->
  </footer>
</body>

</html>
@endsection