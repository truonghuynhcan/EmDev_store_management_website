<!DOCTYPE html>
<html lang="vn" data-bs-theme="dark">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') | EmDev</title>

        <link rel="stylesheet" href="{{ asset('') }}css/bootstrap.css">
    </head>

    <body ng-app="myApp" ng-controller="mainCtrl">
        @include('layout.header')
        @yield('body')

        <!-- JS -->
        <script src="{{ asset('') }}js/bootstrap.min.js"></script>
        <script src="{{ asset('') }}js/angular.min.js"></script>
        <script>
            var app = angular.module('myApp', []);
            app.controller('mainCtrl', function($scope, $http) {});
            var viewFunction = function($scope) {};
        </script>
        @yield('viewFunction');
        <script>
            app.controller('viewCtrl', viewFunction);   
        </script>
    </body>

</html>
