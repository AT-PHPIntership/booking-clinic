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
        var socket = io.connect('http://clinic.com:3000/');
        socket.on('message', function (data) {
            // console.log(data);
            var arrayv= JSON.parse(data);
            $('#type').html(arrayv.symbol);
            $('#bid').html(arrayv.bid);
            $('#ask').html(arrayv.ask);
            $('#price').html(arrayv.price);
            console.log(arrayv);
            // $( "#messages" ).append( "<p>"+data+"</p>" );
          });
    </script>

@endsection