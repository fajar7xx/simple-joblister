@extends('layouts.main')

@section('title')
    Home
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
      <h1 class="display-3 text-center">Find A Job</h1>
      <div class="col-md-8 offset-2">
          <form action="" method="GET">
              <div class="form-group">
                  <select name="category" id="category" class="form-control">
                      <option value="">Select a Category</option>
                     @foreach ($categories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                  </select>
              </div>
              <div class="form-group d-flex justify-content-center">
                  <button type="submit" class="btn btn-success">Find Jobs</button>
              </div>

          </form>
      </div>
    </div>
</div>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center">Latest Job</h2>
            <hr>
        </div>

      <div class="col-md-12">
          @forelse ($jobs as $job)
            <div class="card my-2">
              <div class="card-body">
                    <h5 class="card-title">{{ $job->job_title }}</h5>
                    <span>{{ $job->company }}</span>
                    <hr>
                    <p class="card-text">{!! $job->shortDescription() !!}</p>
                    <a href="{{ route('job.show', $job->url) }}" class="btn btn-sm btn-outline-success">See detail</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
              @empty
                  <p class="text-center text-danger">Tidak Lowongan yang terbaru</p>
              @endforelse

            {{-- @foreach ($jobs as $job)    
                <div class="card-body">
                    <h5 class="card-title">{{ $job->job_title }}</h5>
                    <span>{{ $job->company }}</span>
                    <hr>
                    <p class="card-text">{!! $job->shortDescription() !!}</p>
                    <a href="{{ route('job.show', $job->url) }}" class="btn btn-sm btn-outline-success">See detail</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
                </div>
            @endforeach --}}
      </div>


    </div>
    
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        {{ $jobs->links() }}
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>


  </div> <!-- /container -->
@endsection

@push('scripts')
    <script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('#category').select2();
        })
    </script>
@endpush