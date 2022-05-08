<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.css')
</head>

<body>


@include('admin.header')

@include('admin.sidebar')

<main id="main" class="main">

    @yield('content')

</main><!-- End #main -->




@include('admin.script')

</body>

</html>