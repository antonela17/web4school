@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Files</h2>
            </div>
            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-wrap items-center">
                    <a href="{{url()->previous()}}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">Back</span>
                    </a>
                </div>
            </div>

            <div class="flex items-center justify-between mb-6">
                <div class="flex flex-wrap items-center">
                    <a href="{{route("teacher.members",['subjectName'=>$subjectName,'class'=>$class])}}" class="bg-gray-200 text-gray-700 text-sm uppercase py-2 px-4 flex items-center rounded" >
                        <svg class="w-3 h-3 fill-current" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="long-arrow-alt-left" class="svg-inline--fa fa-long-arrow-alt-left fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M134.059 296H436c6.627 0 12-5.373 12-12v-56c0-6.627-5.373-12-12-12H134.059v-46.059c0-21.382-25.851-32.09-40.971-16.971L7.029 239.029c-9.373 9.373-9.373 24.569 0 33.941l86.059 86.059c15.119 15.119 40.971 4.411 40.971-16.971V296z"></path></svg>
                        <span class="ml-2 text-xs font-semibold">View Members</span>
                    </a>
                </div>
            </div>


        </div>
        <form action="{{ route('teacher.addFile') }}" method="POST" class="w-full max-w-xl px-6 py-12" enctype=multipart/form-data>
            <input id="subjectName" type="hidden"
                  name="subjectName" value="{{$subjectName}}">
            <input id="classId" type="hidden"
                  name="classId" value="{{$class}}">
            @csrf
            <div class="md:flex md:items-center mb-6">
                    <input name="csv_file" class="bg-gray-200 block text-black font-bold md:text-right mb-1 md:mb-0 pr-4" type="file">
                @error('csv_file')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
                <div class="md:w-2/3" style="padding-left: 20px">
                    <button class="shadow bg-blue-500 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Add File
                    </button>
                </div>
            </div>
        </form>
        <div class="flex flex-wrap items-stretch">
            <ul>
                @if(!empty($files))
                    @foreach($files as $file)
                        <li style="padding-bottom: 10px ">
                            <div >

                                <a href="/file?filename={{$file['name']}}" style=" display:inline-flex;color: #2c5282">
                                    <img
                                        class="fill-current h-6 w-6 mr-2 feather feather-book-open svg-inline--fa fa-plus fa-w-14"
                                        src="{{asset('img/document/pdf.png')}}" alt="PDF"
                                        style="height: 35px;width: 30px">
                                    <span class="ml-2 text-xs font-semibold " style="font-size: 20px;font-family: Arial, Helvetica, sans-serif">  {{$file['name']}}</span>
                                </a>
                            </div>
                        </li>

                    @endforeach
                @else
                    <li>No folders uploaded yet!</li>
                @endif
            </ul>

        </div>
    </div>



    </div>
@endsection
