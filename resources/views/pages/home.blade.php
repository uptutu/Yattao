@extends('layouts.app')

@section('content')
    <div class="main-wrapper text-center">
    <div class="banner">
        <div class="inner">
            <h1 class="hvr-grow">YATTAO KUNG</h1>
            <p class="sub-heading">THERE IS A DIFFERENCE BETWEEN KNOWING THE PATH , AND WALKING THE PATH.</p>
            {{--<button class="btn btn-primary btn-lg ">--}}
                <a href="{{ route('msgs.index') }}" class="btn btn-primary btn-lg hvr-ripple-out">PLS TELL ME SOMETHING I DON'T KNOW</a>
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
        <hr >
        <h3 class="pt-5 pb-5">IF YOU DON'T RUN YOUR OWN LIFE , SOMEBODY ELSE WILL.</h3>


        <!-- START THE FEATURETTES -->

        <hr class="featurette-divider">
    </div>

        <section class=" bg-dark">
            <div class="container">

                <div class="row featurette mt-3">
                    <div class="col-md-7">
                        <h2 class="featurette-heading">其实我的内心是拒绝的 <br><span class="text-muted">我的梦想是诗和远方，还有倾国倾城的你。</span></h2>
                        <p class="lead">You may be disappointed if you fail , but you are doomed if you don't try.</p>
                    </div>
                    <div class="col-md-5 hvr-bubble-left1">
                        <img class="featurette-image img-fluid mx-auto mt-5 " data-src="holder.js/500x500/auto" src="{{ asset('img/pic04.jpg') }}" alt="Generic placeholder image">
                    </div>
                </div>

          <hr class="featurette-divider">

                <div class="row featurette">
                    <div class="col-md-5 order-md-2">
                        <h2 class="featurette-heading">外面的雨下得很大<br><span class="text-muted">应该有人为你打伞。</span></h2>
                        <p class="lead">There is no force on the more powerful than the will to love.</p>
                 </div>
            <div class="col-md-7 order-md-1 hvr-bubble-right">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto"  src="{{ asset('img/pic02.jpg') }}" alt="Generic placeholder image">
            </div>
        </div>

        <hr class="featurette-divider">

        <div class="row featurette">
            <div class="col-md-7">
                <h2 class="featurette-heading">我有七十二般神通 <br><span class="text-muted">为你遮风挡雨降妖除魔好吗？</span></h2>
                <p class="lead">When I say , I will never let you down , and I have a lifetime ahead to prove that.</p>
            </div>
            <div class="col-md-5  hvr-bubble-left2">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" src="{{ asset('img/pic06.jpg') }}" alt="Generic placeholder image">
            </div>
        </div>

        {{--<hr class="featurette-divider">--}}

            </div>
        <!-- /END THE FEATURETTES -->
        </section>
    </div><!-- /.container -->
@stop
