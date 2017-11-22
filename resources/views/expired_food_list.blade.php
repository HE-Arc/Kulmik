@php

    $aliments = \App\Aliment::all();

@endphp


@section('expired_food')

        @foreach($aliments as $aliment)
            @if($aliment->hasExpired("expired") != null)
                <h3>Has expired</h3>
                <div class="row">
                    <div class="col-sm-2">{{ $aliment->name }}</div>
                    @if($aliment->description != "")
                        <div class="col-sm-2">{{ $aliment->description}}</div>
                    @endif
                </div>
            @endif
        @endforeach

        @foreach($aliments as $aliment)
            @if($aliment->hasExpired("today") != null)
                <h3>Expires today</h3>
                <div class="row">
                    <div class="col-sm-2">{{ $aliment->name }}</div>
                    @if($aliment->description != "")
                        <div class="col-sm-2">{{ $aliment->description}}</div>
                    @endif
                </div>
            @endif
        @endforeach

        @foreach($aliments as $aliment)
            @if($aliment->hasExpired("stage3") != null)
                <h3>Expires in 2-1 days</h3>
                <div class="row">
                    <div class="col-sm-2">{{ $aliment->name }}</div>
                    @if($aliment->description != "")
                        <div class="col-sm-2">{{ $aliment->description}}</div>
                    @endif
                </div>
            @endif
        @endforeach

        @foreach($aliments as $aliment)
            @if($aliment->hasExpired("stage2") != null)
                <h3>Expires in 3-5 days</h3>
                <div class="row">
                    <div class="col-sm-2">{{ $aliment->name }}</div>
                    @if($aliment->description != "")
                        <div class="col-sm-2">{{ $aliment->description}}</div>
                    @endif
                </div>
            @endif
        @endforeach

        @foreach($aliments as $aliment)
            @if($aliment->hasExpired("stage1") != null)
                <h3>Expires in 6-10 days</h3>
                <div class="row">
                    <div class="col-sm-2">{{ $aliment->name }}</div>
                    @if($aliment->description != "")
                        <div class="col-sm-2">{{ $aliment->description}}</div>
                    @endif
                </div>
            @endif
        @endforeach
@endsection