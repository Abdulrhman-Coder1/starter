@extends('layouts.app')
@section('content')
    <div class="alert alert-success" id="success_msg" style="display: none;">
        تم الحفظ بنجاح
    </div>
<div class="container">
    <div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            {{__('messages.Add your offer')}}
        </div>
        @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('success') }}
            </div>
        @endif

         <form method="POST" id="offerForm" action="" enctype="multipart/form-data">
            @csrf
            {{-- <input name="_token" value="{{csrf_token()}}"> --}}

              <div class="form-group">
                <label for="exampleInputEmail1">أختر صوره العرض</label>
                <input type="file" class="form-control" name="photo">
                @error('photo')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleInputEmail1">{{__('messages.Offer Name ar')}}</label>
                <input type="text" class="form-control" name="name_ar" placeholder="{{__('messages.Offer Name ar')}}">
                @error('name_ar')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
             <div class="form-group">
                <label for="exampleInputEmail1">{{__('messages.Offer Name en')}}</label>
                <input type="text" class="form-control" name="name_en" placeholder="{{__('messages.Offer Name en')}}">
                @error('name_en')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.Offer price')}}</label>
                <input type="text" class="form-control" name="price" placeholder="{{__('messages.Offer price')}}">
                @error('price')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.Offer details ar')}}</label>
                <input type="text" class="form-control" name="details_ar" placeholder="{{__('messages.Offer details ar')}}">
                @error('details_ar')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>
             <div class="form-group">
                <label for="exampleInputPassword1">{{__('messages.Offer details en')}}</label>
                <input type="text" class="form-control" name="details_en" placeholder="{{__('messages.Offer details en')}}">
                @error('details_en')
                <small class="form-text text-danger">{{$message}}</small>
                @enderror
            </div>

            <button id="save-offer" class="btn btn-primary">Save Offer</button>
        </form>
    </div>
</div>

    </div>

@stop

@section('scripts')
    <script>
        $(document).on('click','#save-offer',function (e){
            e.preventDefault();

            var formData = new FormData($('#offerForm')[0]);

            $.ajax({
                type:'post',
                enctype:'multipart/form-data',
                url:"{{route('ajax.offers.store')}}",
                //من شان ترفع اكتر من صورة في دالة اسمها drop zone tools
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data){
                    if (data.status == true){
                        $('#success_msg').show();
                    }
                },error:function (reject){

                }
        });
        });

    </script>
@stop
