@section('expired_food')

    @if(count($expired) > 0)
        <h4>Expired</h4>
    @endif
    @foreach($expired as $aliment)
        <div class="row">
            <div class="col-sm-2">{{ $aliment->name }}</div>
            @if($aliment->description != "")
                <div class="col-sm-2">{{ $aliment->description}}</div>
            @endif
            <div class="col-sm-2">{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
        </div>
    @endforeach

    @if(count($today) > 0)
        <h4>Today</h4>
    @endif
    @foreach($today as $aliment)
        <div class="row">
            <div class="col-sm-2">{{ $aliment->name }}</div>
            @if($aliment->description != "")
                <div class="col-sm-2">{{ $aliment->description}}</div>
            @endif
            <div class="col-sm-2">{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
        </div>
    @endforeach

    @if(count($expiresThisWeek) > 0)
        <h4>Expires this week</h4>
    @endif
    @foreach($expiresThisWeek as $aliment)
        <div class="row">
            <div class="col-sm-2">{{ $aliment->name }}</div>
            @if($aliment->description != "")
                <div class="col-sm-2">{{ $aliment->description}}</div>
            @endif
            <div class="col-sm-2">{{ \Carbon\Carbon::parse($aliment->expiration_date)->format('d/m/Y') }}</div>
        </div>
    @endforeach

@endsection