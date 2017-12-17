@section('expired_food')

    <!-- check whether the aliments belong to one of these lists -->
    @if(count($expired) == 0 && count($today) == 0 && count($expiresThisWeek) == 0)
        <h3>There's no expired or soon to be expired food to show!</h3>
    @else
        <h3>Here is your soon or already expired food summary!</h3>
    @endif

    <hr>

    <!--#region EXPIRED-->
    @if(count($expired) > 0)
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <!-- I know font is deprecated so don't hit me -->
                <h4><font color="#8b0000">Expired</font></h4>
            </div>
            <div class="panel-body">
                @foreach($expired as $aliment)
                    <div class="row">
                        <div class="col-sm-4">{{ $aliment->name }}</div>
                        <div class="col-sm-4"><b>good until: </b>{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
                        <div class="col-sm-4"><b>located in: </b>{{ $aliment->cupboard->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!--#endregion -->

    <!--#region EXPIRES TODAY -->
    @if(count($today) > 0)
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><font color="red">Expires today</font></h4>
            </div>
            <div class="panel-body">
                @foreach($today as $aliment)
                    <div class="row">
                        <div class="col-sm-4">{{ $aliment->name }}</div>
                        <div class="col-sm-4"><b>good until: </b>{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
                        <div class="col-sm-4"><b>located in: </b>{{ $aliment->cupboard->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!--#endregion EXPIRES TODAY -->

    <!--#region EXPIRES THIS WEEK -->
    @if(count($expiresThisWeek) > 0)
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4><font color="#ff8c00">Expires this week</font></h4>
            </div>
            <div class="panel-body">
                @foreach($expiresThisWeek as $aliment)
                    <div class="row">
                        <div class="col-sm-4">{{ $aliment->name }}</div>
                        <div class="col-sm-4"><b>good until: </b>{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
                        <div class="col-sm-4"><b>located in: </b>{{ $aliment->cupboard->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <!--#endregion EXPIRES THIS WEEK -->

@endsection
