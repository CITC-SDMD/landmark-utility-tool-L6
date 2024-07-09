<x-layout>
    <div class = 'body-container px-40'>
        <div class = 'titles'>     
            <b>Login</b>
        </div>
        <div class='form-container p-6'>
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class='px-4 py-4 pt-4'>
                    <div>
                        <b class="field-name">Email</b>
                        <input id="email" type="email" class="field" name="email">
                        @error('email')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class='px-4 py-4 pt-4'>
                    <div>
                        <b class="field-name">Password</b>
                        <input id="password" type="password" class="field" name="password">
                        @error('password')
                            <p class="error">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class='px-4 py-4 pt-4'>
                    @error('failed')
                        <p class="flex flex-row justify-center items-center error">{{ $message }}</p>
                    @enderror
                </div>
                <div class='px-4 py-4 pt-4'>
                    <button type="submit" class="button">SUBMIT</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
