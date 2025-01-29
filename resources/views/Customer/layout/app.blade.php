@include('Customer.layout.head')
<body>
    <div id="app">
        <div class="main-wrapper">
        @include('Customer.layout.nav')
        @include('Customer.layout.sidebar')
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>@yield('title-content')</h1>
                        <div class="ml-auto">
                            @yield('right_top_button')
                        </div>
                    </div>
                    @yield('body')
            </section>
            </div>
        </div>
    </div>
    @include('Customer.layout.footer')
    @if($errors->any("$errors"))
    @foreach ($errors->all() as $error)
        <script>
            iziToast.error({
                title: '',
                position: 'topRight',
                message: '{{ $error }}',
            });
        </script>
    @endforeach
    @endif
    @if(session()->get('success'))
    <script>
        iziToast.success({
            title: '',
            position: 'topRight',
            message:  '{{ session()->get('success') }}',
        });
        </script>
    @endif
</body>
</html>