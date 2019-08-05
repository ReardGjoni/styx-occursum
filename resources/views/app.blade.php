<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-indigo.min.css" />
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <title>{{ config('app.name', 'Styx Occursum') }}</title>
    <script src="/js/app.js" defer></script>
    <style>
        #app {
            display: flex;
            height: 100vh;
        }
    </style>
</head>

<body>
    <div id="app"/>
</body>

</html>