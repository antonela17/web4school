@extends('layouts.frontend')

@section('content')

    <div class="w-full max-w-xs mx-auto">
        <div class="flex flex-wrap items-center" style="padding-left: 700px">
            <a href="/home" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded">
                <svg class="w-3 h-3 fill-current svg-inline--fa fa-long-arrow-alt-left fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                <span class="ml-2 text-xs font-semibold">Back</span>
            </a>
        </div>
        <br>
        <div>
            <h2 class="text-gray-700 uppercase font-bold">Vertetim </h2>
        </div>
        <div>
            <br><br>
        </div>


        <form method="POST" action="{{ route('contact.sendVs') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <input id="user_id" type="hidden"
                   class="form-control" name="user_id"
                   value="{{ Auth::user()->id}}">

            <div class="flex items-center justify-between">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Merr vertetim studenti

                </button>
            </div>
        </form>
    </div>
@endsection
