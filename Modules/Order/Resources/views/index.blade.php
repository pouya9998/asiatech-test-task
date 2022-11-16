@extends('front::layouts.master')
@section('title',__('word.title'))
@section('content')
    <main class="flex-shrink-0">
        <div class="container">
            <div class="album py-5 bg-light">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>{{__('word.user')}}</td>
                                <td>{{__('word.food')}}</td>
                                <td>{{__('word.date')}}</td>
                                <td>{{__('word.status')}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($orders as $order)
                            <tr>
                                <th scope="row">#</th>
                                <td>{{$order->user->name}}</td>
                                <td>{{$order->food->title}}</td>
                                <td>{{date($order->created_at)}}</td>
                                <td>{{$order->status}}</td>
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

