@extends('layouts.main')

@section('title')
    {{ $profile->user->name }}
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="d-flex justify-content-center m-2">
                        @if ($profile->image == null)
                            <img src="{{ asset('images/profiles/user.png') }}" class="card-img-top img-fluid" style="width: 80%; height: aut0;">
                        @else
                            ada kok gambarnya
                        @endif
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">{{ $profile->user->name }}</h5>
                      <p class="card-text">{{ $profile->user->email }}</p>
                      <p class="card-text">Registered at: {{ date('d-M-Y', strtotime($profile->user->created_at)) }}</p>
                      @can('update', $profile)
                        <a href="#" class="btn btn-sm btn-primary">Edit Profile</a>
                      @endcan
                    </div>
                  </div>
                  {{-- <ul class="list-group list-group-flush">
                      <li class="list-group-item"><a href="">Profile</a></li>
                      <li class="list-group-item"><a href="">Jobs</a></li>
                      <li class="list-group-item"><a href="">Proposals</a></li>
                    </ul> --}}
                    @can('view', $profile)
                        <div class="card mt-2">
                            <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a href="#general" class="nav-link active" id="general-tab" data-toggle="tab" role="tab" aria-controls="general" aria-selected="true">General</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#job" class="nav-link" id="job-tab" data-toggle="tab" role="tab" aria-controls="job" aria-selected="true">Jobs Posts</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#proposal" class="nav-link" id="proposal-tab" data-toggle="tab" role="tab" aria-controls="proposal" aria-selected="true">Proposals</a>
                                </li>
                            </ul>
                        </div>
                    @endcan
            </div>
            <div class="col-md-9">
                @can('view', $profile)        
                <div class="tab-content">
                  {{-- product edit --}}
                  <div class="tab-pane active" id="general" role="tabpanel" aria-labelledby="general-tab">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="d-block w-100">Description</h3>
                          </div>
                          <div class="card-body text-justify">
                              {!! $profile->description !!}
                          </div>
                      </div>
                  </div>
                  {{-- image edit --}}
                  <div class="tab-pane" id="job" role="tabpanel" aria-labelledby="job-tab">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="d-block w-100">Job Posts</h3>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table-sm table-striped table-hover" width="100%">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Job Title</th>
                                              <th>Category</th>
                                              <th>Location</th>
                                              <th>Company</th>
                                              <th>Salary</th>
                                              <th>Created At</th>
                                              <th>Actions</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          @foreach ($jobs as $job)
                                              <tr>
                                                  <td></td>
                                                  <td>{{ $job->job_title }}</td>
                                                  <td>{{ $job->category->name }}</td>
                                                  <td>{{ $job->location }}</td>
                                                  <td>{{ $job->company }}</td>
                                                  <td>{{ $job->currency() }}</td>
                                                  <td>{{ $job->post_date() }}</td>
                                                  <td>
                                                      action nnti aja
                                                  </td>
                                              </tr>
                                          @endforeach
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="proposal" role="tabpanel" aria-labelledby="proposal-tab">
                      <div class="card">
                          <div class="card-header">
                              <h3 class="d-block w-100">Proposals</h3>
                          </div>
                          <div class="card-body">
                              <div class="table-responsive">
                                  <table class="table table-hover table-striped">
                                      <thead>
                                          <tr>
                                              <th>#</th>
                                              <th>Jobs to</th>
                                              <th>Submit</th>
                                              <th>Status</th>
                                          </tr>
                                      </thead>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                @endcan

                @if (Auth::id() != $profile->user_id)
                    
                <div class="card">
                    <div class="card-header">
                        <h3 class="d-block w-100">Description</h3>
                    </div>
                    <div class="card-body text-justify">
                        {!! $profile->description !!}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection