@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Register Pelanggan</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/css/bootstrap.min.css"
    integrity="sha384-E1xNwr/BJvr+Gmcr0FWFNpXniTwhDQ4z3T9Hs2ta8PrZKJAI9l5dyhoHf8L+X6fP" crossorigin="anonymous">

  <!-- Custom CSS -->
  <style>
    /* Define your custom colors here */
    :root {
      --primary-color: #007bff;
      --secondary-color: #6c757d;
      --success-color: #28a745;
      --danger-color: #dc3545;
      --warning-color: #ffc107;
      --info-color: #17a2b8;
      --light-color: #f8f9fa;
      --dark-color: #343a40;
    }

    /* Use a custom font from Google Fonts */
    @import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');

    /* Apply the custom font to the body element */
    body {
      font-family: 'Roboto', sans-serif;
    }

    /* Center the main content */
    .container {
      max-width: 600px;
    }

    /* Add some margin to the form elements */
    .form-group {
      margin-bottom: 15px;
    }

    /* Add some padding and border to the card element */
    .card {
      padding: 20px;
      border: 1px solid var(--primary-color);
    }

    /* Change the color of the card header */
    .card-header {
      background-color: var(--primary-color);
      color: white;
    }

    /* Change the color of the submit button */
    .btn-primary {
      background-color: var(--success-color);
      border-color: var(--success-color);
    }
  </style>
</head>

<body>
  <header>
    <!-- place header here -->
  </header>

  <main>
    @if ($errors->any())
      <!-- Use Bootstrap alert component for error messages -->
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <div class="container mt-4">
      @if(session('status'))
        <!-- Use Bootstrap alert component for success messages -->
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
      @endif

      <!-- Use Bootstrap card component for the form -->
      <div class="card">
        <div class="card-header text-center font-weight-bold">
          Data Pelanggan
        </div>
        <div class="card-body">
          <!-- Use Bootstrap grid system for the form layout -->
          <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('save_pelanggan')}}"enctype="multipart/form-data">
            @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" name="nama" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="ttl">Tanggal Lahir</label>
                  <input type="date" id="ttl" name="ttl" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="alamat">Email</label>
                  <input type="text" id="email" name="email" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="email">Password</label>
                  <input type="password" id="password" name="password" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="email">Password Konfirmasi</label>
                  <input type="password" id="password" name="password_confirmation" class="form-control form-control-sm" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group">
                  <label for="foto">Foto Profil</label>
                  <input type="file" id="foto" name="foto" class="form-control form-control-sm" required>
                </div>
              </div>
            </div>

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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-UAmkd46jwNU9Nhebi0lZUCZl+U2L7a4SNlFqOQD6jZM=" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.bundle.min.js"
    integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>
</body>

</html>
@endsection
