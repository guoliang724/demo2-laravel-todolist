<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @yield("style")
</head>

<body>
    <H1>@yield("title")</H1>
    <div>
        @if(session()->has('sucess'))
            <div>{{session('sucess')}}</div>
        @endif
        @yield("content")
    </div>
</body>

</html>