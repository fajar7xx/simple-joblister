@extends('layouts.main')

@section('title')
Post A Job
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endsection

@section('content')
<div class="container">
    <div class="row my-2">
        <div class="col-md-10 offset-1">
            <div class="card p-2">
                <div class="card-header">
                    Create A Job Postings
                </div>
                <div class="card-body">
                    <form action="{{ route('job.store') }}" method="post" role="form">
                        @csrf
                        <div class="form-group">
                            <label for="job_title">Job Title</label>
                            <input type="text" class="form-control @error('job_title') is-invalid @enderror"
                                id="job_title" name="job_title" placeholder="new Job Position"
                                value="{{ old('job_title') }}">
                            @error('job_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="company">Company</label>
                            <input type="text" class="form-control @error('company') is-invalid @enderror" id="company"
                                name="company" placeholder="Company" value="{{ old('company') }}">
                            @error('company')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category" id="category"
                                class="form-control @error('category') is-invalid @enderror">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="location">Location</label>
                                <input type="text" class="form-control @error('location') is-invalid @enderror"
                                    id="location" name="location" value="{{ old('location') }}">
                                @error('location')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact_email">Salary</label>
                                <input type="number" class="form-control @error('salary') is-invalid @enderror"
                                    id="salary" name="salary" value="{{ old('salary') }}" min="0">
                                @error('salary')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="contact_phone">Contact Phone</label>
                                <input type="text" class="form-control @error('contact_phone') is-invalid @enderror"
                                    id="contact_phone" name="contact_phone" value="{{ old('contact_phone') }}">
                                @error('contact_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="contact_email">Contact Email</label>
                                <input type="email" class="form-control @error('contact_email') is-invalid @enderror"
                                    id="contact_email" name="contact_email" value="{{ old('contact_email') }}" min="0">
                                @error('contact_email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            {{-- <label for="description">Description</label> --}}
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror">{!! old('description') !!}</textarea>
                            @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn btn-sm btn-success">Post A job</button>
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
<script src="{{ asset('plugins/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/ckeditor5/build/ckeditor.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#category').select2();
    });
    ClassicEditor
        .create( document.querySelector('#description'),{
            removePlugins: [ 'ImageUpload', 'MediaEmbed' ],
        })
        .catch( error => {
            console.error(error);
        });
</script>
@endpush
