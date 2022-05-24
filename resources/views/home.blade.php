@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        @if(session()->has('success'))
                            <div class="md:flex md:items-center mb-4" style="justify-content: center"> <p class="text-green-500 text-xs italic">
                                    {{ session('success') }}
                                </p></div>
                        @endif

                        @if(Auth::user()->role_id==1)
                            @include('dashboard.admin')
                        @endif

                        @if(Auth::user()->role_id==2)
                            @include('dashboard.teacher')
                        @endif

                        @if(Auth::user()->role_id==3)
                            @include('dashboard.student')
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
