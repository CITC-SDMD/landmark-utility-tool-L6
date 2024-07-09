<x-layout>
    <div>
        <div class = 'body-container'>
            
            <div class='px-4 py-4 pb-8 text-slate-700'>
                <b>
                    <div class="relative">
                        <a href = "javascript:history.back()" class='material-symbols-outlined'> 
                            keyboard_backspace
                        </a>
                    </div>
                </b>
            </div>
            
            <div class = 'form-container p-6'>
                <div class='px-4 py-4 pt-4'>
                    <div>
                        <b class='field-name'>Resolution Order No.</b>
                        <p class='field'><b>{{ $landmark->ResOrdNum }}</b></p>
                    </div>
                </div>
    
                <div class='p-4'>
                    <div>
                        <b class='field-name'>Title</b>
                        <p class='field'><b>{{$landmark->Title}}</b></p>
                    </div>
                </div>

                <div class='p-4'>
                    <a href="{{ asset('storage/' . $landmark->ResOrdNum . '/' . $landmark->ImgName) }}" class="button" target="_blank">
                        View PDF File
                    </a>
                </div>

                @if ($landmark->landmark == 1)

                    <div class='columns-2 p-4'>
                        <a href="/update/{{ $landmark->ResOrdID }}" class="button">Update Landmark</a>
                        <a href="/remove/{{ $landmark->ResOrdID }}" class="button" onclick="return confirm('Remove this Landmark?')">Remove Landmark</a>
                    </div>
                    
                @else

                    <div class='p-4'>
                        <a href="/update/{{ $landmark->ResOrdID }}" class="button">Update Landmark</a>
                    </div>

                @endif

            </div>

        </div>
    </div>
</x-layout>
