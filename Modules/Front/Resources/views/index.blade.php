@extends('front::layouts.master')
@section('title',__('word.title'))
@section('content')
<main class="flex-shrink-0">
    <div class="container">
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="m-2">
                    @include('front::components.messages')
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @foreach($foods as $food)
                     <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{asset($food->image)}}" class="bd-placeholder-img card-img-top">
                            <div class="card-body">
                                <h4 class="card-text">{{$food->title}}</h4>
                                <p>{{$food->description}}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a @if($food->buffer>=1) href="{{route('order.create',$food)}}"  @endif class="btn btn-sm btn-outline-secondary">{{__('word.order')}}</a>
                                    </div>
                                    <small class="text-muted">{{$food->prepare_minutes}} {{__('word.minutes')}}</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach


                </div>
            </div>
        </div>

    </div>

    <div class="d-flex justify-content-center">{!! $foods->appends($_GET)->links() !!}</div>

</main>
@endsection
