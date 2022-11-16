@extends('front::layouts.master')
@section('title',__('word.login'))
@section('content')
<main class="flex-shrink-0">
    <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="m-2">
                    @include('front::components.messages')
                </div>
                <main class="form-signin w-100 m-auto">
                    <form action="{{route('auth.login.action')}}" method="post">
                        @csrf
                        <h1 class="h3 mb-3 fw-normal">{{__('word.login')}}</h1>
                        <input type="hidden" name="intend" value="{{request()->input('redirect')}}">
                        <div class="form-floating m-2">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="{{__('word.email')}}" required>
                            <label for="floatingInput">{{__('word.email')}}</label>
                        </div>
                        <div class="form-floating m-2">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="{{__('word.password')}}" required>
                            <label for="floatingPassword">{{__('word.password')}}</label>
                        </div>

                        <div class="checkbox mb-3">
                        </div>
                        <button class="w-100 btn btn-lg btn-primary" type="submit">{{__('word.login')}}</button>
                    </form>
                </main>
            </div>
        </div>
    </div>
</main>
@endsection
