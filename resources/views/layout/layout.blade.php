<!DOCTYPE html>
<html lang="pt">
<x-top title={{$title}} styles="{{$styles ?? ''}}" />

<body>
    <x-header name={{$name[0]}} />
    @yield('content')
    <x-footer />
    @livewireScripts
</body>

</html>
