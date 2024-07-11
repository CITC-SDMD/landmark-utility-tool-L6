@extends('components.layout')

@section('content')
    <div>
        <div class='text-center p-5'>     
            <h1 class='font-weight-bold text-monospace'>Login</h1>
        </div>
        <div class = 'card p-5 mx-auto' style="width: 45%;">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class='p-2 form-group'>
                    <label for='email'><b>Email</b></label>
                    <input id="email" type="email" class="p-4 form-control mb-2" name="email">
                    @error('email')
                        <p class="badge badge-danger p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class='p-2 form-group'>
                    <label for='password'><b>Password</b></label>
                    <input id="password" type="password" class="p-4 form-control mb-2" name="password">
                    @error('password')
                        <p class="badge badge-danger p-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class='p-4'>
                    @error('failed')
                        <p class="badge badge-danger p-2" style="width: 690px">{{ $message }}</p>
                    @enderror
                </div>
                <div class='p-4'>
                    <button type="submit" class="btn btn-primary mx-auto" style="width: 690px;" type="button">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
@endsection
