@extends('components.layout')

@section('content')
    <div class='my-5'>  
        <div class = 'card mx-auto' style="width: 45%;">
            <div class='card-header'>
                <div class='p-2 pt-4'>
                    <a href = "javascript:history.back()" class='p-2'> 
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="m313-440 224 224-57 56-320-320 320-320 57 56-224 224h487v80H313Z"/></svg>
                    </a>
                </div>
                <div class='p-4'>
                    <div>
                        <b class='h3 font-weight-bolder'> Resolution Ordinance Number</b><br>
                        <hr>
                        <b class='h3 text-monospace font-italic'> {{ $landmark->ResOrdNum }}</b>
                    </div>
                </div>
            </div>
            <div class='card-body'>
                <div class='p-4'>
                    <b class='h3 font-weight-bolder'>Title</b><br><br>
                    <p class='h5 text-monospace font-italic text-uppercase'>{{$landmark->Title}}</p>
                </div>
                <hr>
                <div class='px-4 text-center'>
                    <a href="{{ asset('storage/' . $landmark->ResOrdNum . '/' . $landmark->ImgName) }}" class="btn btn-primary" target="_blank">
                        View PDF File
                    </a>
                    <a href="/update/{{ $landmark->ResOrdID }}" class="btn btn-primary">Update Landmark</a>
                    @if ($landmark->landmark == 1)
                    <a href="/remove/{{ $landmark->ResOrdID }}" class="btn btn-danger" onclick="return confirm('Remove this Landmark?')">Remove Landmark</a>
                    @endif

                </div>
    
            </div>
        </div>
    </div>
@endsection
