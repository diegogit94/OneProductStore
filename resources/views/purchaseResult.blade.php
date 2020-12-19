@extends('layouts.app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OPS</title>

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
<body>
@section('content')
    <div class="flex-center position-ref">
        <div class="card" style="width: 18rem;">
            <div class="card-header flex-center">
                <h2>Purchase details</h2>
{{--                <h2>{{ $requestInformation['request']['payment']['description'] }}</h2>--}}
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Status:</strong> {{ $requestInformation['status']['status'] }}</li>
                <li class="list-group-item"><strong>Product:</strong> {{ $requestInformation['request']['payment']['description'] }}</li>
                <li class="list-group-item"><strong>Reference:</strong> {{ $requestInformation['request']['payment']['reference'] }}</li>
                <li class="list-group-item"><strong>Total:</strong> {{ formatPrice($requestInformation['request']['payment']['amount']['total']) }}</li>
            </ul>
        </div>
    </div>
@endsection
</body>
</html>
