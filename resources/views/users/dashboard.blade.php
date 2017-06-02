@extends('layouts.app')

@section('title', 'Loyalty Tap')

@section('content')
    <div class="row">
        <div class="col-md-2" >
            <img src="images/fb-share.jpg" class="tmp-fb-share" data-toggle="modal" data-target="#share-modal" />
        </div>
        <div id="share-modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title"
                            id="favoritesModalLabel">Ximpy Reward of the day!</h4>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            Would you like to share to your wall the reward you have gained with Ximpy?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <span class="pull-right">
                            <button type="button" class="btn btn-primary">
                                Yes
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-7" >
            @foreach ($cards as $card)
                    <div class="col-md-3 ch-cardbox center-block">
                        <div class="ch-cardbox-top">
                            <h4>{{ $card['business'][0]['business_name'] }}</h4>
                            Expiry: {{ $card['card']['expiration_date'] }}
                        </div>

                        <div>
                            <h2>{{ $card['card']['balance'] }}</h2>remaining balance

                            <h2>{{ $card['card']['acquired_points'] }}</h2>points earned
                        </div>



                    </div>




            @endforeach

        </div>
        <div class="col-md-3">
            <div class="ch-left-top">
                <div class="pull-left">
                    <div>WELCOME BACK {{ strtoupper($user_data[0]['first_name'] ) }}!</div>
                    <div>Logout</div>
                </div>
                <img src="images/profile.png" class="pull-right ch-img-profile" />
            </div>
            <div class="clearfix"></div>
            <div class="">
                {{ $user_data[0]['first_name'] }} {{ $user_data[0]['last_name'] }}
                <br />
                {{ $user_data[0]['email_address'] }}
                <br />
                {{ $user_data[0]['contact_number'] }}

            </div>

        </div>
    </div>



@endsection