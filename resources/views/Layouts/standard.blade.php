@include('.ComplementsLayout/head')
<body>

    <header>
        @include('.ComplementsLayout/header')
    </header>

    <div id="app">
        <main>
            @yield('content')
        </main>  
    </div>

    <footer>
        @include('.ComplementsLayout/footer')
    </footer>

</body>
</html>