@extends('layouts.frontend')

@section('content')

    <div class="w-full max-w-xs mx-auto">
        <div class="">Contact Us</div>
        <div>
            <br><br>
            @if(session()->has('success'))
                <div class="md:flex md:items-center mb-4" style="justify-content: center"> <p class="text-green-500 text-xs italic">
                        {{ session('success') }}
                    </p></div>
            @endif
        </div>

        <form method="POST" action="{{ route('contact.send') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Full Name:
                </label>
                <input
                    class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="name" id="name"
                    required="">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="emailaddress">
                    Email Address
                </label>
                <input
                    class="shadow appearance-none border @error('email') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="email" name="email" id="emailaddress"
                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Email must contain leters one @ and at least one ."
                    placeholder="email@example.com">
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="qa">
                    Comments or Questions
                </label>
                <textarea
                    class="shadow appearance-none border @error('qa') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text area" name="qa" id="qa"
                    required="">
                </textarea>
                @error('qa')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Contact us
                </button>
            </div>
        </form>
    </div>
@endsection
