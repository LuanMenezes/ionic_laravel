@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Offer
                        <a href="/offers" class="btn btn-primary btn-sm pull-right">List Offers</a>
                    </div>

                    <div class="panel-body">

                        <form method="POST" action="{{route('offers.update',$offer->id)}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            @include('offers._form')
                            <button class="btn btn-success">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
