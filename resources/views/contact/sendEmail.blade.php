@extends('layouts.frontend')

@section('content')

    <div class="w-full max-w-xs mx-auto">
        <div class="">Contact Us</div>
        <div>
            <br><br>
        </div>

        <form method="POST" action="{{ route('contact.sendAtttachment') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input id="user_id" type="hidden"
                   class="form-control" name="user_id"
                   value="{{ Auth::user()->id}}">

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Merr vertetim notash
                </button>
            </div>
        </form>
    </div>
@endsection
