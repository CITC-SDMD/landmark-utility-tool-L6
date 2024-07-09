<x-layout>
    <div class = 'titles text-slate-700'>     
        <b>Landmark Legislation</b>
    </div>
    <div class='form-container p-4'>
        <form action="{{ route('search') }}" method="get" role='search'>
            <div class='p-4'>
                <input class='field' placeholder="Search" name='searchquery' value="{{ old('searchquery') }}"/>
            </div>
        </form>
    </div>
    </br>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-600">
            <thead class="text-xs text-white-700 uppercase bg-slate-800 dark:bg-slate-900 dark:text-slate-400">
                <th scope="col" class="px-6 py-3">Res Ord No.</th>
                <th scope="col" class="px-6 py-3 text-center">Title</th>
                <th scope="col" class="px-6 py-3">Landmarked?</th>
                <th scope="col" class="px-6 py-3"></th>
                @auth
                    <th scope="col" class="px-6 py-3"></th>
                @endauth
            </thead>
            @if ($landmarklist->count() == 0)
            <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-500">
                @auth
                    <th scope="row"
                    class="text-center px-8 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300"colspan="5">
                        No Landmarks found.
                    </th>
                @endauth
                @guest
                    <th scope="row"
                    class="text-center px-8 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300"colspan="4">
                        No Landmarks found.
                    </th>
                @endguest
            </tr>
            @endif
            <tbody class="tracking-wider">
                @foreach ($landmarklist as $landmark)
                    
                    <tr class="bg-white border-b dark:bg-slate-700 dark:border-slate-500">
                        <th scope="row"
                            class="text-center px-8 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300">
                                {{ $landmark->ResOrdNum }}
                        </th>
                        <th scope="row"
                            class="px-6 py-6 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300">
                            <p class="text-pretty line-clamp-3 hover:line-clamp-none uppercase hyphens-auto hyphens-auto">{{ $landmark->Title }}</p>
                        </th>
                        <th scope="row"
                        class="px-6 py-6 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300 text-center">
                            <p class="material-symbols-outlined">
                                @if ($landmark->landmark == 1)
                                    check
                                @endif
                            </p>
                        </th>
                        <th scope="row"
                            class="content-center px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300">
                            <a href="{{ asset('storage/' . $landmark->ResOrdNum . '/' . $landmark->ImgName) }}" class="material-symbols-outlined" target="_blank">
                                picture_as_pdf
                            </a>
                        </th>
                        @auth
                            <th scope="row"
                                class="px-6 py-4 font-medium text-slate-900 whitespace-nowrap dark:text-slate-300">
                                <a href="{{route('view', $landmark->ResOrdID)}}" class="material-symbols-outlined">
                                    visibility
                                </a>
                            </th>
                        @endauth
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {!! $landmarklist->appends(Request::except('page'))->render() !!}
    {{-- {{ $landmarklist->links() }} --}}
</x-layout>