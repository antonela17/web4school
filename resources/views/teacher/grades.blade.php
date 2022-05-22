@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Grades</h2>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-wrap items-center">
                    <a href="/home" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">Back</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-wrap items-center">
                    <a href="{{route('teacher.newGrades',['class'=>$class])}}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">Add New Exam Grades</span>
                    </a>
                </div>
            </div>


        </div>
        <div class="flex flex-wrap items-center"><ul>
                @if(count($grades))
                    @foreach($grades as $grade)
                        <li style="padding-bottom: 10px ">
                          Grade {{$grade}}
                        </li>

                    @endforeach
                @else
                    <li>No grades uploaded yet!</li>
                @endif
            </ul>

        </div>
    </div>



    </div>
@endsection
