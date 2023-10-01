<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>chance dashboard</title>
    @include('Dashboard.include.Head_Dashboard')
</head>

<body>
    @include('Dashboard.include.loader')
    <section id="content" class="wrapper">
        @include('Dashboard.include.Sidebar_Dashboard')
        <section id="content-dashboard" style="overflow:auto;">
            @include('Dashboard.include.Top_Tavbar_Dashboard')
            <div style='overflow:auto;'>
                @yield('content')
            </div>
        </section>
    </section>
    @include('Dashboard.include.Script_Dashboard')
</body>

</html>
