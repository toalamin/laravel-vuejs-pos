<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pos Inventory Software | Login</title>
    @include('partial.css')
</head>

<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div id="app">
        <div class="wrapper "
            v-show="$route.path === '/' || $route.path === '/register' || $route.path ==='/forget' ? false : true ">

            <!-- Navbar -->

            @include('partial.topbar')
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            @include('partial.leftbar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <br>
                <section class="content">
                    <div class="container-fluid">
                        <router-view></router-view>
                    </div><!-- /.container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            @include('partial.footer')
            <!-- /.control-sidebar -->
        </div>

        <div class="hold-transition login-page"
            v-show="$route.path === '/' || $route.path === '/register' || $route.path ==='/forget' ? true : false ">
            <router-view></router-view>
        </div>

    </div>
    <!-- ./wrapper -->


    @include('partial.js')

    <!-- jQuery -->

</body>

</html>