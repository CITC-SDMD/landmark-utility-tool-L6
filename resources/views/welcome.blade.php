@extends('components.layout')

@section('content')    
    <div class='pt-5 mh-100'>
        <div class='mx-auto pb-5'>     
            <h1 class="text-center font-weight-bold text-monospace">Landmark Legislation</h1>
        </div>
    
        @if (session('message'))
            <div class = 'card p-2 mx-auto' style="width: 25%;"><p class='text-center font-italic h5 mt-2'>{{ session('message') }}</p></div>
            <br>
        @endif
        <div class='mx-auto p-2 position-relative'  style='width:75%'>
            <form action="{{ route('search') }}" method="get" role='search'>
                <input class='d-flex p-2 w-100' placeholder="Search" name='searchquery' value="{{ old('searchquery') }}"/>
            </form>
        </div>
        </br>
        <div class='mx-auto' style='width:75%'>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <th scope="col" class='text-center align-middle'>Resolution Ordinance No.</th>
                    <th scope="col" class='text-center align-middle'>Title</th>
                    <th scope="col" class='text-center align-middle'>Landmarked?</th>
                    <th scope="col"></th>
                    @auth
                        <th scope="col"></th>
                    @endauth
                </thead>
                <tbody>

                    @foreach ($landmarklist as $landmark)
                        
                        <tr>
                            <th scope="row" class='text-center align-middle'>
                                    {{ $landmark->ResOrdNum }}
                            </th>
                            <th scope="row">
                                <p class='text-break px-2 pt-4 font-weight-light text-monospace font-italic text-uppercase'>{{ $landmark->Title }}</p>
                            </th>
                            <th scope="row">
                                <p class="p-5 material-symbols-outlined">
                                    @if ($landmark->landmark == 1)
                                        check
                                    @endif
                                </p>
                            </th>
                            <th scope="row">
                                <a href="{{ asset('storage/' . $landmark->ResOrdNum . '/' . $landmark->ImgName) }}" class="badge badge-dark p-5" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M320-240h320v-80H320v80Zm0-160h320v-80H320v80ZM240-80q-33 0-56.5-23.5T160-160v-640q0-33 23.5-56.5T240-880h320l240 240v480q0 33-23.5 56.5T720-80H240Zm280-520v-200H240v640h480v-440H520ZM240-800v200-200 640-640Z"/></svg>
                                </a>
                            </th>
                            @auth
                                <th scope="row">
                                    <a href="{{route('view', $landmark->ResOrdID)}}" class="p-5 badge badge-dark">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#FFFFFF"><path d="M480-320q75 0 127.5-52.5T660-500q0-75-52.5-127.5T480-680q-75 0-127.5 52.5T300-500q0 75 52.5 127.5T480-320Zm0-72q-45 0-76.5-31.5T372-500q0-45 31.5-76.5T480-608q45 0 76.5 31.5T588-500q0 45-31.5 76.5T480-392Zm0 192q-146 0-266-81.5T40-500q54-137 174-218.5T480-800q146 0 266 81.5T920-500q-54 137-174 218.5T480-200Zm0-300Zm0 220q113 0 207.5-59.5T832-500q-50-101-144.5-160.5T480-720q-113 0-207.5 59.5T128-500q50 101 144.5 160.5T480-280Z"/></svg>
                                    </a>
                                </th>
                            @endauth
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $landmarklist->links() }}
        </div>
    </div>
@endsection