@extends('layouts.main')

@section('title')
    Hubungi Kami
@endsection

@section('content')
<div class="jumbotron">
    <div class="container">
      <h1 class="display-3 text-center">Contact Us</h1>
      <div class="col-md-8 offset-2">
         Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolorem incidunt, delectus beatae nemo consequuntur quos. Dolor assumenda dicta quibusdam ducimus, enim similique dolores praesentium? Ex aliquid mollitia laborum dolore numquam.
      </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-2">

            <div id="message"></div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <form method="POST" data-route="{{ route('contact.store') }}" id="form-contact">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="messages">Messages</label>
                    <textarea name="messages" id="messages" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {{-- ajax post data --}}
    <script type="text/javascript">
        $(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#form-contact').submit(function(e){
                // Stop form from submitting normally
                e.preventDefault();

                // alert('form has been submitted');
                const route = $('#form-contact').data('route');
                let form_data = $(this);

                $.ajax({
                    type: 'POST',
                    url: route,
                    data: form_data.serialize(),
                    dataType: 'json',
                    success: function(response){
                        console.log(response);
                        // alert(response.reply.pesan);
                        if(response.reply.status == true){
                            alert('sukses');
                        }else if(response.reply.status == false){
                            alert('gagal kirim');
                        }

                    },
                    error: function(response){
                        // let errors = xhr.responseJSON;
            
                        alert('gagal');
                        console.log('error');
                        // console.log(errors);
                    }
                });
            })
        });
    </script>
@endpush