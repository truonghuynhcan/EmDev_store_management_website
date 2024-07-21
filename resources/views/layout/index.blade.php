<!DOCTYPE html>
<html lang="vn" data-bs-theme="">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | EmDev</title>
        <link rel="shortcut icon" href="{{ asset('images/logo.png') }}" type="image/x-icon">

        <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css">
    </head>

    <body ng-app="myApp" ng-controller="mainCtrl">
        @auth
            @include('layout.header')
        @endauth
        @yield('body')
        @auth
            <footer class="bg-black text-white text-center p-3">
                <p>© EmDev - Always Accompany And Support You</p>

            </footer>
        @endauth

        <!-- JS -->
        <script src="{{ asset('') }}js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}js/angular.min.js"></script>
        <script>
            var app = angular.module('myApp', []);
            app.controller('mainCtrl', function($scope, $http) {});
            var viewFunction = function($scope) {};
        </script>
        @yield('viewFunction')
        <script>
            app.controller('viewCtrl', viewFunction);
        </script>
    </body>

</html>
