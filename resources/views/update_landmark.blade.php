<x-layout>
        <div class = 'titles'>     
            <b>Update Landmark Legislation</b>
        </div>
        
        <div class = 'form-container p-6'>
            <form action="{{ route('update', $landmark->ResOrdID) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class='px-4 py-4 pt-4'>
                    <div>
                        <b class='field-name'>Resolution Order No.</b>
                        <input class='field' name='ResOrdNum' value="{{ old('ResOrdNum', $landmark->ResOrdNum) }}"/>
                        @error('ResOrdNum')
                            <p class="error">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                
                <div class='p-4'>
                    <div>
                        <b class='field-name'>Title</b>
                        <input class='field p-4' name='Title' value="{{ old('Title', $landmark->Title) }}"/>
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
                    <input type="checkbox" class='py-3.5' name='Landmark' {{ old('Landmark', $landmark->landmark) == 1 ? 'checked' : '' }} value = "1" />
                    <b class='field-name'>Is Landmark?</b>
                </div>
    
                <div class='p-4'>
                    <button type="submit" class="button p-4" type="button">
                        Submit
                    </button>
                </div>
            </form>
        </div>

</x-layout>
