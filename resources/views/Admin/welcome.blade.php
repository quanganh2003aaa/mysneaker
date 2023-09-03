<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>My Sneaker - Admin</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    @include('Admin.layouts.css')
</head>

<body>
    @include('Admin.layouts.header')

    @include('Admin.layouts.sidebar')

    <main id="main" class="main">
        {{-- @include('Admin.layouts.breadcrumb') --}}

        <section class="section dashboard">
            @yield('contents')
        </section>
    </main>

    @include('Admin.layouts.footer')

    @include('Admin.layouts.js')

</body>

</html>
