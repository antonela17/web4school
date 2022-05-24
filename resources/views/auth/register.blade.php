@extends('layouts.frontend')

@section('content')

    <div class="w-full max-w-xs mx-auto">
        <div class="flex flex-wrap items-center" style="padding-left:700px">
            <a href="/home" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                <svg class="w-3 h-3 fill-current svg-inline--fa fa-long-arrow-alt-left fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left"  role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                <span class="ml-2 text-xs font-semibold">Back</span>
            </a>
        </div>
        <form method="POST" action="{{ route('register') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name
                </label>
                <input
                    class="shadow appearance-none border @error('name') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="name" id="name"pattern="([A-Z])[a-z]+"
                    title="Name must start with only one uppercase, shouldn't contain numbers and should have at least 4 characters"
                    minlength="4" maxlength="50"
                    placeholder="Ema" required="">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="surname">
                    Surname
                </label>
                <input
                    class="shadow appearance-none border @error('surname') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="surname" id="surname" pattern="([A-Z])[a-z]+"
                    title="Surname must start with only one uppercase, shouldn't contain numbers and should have at least 4 characters"
                    minlength="4" maxlength="50"
                    placeholder="Smith" required="">
                @error('surname')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                <input
                    class="shadow appearance-none border @error('username') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" name="username" id="username"
                    placeholder="ema" required="">
                @error('username')
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
                    pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Email must contain letters, one @ and at least one ."
                    placeholder="email@example.com">
                @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password
                </label>
                <input
                    class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="password" name="password"
                    id="password" placeholder="******************"
                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                    title="Password must contain one uppercase, one lowercase, one number, one special character and have at least 8 characters"required="">
                @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                   Confirm Password
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                    type="password"  name="password_confirmation" required autocomplete="new-password"
                    id="password-confirm" placeholder="******************">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="role">Role(choose):</label>
                    <select class="form-control" name="role" id="role">
                        <option value="" selected disabled> Plase select :</option>
                        <option value="1">Admin</option>
                        <option value="2">Mesues</option>
                        <option value="3">Student</option>
                    </select>
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Register
                </button>
            </div>
        </form>
    </div>
@endsection
