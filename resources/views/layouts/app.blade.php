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
        <nav class="navbar navbar-expand-md navbar-light sticky-top nav-bg shadow-sm">
            <div class="container">
                
                @hasrole('admin')
                    <a class="navbar-brand text-white fw-bolder" href="{{ route('dash') }}">
                    {{ __('DASKBOARD') }}
                    </a>
                @else
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                @endhasrole
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active fw-bolder text-success" aria-current="page" href="{{ route('home') }}">Home</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="#"
                                data-bs-toggle="modal" data-bs-target="#menuModal">Menu</a>
                        </li> -->
                        @auth
                            <!-- <li>
                                <a class="nav-link " 
                                href="{{ route('f.menu') }}">Menu</a>
                            </li> -->
                            <li>
                            <a class="nav-link order-menu" href="{{ route('order') }}"
                            >Order</a>
                            </li>
                        @endauth
                        
                    </ul>
                    <!-- <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->


                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    function selectTable(id){
        var url = window.location.href;
        
        const data = { 
            "_token": "{{ csrf_token() }}",
            "id": id };
            
        fetch('/tables/select', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(data),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data)
            if(data.status == 201){
                const token = data.token
                const rId = data.data.desk_id
                const previus = data.previus
                if(previus != undefined ){
                    document.getElementById("table"+previus).style.border='1px solid #D2D2D2'
                    document.getElementById("subtitle"+previus).innerHTML="Avaliable"
                    document.getElementById("subtitle"+previus).classList.remove("text-muted")

                    // Remove the Remove Button
                    const tableBody = document.getElementById("tableBody"+previus);
                    tableBody.removeChild(tableBody.lastElementChild);

                    // Add Remove Element to tableBody
                    const node = document.createElement("a")
                    const textnode = document.createTextNode("Select")
                    node.appendChild(textnode)
                    node.classList.add("btn", "btn-sm", "btn-primary", "choose-table", "position-absolute",
                    "bottom-0", "end-0")

                    node.setAttribute("onclick", `selectTable(${previus})`)
                    node.setAttribute("id", `${previus}`)
                    node.setAttribute("style", "border-radius: 0 0 4px")

                    document.getElementById("tableBody"+previus).appendChild(node)
                }



                // document.getElementById(rId).classList.add("disabled")
                document.getElementById("table"+rId).style.border='1px solid red'
                document.getElementById("subtitle"+rId).innerHTML="Selected"
                document.getElementById("subtitle"+rId).classList.add("text-muted")
                // document.getElementById('subtitle'+1)innerHTML='Not Avaliable';
                // document.getElementById(`subtitle${id}`).style.color='red';
                
                 // Swatch tableBody's select Element
                const tableBody = document.getElementById("tableBody"+rId);
                tableBody.removeChild(tableBody.lastElementChild);
                

                // Add Remove Element to tableBody
                const node = document.createElement("a")
                const textnode = document.createTextNode("Menu")
                node.appendChild(textnode)
                node.classList.add("btn", "btn-sm", "btn-danger", "choose-table", "position-absolute",
                "top-50", "start-50", "translate-middle")
                // node.setAttribute("id" "d")
                // node.setAttribute("id" "shit")
                node.setAttribute("onclick", `removeTable(${rId})`)
                node.setAttribute("href", `{{ route('f.menu') }}`)
                node.setAttribute("id", `${rId}`)
                // node.classList.add("btn btn-primary choose-table btn-sm position-absolute bottom-0 end-0")
                // const textnode = document.createTextNode("Remove");
                // node.appendChild(textnode);
                document.getElementById("tableBody"+rId).appendChild(node)
                // document.getElementById("swatchBox"+rId).innterHTML=nodeA

            }
        })
        .catch((error) => {
            console.error('Error:', error);
        });

    }


    function showSelect(id){
        document.getElementById(`${id}`).style.display='block';
    }

    function hideSelect(id){
        document.getElementById(`${id}`).style.display='none';
    }

    function showMenuSelect(id){
        document.getElementById(`m${id}`).style.display='block';
    }

    function hideMenuSelect(id){
        document.getElementById(`m${id}`).style.display='none';
    }
    
    function orderPost(data){
        // data._token = "{{ csrf_token() }}";
        const fData = { 
            "_token": "{{ csrf_token() }}",
            "data": JSON.stringify(data) };
            
        fetch('/menus/order', {
        method: 'POST', // or 'PUT'
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
        },
        body: JSON.stringify(fData),
        })
        .then((response) => response.json())
        .then((data) => {
            console.log('Success:', data)
            console.log(data.data)
            if(data.status == 201){
                document.getElementById('order').classList.add("disabled")
            }
            // document.getElementById('order').classList.add("disabled")
        })
        .catch((error) => {
            console.error('Error:', error);
        });
    }

    // function removeTable(id){
    //     console.log(id)
    //     // document.getElementById(id).style.display='none';
    // }


</script>
</body>
</html>
