<x-layout>
        <div class = 'titles'>     
            <b>Add New Landmark Legislation Entry</b>
        </div>
        
        <div class = 'form-container p-6'>
            <form action="{{ route('add') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class='px-4 py-4 pt-4'>
                    <div>
                        <b class='field-name'>Resolution Order No.</b>
                        <input class='field' name='ResOrdNum' value= "{{ old('ResOrdNum') }}"/>
                        @error('ResOrdNum')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
    
                <div class='p-4'>
                    <div>
                        <b class='field-name'>Title</b>
                        <input class='field p-4' name='Title' value= "{{ old('Title') }}"/>
                        @error('Title')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class='p-4'>
                    <b class='field-name'>File</b>
                    <input type='file' class='field py-3.5' name='pdf'/>
                    @error('pdf')
                        <p class="error">{{ $message }}</p>
                    @enderror
                </div>
    
                <div class='p-4'>
                    <button type="submit" class="button p-4" type="button">
                        Submit
                    </button>
                </div>
            </form>
        </div>

</x-layout>