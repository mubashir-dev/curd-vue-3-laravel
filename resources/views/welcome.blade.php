<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel Vue Curd</title>
        {{-- CSS --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div class="container-fluid mt-4">
            <div class="row">
                    <div class="col-md-12" id="app">
                        <b><h4 class="text-center font-weight-bold">Vue 3 Laravel Curd</h4></b>
                        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                            <div class="collapse navbar-collapse">
                                <div class="navbar-nav">
                                    <router-link to="/" class="nav-item nav-link">Home</router-link>
                                    <router-link to="/add" class="nav-item nav-link">Add Todo</router-link>
                                    <router-link to="/add" class="nav-item nav-link">Completed</router-link>
                                </div>
                            </div>
                        </nav>
                        <br/>
                        <router-view></router-view>
                    </div>
                </div>
        </div>
    {{-- Javascript --}}
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
