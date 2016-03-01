<!DOCTYPE html>
<html lang="pt-br">
    @include('includes.head')
    <body>
        <div id="wrapper">
            @include('includes.navbar')
            <div id="page-wrapper">
                @yield('content')
            </div>
        </div>
    @include('includes.footer')
    @yield('scripts')
    </body>
</html>