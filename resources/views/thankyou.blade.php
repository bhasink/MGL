@extends('layout.app')

@section('content')

    <style>
        .divs-subs {
            background: #1f232e5e;
            margin-top: 5em;
            background-radius:4px;
        }
    </style>

    <header>

        <div class="">
            <div class="row" style="justify-content: flex-end;">
                <div class="col-md-5 banner-img-box">

                    <div class="divs-subs">
                        @if (session('msg'))

                            <script>
                                window.open('https://battlefy.com/mgl/microgravity-gaming-league-fifa-21-1/60825c104fb3931a6fa9ce48/info', '_blank');
                            </script>


                            <div class="alert alert-success" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('msg') }}
                            </div>


                            <a href="https://battlefy.com/mgl/microgravity-gaming-league-fifa-21-1/60825c104fb3931a6fa9ce48/info" class="btn register-btn">Join Tournament</a>
                        




                        @elseif(session('failed'))
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                {{ session('failed') }}
                            </div>
                        @endif
                    </div>

                </div>

            </div>
        </div>

        </div>
    </header>

@endsection


@section('script')
    <script>
        fbq('track', 'CompleteRegistration');
    </script>



@endsection

@section('scriptk')

    <!-- Event snippet for SW | MG | Submit lead form conversion page -->
    <script>
        gtag('event', 'conversion', {'send_to': 'AW-399051010/6SJ2CP3xqv4BEIKSpL4B'});
    </script>


@endsection