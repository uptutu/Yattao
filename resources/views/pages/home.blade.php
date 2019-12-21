@extends('layouts.app')
@section('styles')
    <style>
        /*.quote {*/
        /*    display: flex;*/
        /*    flex-direction: row;*/
        /*    justify-content: center;*/
        /*    align-items: center;*/
        /*    min-height: 100vh;*/
        /*    font-family: 'Zilla Slab', serif;*/
        /*    font-size: 2em;*/
        /*    background: #efefef;*/
        /*    letter-spacing: -1px;*/
        /*}*/

        @import url("https://fonts.googleapis.com/css?family=Sue+Ellen+Francisco");

        quote::before {
            content: "\201C";
        }

        quote::after {
            content: "\201D";
        }

        .quote {
            margin-top: -5rem !important;
        }

        ins {
            font-family: 'Zilla Slab Highlight', cursive;
            color: rgba(132, 175, 155, 0.75);
            cursor: help;
            position: relative;
        }

        ins::before {
            content: "(correction)";
            display: block;
            pointer-events: none;
            position: absolute;
            font-family: 'Zilla Slab', serif;
            color: #659b82;
            font-size: 0.5em;
            transition: all 500ms ease;
            top: -2em;
            left: 0;
            opacity: 0;
        }

        ins:hover del {
            max-width: 9em;
        }

        ins:hover::before {
            opacity: 1;
            top: -1.2em;
        }

        ins del {
            color: rgba(255, 107, 107, 0.75);
            text-decoration: none;
            display: inline-block;
            vertical-align: bottom;
            overflow: hidden;
            transition: all 500ms ease;
            max-width: 0;
        }

        ins del::before {
            content: "\00a0";
            visibility: hidden;
        }

        hr.custom-hr {
            margin: 5.5em 0;
            text-align: center;
            border: none;
        }

        hr.custom-hr:before {
            content: '';
            display: inline-block;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #eee;
            margin: 0 0.4em;
        }

        hr.custom-hr:after {
            content: '';
            display: inline-block;
            width: 14px;
            height: 14px;
            border-radius: 50%;
            background: #eee;
            margin: 0 0.4em;
        }


        figure {
            font-family: 'Sue Ellen Francisco', serif;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border-radius: 0.125rem;
            -webkit-transform: translateY(0);
            transform: translateY(0);
            transition: box-shadow 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), box-shadow 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), box-shadow 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        figure:after {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            margin: auto;
            width: 100%;
            height: 100%;
            background-color: rgba(9, 4, 4, 0.8);
            opacity: 0;
            transition: opacity 0.6s ease;
        }

        figure:nth-child(2), figure:nth-child(4), figure:nth-child(7) {
            grid-row: span 2;
        }

        figure img {
            width: 100%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            transition: -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        figure figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            padding: 1.5rem 2.25rem 1.5rem 1.125rem;
            width: 100%;
            color: white;
            font-size: 1.5rem;
            line-height: 1.2;
            letter-spacing: 0.03125rem;
            z-index: 1;
            opacity: 0;
            -webkit-transform: translateY(-12px) rotate(-3deg);
            transform: translateY(-12px) rotate(-3deg);
            transition: opacity 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: opacity 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
            transition: opacity 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1), -webkit-transform 0.6s cubic-bezier(0.645, 0.045, 0.355, 1);
        }

        figure:hover {
            -webkit-transform: translateY(-6px);
            transform: translateY(-6px);
            box-shadow: rgba(0, 0, 0, 0.5) 0 12px 24px -12px;
        }

        figure:hover:after {
            opacity: 1;
        }

        figure:hover img {
            -webkit-transform: scale(1.05);
            transform: scale(1.05);
        }

        figure:hover figcaption {
            opacity: 1;
            -webkit-transform: translateY(0) rotate(-3deg);
            transform: translateY(0) rotate(-3deg);
        }


    </style>
@stop
@section('content')
    <div class="main-wrapper text-center">
        <div class="banner">
            <div class="inner">
                <h1 class="hvr-grow">YATTAO KUNG</h1>
                <p class="sub-heading">THERE IS A DIFFERENCE BETWEEN KNOWING THE PATH , AND WALKING THE PATH.</p>
                {{--<button class="btn btn-primary btn-lg ">--}}
                <a href="{{ route('msgs.index') }}" class="btn btn-primary btn-lg hvr-ripple-out">PLS TELL ME SOMETHING
                    I DON'T KNOW</a>
                {{--</button>--}}
                <h1>我所理解的生活就是和喜欢的一切在一起</h1>
            </div>
        </div>

        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <div class="container marketing">

            <!-- Three columns of text below the carousel -->
            <div class="row">
                <div class="col-lg-4 hvr-wobble-skew ">
                    {{--<img class="rounded-circle" src="/img/php.png" alt="Generic placeholder image" width="140" height="140">--}}
                    <i class="fa fa-book fa-5x "></i>
                    <h2 class="pt-5 ">看 书</h2>
                    <p></p>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 hvr-wobble-skew ">
                    <i class="fa fa-code fa-5x"></i>
                    <h2 class="pt-5">代 码</h2>
                </div><!-- /.col-lg-4 -->
                <div class="col-lg-4 hvr-wobble-skew">
                    <i class="fa fa-music fa-5x"></i>
                    <h2 class="pt-5">音 乐</h2>
                </div><!-- /.col-lg-4 -->
            </div><!-- /.row -->
            <hr>
            <h3 class="pt-5 pb-5">IF YOU DON'T RUN YOUR OWN LIFE , SOMEBODY ELSE WILL.</h3>


            <!-- START THE FEATURETTES -->

            <hr class="featurette-divider">
        </div>

        <section class=" bg-dark">
            <div class="container">

                <div class="row featurette quote">
                    <div class="col-md-auto">
                        <h2 class="featurette-heading">
                            <quote>A little
                                <ins>learning<del>knowledge</del></ins>  is a dangerous thing.
                            </quote>
                        </h2>
                    </div>
                </div>

                <hr class="custom-hr">

                <div class="row featurette mt-3">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">其实我的内心是拒绝的 <br><span
                                    class="text-muted">我的梦想是诗和远方，还有倾国倾城的你。</span></h2>
                        <p class="lead">Actually, my heart is rejected.
                            My dream is poetry and far away, and you in the city of the country
                        </p>
                    </div>
                    <div class="col-md-5 hvr-bubble-left1">
                        <figure>
                            <img class="featurette-image img-fluid mx-auto " data-src="holder.js/500x500/auto"
                                 src="{{ asset('img/pic04.jpg') }}" alt="Generic placeholder image">
                            <figcaption>I see what u saw.</figcaption>
                        </figure>
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-5 order-md-2">
                        <h2 class="featurette-heading">外面的雨下得很大<br><span class="text-muted">应该有人为你打伞。</span></h2>
                        <p class="lead">It's raining heavily outside.
                            Someone should be umbrellaing for you.
                        </p>
                    </div>
                    <div class="col-md-7 order-md-1 hvr-bubble-right">
                        <figure>
                            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto"
                                 src="{{ asset('img/pic02.jpg') }}" alt="Generic placeholder image">
                            <figcaption>Are you still afraid of the rain?</figcaption>
                        </figure>
                    </div>
                </div>

                <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">我有七十二般神通 <br><span class="text-muted">为你遮风挡雨降妖除魔好吗？</span></h2>
                        <p class="lead">I have seventy-two gods.
                            Will you get rid of the demons from the rain for you?
                        </p>
                    </div>
                    <div class="col-md-5  hvr-bubble-left2">
                        <figure>
                            <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto"
                                 src="{{ asset('img/pic06.jpg') }}" alt="Generic placeholder image">
                            <figcaption>You go forward, I will always be behind you.</figcaption>
                        </figure>
                    </div>
                </div>

                {{--<hr class="featurette-divider">--}}

            </div>
            <!-- /END THE FEATURETTES -->
        </section>
    </div><!-- /.container -->
@stop


@section("scripts")
    <script>
        let i = 0;
        function change() {
            setTimeout(f, 10000)
        }
        function f() {
                $(".main-wrapper").css("background", "#444 url(../img/banner1.jpg)")
            setTimeout(f1, 10000)
        }

        function mainPic() {
            $(".main-wrapper").css("background", "#444 url(../img/banner.jpg)")
            change()
        }

        function f1() {
            $(".main-wrapper").css("background", "#444 url(../img/banner2.jpg)")
            mainPic()
        }
        change()

    </script>
    @stop