<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=yes">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&family=Open+Sans:ital@0;1&family=Oswald:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('temp/style.css')}}" />
    @if(isset($styles))
    <link rel="stylesheet" href="{{asset('temp/'.$styles.'.css')}}" />
    <script src="{{asset('temp/js/scripts.js')}}" defer></script>
    @endif
    <title>{{$title ?? ''}}</title>
</head>
