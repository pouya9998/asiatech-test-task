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
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>#</td>
                                @if(auth()->user()->type == 'admin')
                                    <td>{{__('word.user')}}</td>
                                @endif
                                <td>{{__('word.food')}}</td>
                                <td>{{__('word.date')}}</td>
                                <td>{{__('word.status')}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $key=>$order)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                @if(auth()->user()->type == 'admin')
                                    <td>{{$order->user->name}}</td>
                                @endif
                                <td>{{$order->food->title}}</td>
                                <td>{{date($order->created_at)}}</td>
                                @if(auth()->user()->type == 'user')
                                <td>{{$order->status}}</td>
                                @else
                                    <td>
                                    <form id="form{{$order->id}}" action="{{route('order.status',$order->id)}}" method="Post">
                                        @csrf
                                        <select id="select" name="status" class="form-control" onchange="document.getElementById('form'+{{$order->id}}).submit()">
                                            <option @if($order->status == 'pending') selected @endif value="pending">{{__('word.pending')}}</option>
                                            <option @if($order->status == 'accept') selected @endif value="accept">{{__('word.accept')}}</option>
                                            <option @if($order->status == 'reject') selected @endif value="reject">{{__('word.reject')}}</option>
                                        </select>
                                    </form>
                                    </td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <th scope="row">#</th>
                                    <th scope="row"></th>
                                    <td></td>
                                    <td>{{__('word.no_data')}}</td>
                                    <td></td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="d-flex justify-content-center">{!! $orders->appends($_GET)->links() !!}</div>

    </main>
@endsection

