<!doctype html>
<html lang="en">

<head>
    @include('components.app.header')
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
