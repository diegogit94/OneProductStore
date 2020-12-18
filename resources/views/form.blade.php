@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body class="text-center">
@section('content')
    <div class="flex-center position-ref">
            <div class="container col-5 p-2 bg-light border">
                <form method="POST" action="#" class="row g-3">
                    <h2>Billing Details</h2>
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" value="{{ auth()->user()->name }}">
                    </div>

                    <div class="col-md-6">
                        <label for="surname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="surname" value="{{ auth()->user()->surname }}">
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ auth()->user()->email }}">
                    </div>

                    <div class="col-md-6">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" value="{{ auth()->user()->address }}">
                    </div>

                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="{{ auth()->user()->city }}">
                    </div>

                    <div class="col-md-6">
                        <label for="province" class="form-label">Province</label>
                        <input type="text" class="form-control" id="province" value="{{ auth()->user()->province }}">
                    </div>

                    <div class="col-md-6">
                        <label for="postal-code" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postal-code" value="{{ auth()->user()->postal_code }}">
                    </div>

                    <div class="col-md-6">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="tel" class="form-control" id="mobile" value="{{ auth()->user()->mobile }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="document-type">Document Type</label>
                        <select  name="document-type" class="form-control" id="document-type" required>
                            @if( auth()->user()->document_type === 'CC')
                                <option value="">...</option>
                                <option value="CC" selected>C.C</option>
                            @else
                            <option value="" selected>...</option>
                            <option value="{{ old(auth()->user()->document_type, 'document-type') }}" >C.C</option>
                            @endif
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="document-number" class="form-label">Document number</label>
                        <input type="text" class="form-control" id="document-number" value="{{ auth()->user()->document }}">
                    </div>

                    <div class="col-12">
                        <button type="submit" class="w-100 btn btn-primary">Pay</button>
                    </div>
                </form>
            </div>
    </div>
    @endsection
</body>
</html>
