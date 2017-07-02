<!DOCTYPE html>
<html lang="en">
<head>
  @include('backend.includes.head')
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">

<div class="page-header navbar navbar-fixed-top">
    <div class="page-header-inner ">
        <!-- BEGIN LOGO -->
        <div class="page-logo">
            <a href="#">
               <!-- <img src="" alt="logo" class="logo-default" /> </a>-->
                <h3 class="uppercase logo_backend">Backend</h3>
            <div class="menu-toggler sidebar-toggler">
                <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
        <!-- END RESPONSIVE MENU TOGGLER -->


        <!-- BEGIN PAGE TOP -->
        <div class="page-top">
           <div class="logout_backend">
               <a href="{{ url('/logout') }}">Déconnexion</a>
           </div>
        </div>
        <!-- END PAGE TOP -->
    </div>
</div>

<div class="clearfix"> </div>

<div class="page-container">
    @include('backend.includes.leftmenu')
    <div class="page-content-wrapper">
        <div class="page-content">
          @yield('content')
        </div>
    </div>

</div>
@include('backend.includes.scripts')
@if (session('success'))
    <script>
        toastr.success('{!! session('success') !!}', 'Success');
    </script>
    @elseif(session('warning'))
    <script>
        toastr.warning('{!! session('warning') !!}', 'warning');
    </script>
@endif


</body>

</html>