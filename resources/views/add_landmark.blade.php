@extends('components.layout')

@section('content')
        <div class='text-center p-5'>     
            <h1 class='font-weight-bold text-monospace'>Add New Landmark Legislation Entry</h1>
        </div>
        
        <div class = 'card p-5 mx-auto' style="width: 45%;">
            <form action="{{ route('add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class='p-2 form-group'>
                        <label for='ResOrdNum'><b class='font-weight-bold'>Resolution Order No.</b></label>
                        <input class='p-4 form-control mb-2' name='ResOrdNum' value= "{{ old('ResOrdNum') }}"/>
                        @error('ResOrdNum')
                            <p class="badge badge-danger p-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div>
                    <div class='p-2 form-group'>
                        <label for='Title'><b class='font-weight-bold'>Title</b></label>
                        <input class='p-4 form-control mb-2' name='Title' value= "{{ old('Title') }}"/>
                        @error('Title')
                            <p class="badge badge-danger p-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class='p-2 form-group'>
                    <div>
                        <label for="pdf"><b>Attachment</b></label>
                        <input type='file' class='form-control-file mb-2' name='pdf'/>
                    </div>
                    @error('pdf')
                        <p class="badge badge-danger p-2">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class='p-4'>
                    <button type="submit" class="btn btn-primary mx-auto" style="width: 690px;" type="button">
                        Submit
                    </button>
                </div>
            </form>
        </div>

@endsection