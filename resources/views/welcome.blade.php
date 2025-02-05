<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <style>
            /* Background & body */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    background: radial-gradient(circle, transparent 20%, #d94164 20%, #d94164 80%, transparent 80%, transparent) 0% 0% / 100px 100px, radial-gradient(circle, transparent 20%, #d94164 20%, #d94164 80%, transparent 80%, transparent) 50px 50px / 100px 100px, linear-gradient(#e8f9ff 10px, transparent 10px) 0px -5px / 50px 50px, linear-gradient(90deg, #e8f9ff 10px, #d94164 10px) -5px 0px / 50px 50px #d94164;
    background-size: 100px 100px, 100px 100px, 50px 50px, 50px 50px;
    background-color: #d94164;
    margin: 0;
    width: 100%;
    height: 100vh;
    font-family: 'Nunito', sans-serif;
}

/* Container utama */
.container {
    width: 50rem;
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: 10px;
    padding: 20px;
}

/* Form styling */
form {
    display: flex;
    flex-wrap: wrap;
    gap: 25px; /* Menambahkan jarak antar elemen */
    justify-content: center;
    padding-bottom: 10px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    border-radius: 5px;
    font-size: 14px;
    background: rgba(255, 255, 255, 0.2);
    color: white;
    outline: none;
    margin: 5px 0; /* Memberikan jarak atas-bawah untuk input */
}


.form-group input::placeholder {
    color: rgba(255, 255, 255, 0.7);
}

button {
    background-color: #ff0050;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.3s;
}

button:hover {
    background-color: #810029;
}

/* Table styling */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    overflow: hidden;
}

th, td {
    padding: 10px;
    text-align: center;
    color: white;
}

th {
    background-color: #ff0050;
    color: white;
}

td a {
    text-decoration: none;
    color: white;
    background-color: #ff0050;
    padding: 5px 10px;
    border-radius: 5px;
    transition: 0.3s;
}

td a:hover {
    background-color: #810029;
}

h2 {
    color: white;
    text-align: center;
}

/* Responsif untuk layar kecil */
@media (max-width: 600px) {
    .container {
        width: 90%;
    }

    form {
        flex-direction: column;
    }

    .form-group input {
        width: 100%;
    }
}

        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-5">
                <h2>Form QR Code</h2>
                <form class="form-inline" action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                      <input type="text" class="form-control" name="name" placeholder="Masukkan Nama">
                    </div>
                    <div class="form-group mb-2 ml-1">
                        <input type="email" class="form-control" name="email" placeholder="Masukkan Email">
                      </div>
                      <div class="form-group mb-2 ml-1">
                        <input type="number" class="form-control" name="phone" placeholder="Masukkan Nomor Telephone">
                      </div>
                    <button type="submit" class="btn btn-primary ml-1 mb-2">Create</button>
                  </form>
                <h2>List QR Code</h2>
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">QR code</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($data as $data)
                     <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>
                            <a href="{{ route('generate',$data->id) }}" class="btn btn-primary">Generate</a>
                        </td>
                      </tr>
                     @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </body>
</html>