@extends('layouts.app')

@section('content')

    <div class="roles-permissions">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-gray-700 uppercase font-bold">Students</h2>
            </div>

        </div>

    </div>
    <div class="mt-8 bg-white rounded border-b-4 border-gray-300">
        <div class="flex flex-wrap items-center uppercase text-sm font-semibold bg-gray-300 text-gray-600 rounded-tl rounded-tr">
            <div class="w-3/12 px-4 py-3">Name</div>
            <div class="w-2/12 px-4 py-3">Surname</div>
            <div class="w-3/12 px-4 py-3">Email</div>
            <div class="w-1/12 px-4 py-3">Grade</div>

            <div class="w-2/12 px-4 py-3 text-right">Action</div>
        </div>
        @foreach ($students as $student)
            <div class="flex flex-wrap items-center text-gray-700 border-t-2 border-l-4 border-r-4 border-gray-300">
                <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student[0]->name }}</div>
                <div class="w-2/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student[0]->surname }}</div>
                <div class="w-3/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student[0]->email }}</div>
                <div class="w-1/12 px-4 py-3 text-sm font-semibold text-gray-600 tracking-tight">{{ $student[1] }}</div>
                <div class="w-2/12 flex items-center justify-end px-3">
                    <a href="{{ route('grade.edit',['subjectName'=>$subjectName,'class'=>$classId,'id'=>$gradeNumber,'userId'=>$student[0]->id,"grade=".$student[1]]) }}" class="ml-1">
                        <svg class="h-6 w-6 fill-current text-gray-600 svg-inline--fa fa-pen-square fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 480H48c-26.5 0-48-21.5-48-48V80c0-26.5 21.5-48 48-48h352c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48 48zM238.1 177.9L102.4 313.6l-6.3 57.1c-.8 7.6 5.6 14.1 13.3 13.3l57.1-6.3L302.2 242c2.3-2.3 2.3-6.1 0-8.5L246.7 178c-2.5-2.4-6.3-2.4-8.6-.1zM345 165.1L314.9 135c-9.4-9.4-24.6-9.4-33.9 0l-23.1 23.1c-2.3 2.3-2.3 6.1 0 8.5l55.5 55.5c2.3 2.3 6.1 2.3 8.5 0L345 199c9.3-9.3 9.3-24.5 0-33.9z"></path></svg>
                    </a>
                    <a href="{{--{{ route('students.destroy', $student->id) }}--}}" data-url="{{--{!! URL::route('students.destroy', $student->id) !!}--}}" class="deletegrade ml-1 bg-gray-600 block p-1 border border-gray-600 rounded-sm">
                        <svg class="h-3 w-3 fill-current text-gray-100 svg-inline--fa fa-trash fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path></svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    @include('backend.alert.delete',['name' => 'grade'])
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $( ".deletegrade" ).on( "click", function(event) {
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
