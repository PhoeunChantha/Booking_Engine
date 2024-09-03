@include('frontends.layouts.header')

<!-- Begin page -->
<div id="layout-wrapper">

    <div class="main-content">
        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>
@include('frontends.layouts.footer')
