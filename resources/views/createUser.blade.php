@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create User') }}</div>

                    <div class="card-body">
                        @if(session()->has('success'))
                            <div style="color: green;" class="text-center">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session()->has('error'))
                            <div style="color: red;" class="text-center">
                                {{ session('error') }}

                            </div>
                        @endif
                        @foreach($errors->all() as $error)
                            <div style="color: red;" class="text-center">
                                {{ $error }}
                            </div>
                        @endforeach
                        <form action="{{route('create')}}" method="post" id="myForm">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input class="form-control" id="name" type="text" pattern="([A-Z])[a-z]+"
                                           title="Name must start with only one uppercase and shouldn't contain numbers" minlength="4" maxlength="50"
                                           name="name"
                                           value="{{ old('name') }}"  required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="surname"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>
                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                           class="form-control @error('surname') is-invalid @enderror" name="surname"
                                           pattern="([A-Z])[a-z]+" title="Surname must start with only one uppercase"
                                           minlength="4" maxlength="50"
                                           value="{{ old('surname') }}" required="">

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="username" id="username"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input type="text" pattern="[A-Za-z][A-Za-z0-9_]{7,29}$" title="Username must contain only letters or numbers"
                                           name="username"
                                           class="form-control" value="{{ old('username') }}"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control" name="password"
                                           pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$"
                                           title="Please enter a valid password"
                                           required ="">

                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" id="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input type="text" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address"
                                           name="email"
                                           class="form-control" value="{{ old('email') }}"
                                           required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label text-md-end" for="role">Role(choose):</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="role_id" id="role">
                                        <option value="" selected disabled> Plase select :</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Mesues</option>
                                        <option value="3">Student</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Edit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
