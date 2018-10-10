@extends('layouts.app')

@section('content')
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.1.1/socket.io.js"></script>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2" >
                <div id="messages" ></div>
                <h2 id="type"></h2>
                <div class="color-swatches"> 
                    <div id="bid" class="color-swatch brand-primary"></div> 
                    <div id="ask" class="color-swatch brand-success"></div> 
                    <div id="price" class="color-swatch brand-info"></div>
                </div>
            </div>
        </div>
    </div>


    <script>
    // alert('dd');
        var getUrlParameter = function getUrlParameter(sParam) {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };
        var channel= getUrlParameter('channel');
        // alert(channel);
        var socket = io.connect('http://clinic.com:3000/');
        console.log(socket);
        // socket.emit('join', []);
        socket.on('connect', function() {
           // Connected, let's sign-up for to receive messages for this room
           // console.log('join');
           socket.emit('rooms', [channel]);
        });

        socket.on('message', function(data) {
           console.log('Incoming message:', data);
            // var arrayv= JSON.parse(data);
            $('#type').html(data.symbol);
            $('#bid').html(data.bid);
            $('#ask').html(data.ask);
            $('#price').html(data.price);
            // console.log(data);
            // $( "#messages" ).append( "<p>"+data+"</p>" );
        });

    </script>

@endsection