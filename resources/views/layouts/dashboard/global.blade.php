<!DOCTYPE html>
<html lang="en">
<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
<head>

    <title>@yield('title')</title>

    @include('layouts.dashboard.Partial.head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @if(in_array("ADMIN", json_decode(Auth::user()->roles)))
            @include('layouts.dashboard.Partial.sidebar')
        {{-- @elseif(in_array("MEMBER", json_decode(Auth::user()->roles)))
            @include('layouts.dashboard.Partial.member.sidebarmember')
        @elseif(in_array("FOLLOWER", json_decode(Auth::user()->roles)))
            @include('layouts.dashboard.Partial.follower.sidebarfollower')
        @elseif(in_array("AUTHOR", json_decode(Auth::user()->roles)))
            @include('layouts.dashboard.Partial.author.sidebarauthor') --}}
        @endif
           
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('layouts.dashboard.Partial.topbar')

                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('layouts.dashboard.Partial.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    

    <!-- Logout Modal-->
    @include('layouts.dashboard.Partial.logoutmodal')

    @include('layouts.dashboard.Partial.script')

</body>

</html>