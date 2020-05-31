@extends('layouts.main')

@section('title')
    {{ $detail->job_title }}
@endsection

@section('content')
    <div class="container my-2">
        <div class="row">
            <div class="col-md-12">
                @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ $detail->job_title }}
                        </h3>
                        <small>Created at : {{ $detail->post_date() }}</small>
                        <hr>
                        <p>Category : {{ $detail->category->name }}</p>
                        <p>Company : {{ $detail->company }}</p>
                        <p>Location: {{ $detail->location }}</p>
                        <p>Salary : {{ $detail->currency() }}</p>
                        <p>Phone : {{ $detail->contact_phone }}</p>
                        <p>Email : {{ $detail->contact_email }}</p>
                        <p>{!! $detail->description !!}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                @auth
                    @cannot('update', $detail)
                        <div class="card my-2">      
                            <div class="card-body">
                            {{-- @if (Auth::id() == $proposals->user->fisrt()->user_id) --}}
                            {{-- {!! Auth::id() !!} --}}
                            @if ($proposals->contains('user_id', Auth::id()))
                                <span class="badge badge-success d-flex justify-content-center">You Have Been Applied</span>
                            @else
                                <a href="{{ route('apply.job', $detail->url) }}" class="btn btn-block btn-sm btn-outline-success">Apply This Job</a>
                            @endif
                            </div>
                        </div>
                    @endcannot    
                @endauth
                <div class="card">
                    <div class="card-header text-center">About Recruiter</div>
                    <div class="d-flex justify-content-center p-2">
                        @if ($detail->user->profile->image == null)
                        <img src="{{ asset('images/profiles/user.png') }}" class="card-img-top img-fluid" style="width: 80%; height: aut0;">
                        @else
                        ada kok gambarnya
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="card-title text-center text-uppercase">
                            {{ $detail->user->name }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @can('view', $detail) 
        <div class="row my-4">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped" width="100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Apply At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1
                                    @endphp
                                    @foreach ($proposals as $proposal)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <a href="{{ route('profile.show', $proposal->user->id) }}">
                                                    {{ $proposal->user->name }}</td>
                                                </a>
                                            <td>{{ formatDate($proposal->created_at) }}</td>
                                            <td>
                                                <a href="{{ route('proposal.show', $proposal->id) }}" class="btn btn-sm btn-outline-success">View Proposal</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endcan


    </div>
@endsection