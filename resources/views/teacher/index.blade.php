@extends('layouts.app')

@section('content')


    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Subjects</h2>
            </div>
        </div>
        <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
            <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
                <div class="w-3/12 px-4 py-3">Subject Name</div>

                <div class="w-2/12 px-4 py-3 text-right">Action</div>
            </div>
            @foreach ($subjects as $subject)
                <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                    <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $subject['name'] }}-{{ $subject['year'] }}{{ $subject['class'] }}</div><div class="w-2/12 flex items-center justify-end px-3">
                        <a href="{{ route('teacher.subject',['subjectName'=>$subject->name,'class'=>$subject['id']]) }}" class="ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm" title="view class">
                            <svg class="h-3 w-3 fill-current text-gray-100" fill="white" data-icon="class" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="50px" height="50px"><path fill="currentColor" d="M 6 5 C 3.800781 5 2 6.800781 2 9 L 2 41 C 2 43.199219 3.800781 45 6 45 L 44 45 C 46.199219 45 48 43.199219 48 41 L 48 9 C 48 6.800781 46.199219 5 44 5 Z M 6 7 L 44 7 C 45.117188 7 46 7.882813 46 9 L 46 41 C 46 42.117188 45.117188 43 44 43 L 6 43 C 4.882813 43 4 42.117188 4 41 L 4 9 C 4 7.882813 4.882813 7 6 7 Z M 6.8125 9 C 6.335938 9.089844 5.992188 9.511719 6 10 L 6 40 C 6 40.550781 6.449219 41 7 41 L 43 41 C 43.03125 41 43.0625 41 43.09375 41 C 43.609375 40.953125 44.003906 40.519531 44 40 L 44 10 C 44 9.449219 43.550781 9 43 9 L 7 9 C 6.96875 9 6.9375 9 6.90625 9 C 6.875 9 6.84375 9 6.8125 9 Z M 8 11 L 42 11 L 42 39 L 38 39 L 38 37 L 29 37 L 29 39 L 8 39 Z M 25 17 C 22.800781 17 21 18.800781 21 21 C 21 23.199219 22.800781 25 25 25 C 27.199219 25 29 23.199219 29 21 C 29 18.800781 27.199219 17 25 17 Z M 25 19 C 26.117188 19 27 19.882813 27 21 C 27 22.117188 26.117188 23 25 23 C 23.882813 23 23 22.117188 23 21 C 23 19.882813 23.882813 19 25 19 Z M 17 21 C 15.355469 21 14 22.355469 14 24 C 14 25.644531 15.355469 27 17 27 C 18.644531 27 20 25.644531 20 24 C 20 22.355469 18.644531 21 17 21 Z M 33 21 C 31.355469 21 30 22.355469 30 24 C 30 25.644531 31.355469 27 33 27 C 34.644531 27 36 25.644531 36 24 C 36 22.355469 34.644531 21 33 21 Z M 17 23 C 17.5625 23 18 23.4375 18 24 C 18 24.5625 17.5625 25 17 25 C 16.4375 25 16 24.5625 16 24 C 16 23.4375 16.4375 23 17 23 Z M 33 23 C 33.5625 23 34 23.4375 34 24 C 34 24.5625 33.5625 25 33 25 C 32.4375 25 32 24.5625 32 24 C 32 23.4375 32.4375 23 33 23 Z M 25 26 C 22.273438 26 20.082031 27.261719 19.03125 28 C 18.429688 27.800781 17.746094 27.65625 17 27.65625 C 14.292969 27.65625 12.34375 29.4375 12.34375 29.4375 L 12 29.75 L 12 33 L 38 33 L 38 29.75 L 37.65625 29.4375 C 37.65625 29.4375 35.707031 27.65625 33 27.65625 C 32.253906 27.65625 31.570313 27.800781 30.96875 28 C 29.917969 27.261719 27.726563 26 25 26 Z M 25 28 C 27.613281 28 29.550781 29.457031 30 29.8125 L 30 31 L 20 31 L 20 29.8125 C 20.449219 29.457031 22.386719 28 25 28 Z M 17 29.65625 C 17.347656 29.65625 17.675781 29.730469 18 29.8125 L 18 31 L 14 31 L 14 30.71875 C 14.40625 30.417969 15.507813 29.65625 17 29.65625 Z M 33 29.65625 C 34.492188 29.65625 35.59375 30.417969 36 30.71875 L 36 31 L 32 31 L 32 29.8125 C 32.324219 29.730469 32.652344 29.65625 33 29.65625 Z"/></svg>
                        </a>
                        <a href="{{ route('teacher.members',['subjectName'=>$subject['name'],'class'=>$subject['id']]) }}" class="ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm" title="view members">
                            <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="far" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M288 144a110.94 110.94 0 0 0-31.24 5 55.4 55.4 0 0 1 7.24 27 56 56 0 0 1-56 56 55.4 55.4 0 0 1-27-7.24A111.71 111.71 0 1 0 288 144zm284.52 97.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400c-98.65 0-189.09-55-237.93-144C98.91 167 189.34 112 288 112s189.09 55 237.93 144C477.1 345 386.66 400 288 400z"></path></svg>
                        </a>
                        <a href="{{ route('teacher.grades',['subjectName'=>$subject['name'],'class'=>$subject['id']]) }}" class="ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm" title="view grades">
                            <svg class="h-3 w-3 fill-current text-gray-100" aria-hidden="true" focusable="false" data-prefix="far" data-icon="exam" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                <path d="M477.436,192.45l-64.396-71.628c-3.693-4.108-10.016-4.442-14.121-0.752l-47.73,42.901
				c-0.003,0.003-0.006,0.005-0.009,0.008l-34.651,31.156v-79.588c0-3.086-1.425-5.999-3.86-7.894L210.03,26.813
				c-0.111-0.087-0.229-0.163-0.343-0.245c-0.095-0.066-0.186-0.137-0.283-0.201c-0.182-0.121-0.37-0.23-0.559-0.339
				c-0.145-0.083-0.291-0.16-0.44-0.236c-0.181-0.091-0.36-0.182-0.546-0.262c-0.132-0.058-0.268-0.106-0.402-0.157
				c-0.146-0.056-0.291-0.111-0.438-0.16c-0.141-0.046-0.282-0.086-0.425-0.126c-0.154-0.044-0.309-0.083-0.465-0.119
				c-0.137-0.031-0.273-0.062-0.411-0.087c-0.183-0.033-0.367-0.06-0.552-0.084c-0.116-0.015-0.23-0.032-0.348-0.043
				c-0.306-0.028-0.613-0.047-0.922-0.047c0,0-0.004,0-0.005,0h-0.001h-0.038H10c-5.523,0-10,4.478-10,10v410.586
				c0,5.522,4.477,10,10,10h296.529c5.522,0,10-4.478,10-10v-94.726l112.398-101.088c0.002-0.002,0.004-0.004,0.006-0.006
				l47.75-42.899c1.973-1.772,3.161-4.257,3.302-6.906C480.127,197.019,479.21,194.423,477.436,192.45z M282.61,108.611
				l-68.403,9.737l-0.238-63.133L282.61,108.611z M20,435.293V44.707h173.928l0.322,85.197c0.011,2.891,1.273,5.637,3.46,7.527
				c1.829,1.58,4.154,2.435,6.54,2.435c0.468,0,0.939-0.033,1.409-0.1l90.87-12.935v85.286L207.94,291.77
				c-0.143,0.128-0.268,0.267-0.402,0.4c-0.077,0.077-0.157,0.15-0.232,0.23c-0.271,0.29-0.524,0.592-0.754,0.905
				c-0.001,0.001-0.002,0.002-0.002,0.002c-0.232,0.319-0.438,0.65-0.629,0.988c-0.043,0.076-0.082,0.154-0.123,0.231
				c-0.15,0.285-0.287,0.575-0.408,0.87c-0.021,0.052-0.05,0.098-0.07,0.15l-39.419,100.25c-1.386,3.524-0.661,7.53,1.872,10.347
				c1.924,2.139,4.64,3.313,7.436,3.313c0.885,0,1.777-0.117,2.655-0.359l103.814-28.608c0.007-0.002,0.014-0.005,0.02-0.007
				c0.37-0.103,0.73-0.231,1.086-0.376c0.093-0.038,0.184-0.08,0.274-0.12c0.277-0.122,0.548-0.257,0.813-0.404
				c0.079-0.043,0.159-0.084,0.236-0.129c0.325-0.192,0.641-0.401,0.944-0.63c0.048-0.037,0.092-0.078,0.14-0.115
				c0.175-0.138,0.351-0.273,0.518-0.424l10.819-9.73v66.739H20z M218.01,317.93l19.208,21.37l23.556,26.206l-68.94,18.997
				L218.01,317.93z M279.772,356.725l-38.306-42.618l-12.719-14.149L357.115,184.54l17.011,18.928l33.995,37.825L279.772,356.725z
				 M422.995,227.923l-27.464-30.558l-23.543-26.196l32.864-29.54l51.023,56.754L422.995,227.923z"/></svg>
                        </a>

                    </div>
                </div>
            @endforeach
        </div>
        @if(session()->has('success'))
            <div class="md:flex md:items-center mb-4" style="justify-content: center"> <p class="text-green-500 text-xs italic">
                    {{ session('success') }}
                </p></div>
        @endif

        {{--        @include('backend.alert.delete',['name' => 'teacher'])--}}
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $( ".deletebtn" ).on( "click", function(event) {
                event.preventDefault();
                $( "#deletemodal" ).toggleClass( "hidden" );
                var url = $(this).attr('data-url');
                $(".remove-record").attr("action", url);
            })

            $( "#deletemodelclose" ).on( "click", function(event) {
                event.preventDefault();
                $( "#deletemodal" ).toggleClass( "hidden" );
            })
        })
    </script>

@endpush
