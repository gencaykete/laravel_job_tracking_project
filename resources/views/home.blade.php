<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>İstanbul Yazılım | Proje Takip Sistemi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="icon" href="/assets/media/logo.svg">
    @include('global.auth-css')
</head>
<body class="tr-collage">

<style>
    a {
        text-decoration: none !important;
    }

    .box {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 150px;
        background-color: #c32328;
        font-weight: bold;
        color: #fff;
        font-size: 18px;
        border-radius: 10px;
    }
</style>

<div class="container">
    <div class="row justify-content-center align-items-center flex-column" style="margin: 40px 0; ">

        <div class="row justify-content-center" style="width: 100%;">
            <div class="col-12 text-center mb-4 logo">
                <img src="/backend/assets/media/logo.png" width="150" alt="">
            </div>
            <a href="{{route('admin.home')}}" class="col-md-3 col-6 p-2">
                <div class="box text-center">
                    Yönetici Girişi
                </div>
            </a>
            <a href="{{route('developer.home')}}" class="col-md-3 col-6 p-2">
                <div class="box text-center">
                    Yazılımcı Girişi
                </div>
            </a>
            <a href="{{route('customer.home')}}" class="col-md-3 col-6 p-2">
                <div class="box text-center">
                    Müşteri Girişi
                </div>
            </a>
        </div>

    </div>
</div>
<div style="position:absolute;right: 25px;bottom: 25px;">
    <a href="https://istanbulyazilim.net" target="_blank">
        <img src="/backend/assets/media/logo.png" style="width: 125px" alt="İstanbul Yazılım">
    </a>
</div>
</body>
</html>
