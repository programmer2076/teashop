<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/css/tea.css', 'resources/js/app.js', 'resources/js/tea.js'])
</head>
<body class="bg-white">
    <div id="app">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    
                    <h1>{{ $title }}</h1>

                    <p>{{ $theDate }}</p>

                    <table class="table table-responsive">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataLists as $data)
                            <tr>
                                <th scope="row">{{ $data['id'] }}</th>
                                <td>{{ $data['item'] }}</td>
                                <td>{{ $data['price'] / 100 }}</td>
                                <td>{{ $data['date']->format("Y-m-d") }}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>Total Amount - </td>
                                <td>{{ total }}</td>
                                
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
