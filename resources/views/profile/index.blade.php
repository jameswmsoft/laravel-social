@include('includes/header_start')

<!-- Dropzone css -->
<link href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">

@include('includes/header_end')

<!-- ==================
     PAGE CONTENT START
     ================== -->

<div class="page-content-wrapper">

    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body m-5 project_body">
                        <div class="row">

                            <div class="col-md-6">
                                @include('includes/partials/alerts')

                                <form action="{{route('profile.edit')}}" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="picture-container m-b-30">
                                        <div class="picture">
                                            @if(Auth::user()->avatar == 'male.png')
                                            <img src="{{asset('assets/images/default-avatar-male.png')}}" class="picture-src" id="wizardPicturePreview" title="">
                                            @else
                                                <img src="{{asset('uploads/user')}}/{{Auth::user()->avatar}}" class="picture-src" id="wizardPicturePreview" title="">
                                            @endif
                                            <input type="file" name="input_img" id="wizard-picture" class="">
                                        </div>
                                        <h6 class="">Choose Picture</h6>
                                        @if ($errors->has('input_img'))
                                            <span class="help-block">
                                                        {{ $errors->first('input_img') }}
                                                    </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                        <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="name" id="example-text-input"  value="{{ Request::old('name')  ?: Auth::user()->name }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} row">
                                        <label for="example-search-input" class="col-sm-2 col-form-label">Age</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" name="age"  value="{{ Request::old('age')  ?: Auth::user()->getAge() }}" id="example-search-input">
                                            @if ($errors->has('age'))
                                                <span class="help-block">
                                                        {{ $errors->first('age') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
                                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email" name="email" value="{{ Request::old('email')  ?: Auth::user()->email }}" id="example-email-input">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                        {{ $errors->first('email') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }} row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="city" value="{{ Request::old('city') ?: Auth::user()->getCity() }}" id="example-url-input">
                                            @if ($errors->has('city'))
                                                <span class="help-block">
                                                        {{ $errors->first('city') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('study') ? ' has-error' : '' }} row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Studies</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" name="study" value="{{ Request::old('study') ?: Auth::user()->getStudy() }}" id="example-url-input">
                                            @if ($errors->has('study'))
                                                <span class="help-block">
                                                        {{ $errors->first('study') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('interest') ? ' has-error' : '' }} row">
                                        <label for="example-url-input" class="col-sm-2 col-form-label">Interests and capabilities
                                        </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" type="text" name="interest" id="example-url-input">{{ Request::old('interest') ?: Auth::user()->getInterest() }}</textarea>
                                            @if ($errors->has('interest'))
                                                <span class="help-block">
                                                        {{ $errors->first('interest') }}
                                                    </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group m-t-40">
                                        <div>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                Submit
                                            </button>
                                            <a href="{{route('profile.index')}}" class="btn btn-secondary waves-effect m-l-5">
                                                Cancel
                                            </a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!-- Dropzone js -->
<script src="{{asset('assets/plugins/dropzone/dist/dropzone.js')}}"></script>
<script>
    $(document).ready(function(){
// Prepare the preview for profile picture
        $("#wizard-picture").change(function(){
            readURL(this);
        });
    });
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#wizardPicturePreview').attr('src', e.target.result).fadeIn('slow');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@include('includes/footer_end')