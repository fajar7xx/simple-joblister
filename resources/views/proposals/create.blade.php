@extends('layouts.main')

@section('title')
    Apply Job
@endsection

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-md-10 offset-1">
            <div class="card p-2">
                <div class="card-header">
                    Posting Job for {{ $job->job_title }}
                </div>
                <div class="card-body">
                    <form action="{{ route('apply.job.store') }}" method="post" role="form" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <p class="text-justify text-danger">Write your description to apply this job and upload your resume with pdf file max 1MB</p>
                        <div class="form-group">
                            {{-- <label for="description">Description</label> --}}
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" id="file" class="form-control-file @error('file') is-invalid @enderror" accept="application/pdf">
                            @error('file')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-sm btn-success">Apply Proposal</button>
                            <a href="{{ url('/') }}" class="btn btn-sm btn-danger">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="{{ asset('plugins/ckeditor5/build/ckeditor.js') }}"></script>
<script>
    ClassicEditor
        .create( document.querySelector('#description'),{
            alignment: {
                options: [ 'left', 'right' ]
            },
            toolbar: [
                'heading', '|', 'bulletedList', 'numberedList', 'alignment', 'undo', 'redo'
            ]
        })
        .catch( error => {
            console.error(error);
        });
</script>
@endpush