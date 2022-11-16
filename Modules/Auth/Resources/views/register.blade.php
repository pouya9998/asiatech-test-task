@extends('front::layouts.master')
@section('title',__('word.register'))
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="m-2">
                        @include('front::components.messages')
                    </div>
                    <main class="form-signin w-100 m-auto">
                        <form action="{{route('auth.register.action')}}" method="post">
                            @csrf
                            <h1 class="h3 mb-3 fw-normal">{{__('word.register')}}</h1>

                            <div class="form-floating m-2">
                                <input name="name" type="text" class="form-control" id="floatingInput" placeholder="{{__('word.name')}}">
                                <label for="floatingInput">{{__('word.name')}}</label>
                            </div>

                            <div class="form-floating m-2">
                                <input name="email" type="email" class="form-control" id="floatingInput" placeholder="{{__('word.email')}}">
                                <label for="floatingInput">{{__('word.email')}}</label>
                            </div>
                            <div class="form-floating m-2">
                                <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="{{__('word.password')}}">
                                <label for="floatingPassword">{{__('word.password')}}</label>
                            </div>

                            <div class="form-floating m-2">
                                <input name="password_confirmation" type="password" class="form-control" id="floatingPassword" placeholder="{{__('word.password_confirm')}}">
                                <label for="floatingPassword">{{__('word.password_confirm')}}</label>
                            </div>

                            <div class="checkbox mb-3">
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">{{__('word.register')}}</button>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </main>
@endsection
