@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-3 mb-5">
        <p class="h1">About Self-Made</p>
    </div>
    <div class="row">
        <div class="col-7">
            <img class="d-block" src="{{url('/images/big-2.jpg')}}" alt="Second slide">

        </div>
        <div class="col-5">
            <p class="h4">Our Journey</p>
            <p class="bike-desc">Jean shorts fanny pack celiac, church-key paleo yr artisan. Leggings poke YOLO gochujang VHS fanny pack, lyft mlkshk etsy vape af meh DIY. <br>Mumblecore knausgaard disrupt, scenester cred woke air plant pabst
                literally chillwave. Everyday carry live-edge helvetica, vinyl af pop-up poke lyft tbh 8-bit. Four loko next level scenester, XOXO distillery shabby chic intelligentsia cold-pressed chia cardigan helvetica hammock drinking vinegar.
                Put a bird on it cray selfies church-key man braid. Chambray shoreditch viral swag gentrify.

            </p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-7">
            <p class="h4">Our Furure</p>
            <p class="bike-desc">I'm baby biodiesel bespoke edison bulb woke deep v plaid, helvetica squid kickstarter wolf fam af pour-over knausgaard. Leggings helvetica pinteres. <br> enamel pin artisan chicharrones selfies whatever shaman 3 wolf
                moon. Lo-fi locavore portland bitters unicorn yuccie la croix cardigan retro ethical biodiesel woke poutine everyday carry try-hard. Pour-over typewriter retro, post-ironic everyday carry celiac single-origin coffee mixtape cloud
                bread heirloom hell of coloring book activated charcoal woke 90's. Viral schlitz typewriter, organic meh normcore tbh pour-over occupy.</p>
        </div>
        <div class="col-5">
            <img class="d-block" src="{{url('/images/big-1.jpg')}}" alt="Second slide">
        </div>
    </div>
    <div class="row">
        <div class="col-7 mb-4">
            <img class="d-block" src="{{url('/images/big-3.jpg')}}" alt="Second slide">

        </div>
        <div class="col-5 mt-3">
            <p class="h4">How Can YOU help?</p>
            <p class="bike-desc">Tofu waistcoat lyft subway tile, microdosing taiyaki woke brunch single-origin coffee irony hell of hella ramps poke. Taiyaki hot chicken listicle pork belly green juice occupy pabst godard migas neutra actually
                schlitz. Knausgaard post-ironic hot chicken, bespoke meggings paleo brooklyn leggings crucifix kinfolk copper mug vice +1. Artisan pork belly sustainable irony. Hella freegan post-ironic prism banh mi heirloom tattooed jianbing pabst
                palo santo.Copper mug cold-pressed vegan migas, tacos meggings taiyaki sriracha normcore fixie mlkshk stumptown. Brunch wayfarers iceland heirloom, meggings taiyaki post-ironic. <br>Raw denim chicharrones viral man bun small batch.
                Tumeric glossier quinoa venmo, vice paleo banjo authentic 90's put a bird on it flexitarian brooklyn intelligentsia tacos meh.



            </p>
        </div>
    </div>

</div>
<div class="container mt-5">
    <div class="row grid-of-imgs">


        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/home-4.jpg')}}">
            <div class="details col-8">
                <h1 class="h4">We are here for you.</h1>
                <p> We will hwlp you get the best results for your startup.</p>
            </div>

        </div>

        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/home-3.jpg')}}">
            <div class="details col-8">
                <h1 class="h4">Go Further.</h1>
                <p>Get ready to take on a course of life with start up companies.</p>
            </div>

        </div>
        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/car-1.png')}}">
            <div class="details col-8">
                <h1 class="h4">Stay In The Loop.</h1>
                <p>Sign up to our newsletter to be constantly updated with news and updats on our evergrowing platform! </p>
            </div>

        </div>
        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/car-3.png')}}">
            <div class="details col-8">
                <h1 class="h4">Go Further.</h1>
                <p>We will be able to help you find work within the startup industry and get you sarted with your professional career.</p>
            </div>

        </div>
        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/home-1.jpg')}}">
            <div class="details col-8">
                <h1 class="h4">365.</h1>
                <p>The team are continuing to roll out new updates all year round.</p>
            </div>

        </div>

        <div class="frame col-6 ">
            <img class="column zoomOut grid grid-img" src="{{url('/images/home-2.jpg')}}">
            <div class="details col-8">
                <h1 class="h4">Mobile.</h1>
                <p>Check out our mobile app available on android!</p>
            </div>

        </div>


    </div>
</div>



<style>
    /* Craeted refering to LittleSnippets.net Pen: https://codepen.io/littlesnippets/pen/adLELd */
    .frame {
        text-align: center;
        position: relative;
        cursor: pointer;
        padding: 0px !important;
    }



    .frame .details {
        position: absolute;
        content: "";
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%) rotateY(90deg);
        transform-origin: 50%;
        background: black;
        opacity: 0;
        transition: all 0.4s ease-in;
        color: white !important;

    }

    .frame:hover .details {
        transform: translate(-50%, -50%) rotateY(0deg);
        opacity: 1;
        color: white !important;


    }

    /*Zoom Out*/
    .zoomOut img {
        -webkit-transition: .3s ease-in-out;
        transition: .3s ease-in-out;
    }

    .zoomOut:hover img {
        -webkit-transform: scale(0.99);
        transform: scale(0.99);
    }

    .grid-img {
        width: 100%;
        height: 100%;
    }

    .grid-of-imgs {
        margin-bottom: 70px;
    }

    .grid-bg {
        background-color: black;
    }

    .grid {
        margin-top: 0px;
        padding: 0px !important;

    }
</style>
@include('layouts.footer')
@endsection
