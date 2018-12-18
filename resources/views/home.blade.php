<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Medisoft Assessment</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style type="text/css">
    body
    {
        background-color: #FFF;
    }
    .center-div
    {
        position: absolute;
        margin: auto;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 200px;
        height: 200px;
        background-color: #FFF;
        border-radius: 3px;
        text-align: center;
    }
</style>
<body>


<div class="center-div">
    <a href="/poker" class="btn btn-primary btn-block ">Cards</a>
    <BR>
    <a href="/phrase" class="btn btn-primary btn-block ">Phrase</a>
</div>

</body>
</html>
