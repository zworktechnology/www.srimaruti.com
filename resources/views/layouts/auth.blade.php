<!doctype html>
<html lang="en">

<head>
    @include('components.app.header')
    <style>
        .select2-container {
            width: 100% !important;
        }
        .responsive_cls tr {
            display: block;
        }
        .responsive_cls tr td {
            display: inline-block;
        }
        .capture_div {
            display: flex;
        }
        @media (max-width: 767px) {
            .capture_div {
                flex-wrap: wrap;
            }
        }
        @media (max-width: 500px) {
            .capture_div #my_camera {
                width: 500px !important;
            }
        }
    </style>
</head>

<body>
    <section>
        <div id="layout-wrapper">

            <div id="topbar">
                @include('components.app.topbar')
            </div>

            <div id="leftbar">
                @include('components.app.leftbar')
            </div>

            <div id="content">
                @yield('content')
            </div>

            <div id="footer">
                @include('components.app.footer')
            </div>

            <div id="rightbar">
                @include('components.app.rightbar')
            </div>
        </div>
    </section>
</body>

<div id="script">
    @include('components.app.script')
</div>

</html>
