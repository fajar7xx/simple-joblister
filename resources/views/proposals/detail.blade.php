@extends('layouts.main')

@section('title')
    Proposal Detail
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card mt-2">
                    <div class="card-header">Detail</div>
                    <div class="card-body">
                        <p class="text-justify">{!! $proposal->description !!}</p>
                        <a href="{{ asset('storage/' . $proposal->file) }}" target="blank">See Resume</a>
                    </div>
                    <div class="card-footer">
                        terima
                        tolak
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection