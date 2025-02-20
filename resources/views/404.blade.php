@extends('layout.user.base')
@section('title') Hello @endsection

@section('content')
<div class="center-area d_flexn_nowrap">
        <div class="container">
            <img src="https://steadyincome.in/assets/front/images/404.png" alt="" title="">
            <h2>Page Not Found</h2>
                            <!-- <h5></h5> -->
                <h5>Sorry, it appears the page you were looking for doesn't exist anymore or might have been moved.</h5>
                        <a class="apply_CTA" href="{{url('')}}">GO TO HOME</a>
        </div>
    </div>

    <style>
       /*404 page , maintenance, 500 page*/
    .center-area{text-align: center;height: 100vh;padding: 20px 0;}
    .center-area h2{color: var(--primary_color);padding: 40px 0 20px;}
    .center-area h5{color: var(--primary_color);font-size: 500; font-family: var(--font_family_mulish);}

    .center-area2{text-align: center;height: 100vh;padding: 20px 0;}
    .center-area2 .container{max-width: 700px;}
    .center-area2 .vendor_des p{color: var(--primary_color);font-size: 500; font-family: var(--font_family_mulish);margin-bottom: 0;margin-top: 20px;}
    .center-area2 .vendor_des a{color: var(--secondary_color);font-weight: 500;}
    .center-area2 p.center_per{color: var(--blue_color);}
    .center-area2 img{max-width: 200px;}
    </style>
@endsection

