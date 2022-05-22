@extends('layouts.app')

@section('content')
    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Students</h2>
            </div>
            <div>

            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-wrap items-center">
                    <a href="{{url()->previous()}}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">Back</span>
                    </a>
                </div>
            </div>

        </div>

    </div>
    <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
        <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
            <div class="w-3/12 px-4 py-3">Name</div>
            <div class="w-2/12 px-4 py-3">Surname</div>
            <div class="w-2/12 px-4 py-3">Username</div>
            <div class="w-3/12 px-4 py-3">Email</div>
        </div>
        @foreach ($students as $student)
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student->name }}</div>
                <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student->surname }}</div>
                <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student->username }}</div>
                <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student->email }}</div>
                <div class="w-2/12 flex items-center justify-end px-3">

                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-8">
        {{--        {{ $students->links() }}--}}
    </div>
    </div>
@endsection

