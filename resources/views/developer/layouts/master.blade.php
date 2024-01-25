<!DOCTYPE html>
<html lang="tr">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <title>@yield('title','İstanbul Yazılım | Proje Takip Sistemi')</title>
    <meta charset="utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta property="og:locale" content="en_US"/>
    <meta property="og:type" content="article"/>
    <meta property="og:title" content="İstanbul Yazılım | Proje Takip Sistemi"/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta name="authod" content="Gencay KETE">
    <link rel="icon" href="/backend/assets/media/favicon.png">
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    @include('developer.layouts.styles')
    @yield('page-styles')
    @include('global.styles')
</head>


<body id="kt_body" class="header-extended header-fixed header-tablet-and-mobile-fixed">
@include('global.loader')
@include('developer.layouts.header')
@yield('content')
@include('developer.layouts.footer')

<script>
    var hostUrl = "assets/index";
    let base_url = "{{rtrim(asset('/yonetim'),'/')}}";
    let csrf_token = "{{csrf_token()}}";
</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="/backend/assets/plugins/global/plugins.bundle.js"></script>
<script src="/backend/assets/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="/backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
<script src="/backend/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="/backend/assets/js/widgets.bundle.js"></script>
<script src="/backend/assets/js/custom/widgets.js"></script>
<script src="/backend/assets/js/custom/apps/chat/chat.js"></script>
<script src="/backend/assets/js/custom/intro.js"></script>
<script src="/backend/assets/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="/backend/assets/js/custom/utilities/modals/create-campaign.js"></script>
<script src="/backend/assets/js/custom/utilities/modals/create-app.js"></script>
<script src="/backend/assets/js/custom/utilities/modals/users-search.js"></script>
<script src="/backend/assets/js/custom/apps/projects/list/list.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="/backend/assets/js/custom/main.js?v={{time()}}"></script>

@yield('page-scripts')

@include('global.scripts')
<script src="/backend/assets/js/custom/apps/calendar/calendar.js"></script>

<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    @if(session('response'))
    Toast.fire({
        icon: '{{session('response.status')}}',
        title: '{{session('response.message')}}'
    })
    @endif
</script>

</body>


</html>
