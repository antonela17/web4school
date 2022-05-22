@extends('layouts.frontend')
@section('content')
    <div class="w-full max-w-xs mx-auto">
        <div>
            <br><br>
            @if(session()->has('success'))
                <div class="md:flex md:items-center mb-4" style="justify-content: center"> <p class="text-green-500 text-xs italic">
                        {{ session('success') }}
                    </p></div>
            @endif
        </div>
        <form method="POST" action="{{ route('username.username') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border @error('username') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="username" id="username"
                    required="">
                @error('username')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Save Username
                </button>
            </div>
        </form>
    </div>
@endsection
