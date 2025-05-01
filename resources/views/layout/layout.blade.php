<!DOCTYPE html>
<html lang="pt">

<x-top title={{$title}} styles="{{$styles ?? ''}}" />

<body>
    <x-header name={{$name[0]}} />
    <main>
        @yield('content')
    </main>
    <x-footer />
</body>

</html>
