@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">List Offers
                    <a href="{{route('offers.create')}}" class="btn btn-primary btn-sm pull-right">New Offer</a>
                </div>

                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Validity</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($offers as $offer)
                                <tr>
                                    <td>{{$offer->id}}</td>
                                    <td>{{$offer->title}}</td>
                                    <td>{{$offer->description}}</td>
                                    <td>{{$offer->price_f}}</td>
                                    <td>{{$offer->validity}}</td>
                                    <td><img src="{{asset($offer->img)}}" alt="{{$offer->title}}" width="30"></td>
                                    {{--<td><img src="{{$offer->img}}" alt="{{$offer->title}}" width="30"></td>--}}
                                    <td>
                                        <form method="POST" action="{{route('offers.destroy', $offer->id)}}" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <a class="btn btn-default btn-sm" href="{{route('offers.edit', $offer->id)}}">Edit</a>
                                            <button class="btn btn-default btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot></tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
