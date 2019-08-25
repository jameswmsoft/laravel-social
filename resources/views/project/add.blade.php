@include('includes/header_start')

    <!-- Dropzone css -->
    <link href="{{asset('assets/plugins/dropzone/dist/dropzone.css')}}" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="{{asset('vendor/select2/css/select2.css')}}" />
<link rel="stylesheet" href="{{asset('vendor/select2-bootstrap-theme/select2-bootstrap.min.css')}}" />
<link rel="stylesheet" href="{{asset('vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" />

<link rel="stylesheet" href="{{asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" />

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

                                    <form action="{{route('project.addDo')}}" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="picture-container m-b-30">
                                            <div class="picture">
                                                <img src="{{asset('assets/images/default.png')}}" class="picture-src" id="wizardPicturePreview" title="">
                                                <input type="file" name="file" id="wizard-picture" class="">
                                            </div>
                                            <h6 class="">Choose Picture</h6>

                                            @if ($errors->has('file'))
                                                <span class="help-block">
                                                        {{ $errors->first('file') }}
                                                    </span>
                                            @endif

                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Project Name</label>
                                            <div class="col-sm-10">
                                                <input class="form-control" name="name" type="text" value="{{ Request::old('name')}}">
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                        {{ $errors->first('name') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="description" rows="2">{{ Request::old('description')}}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        {{ $errors->first('description') }}
                                                    </span>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="form-group{{ $errors->has('fields') ? ' has-error' : '' }} row">
                                            <label for="example-search-input" class="col-sm-2 col-form-label">Field</label>
                                            <div class="col-sm-10">
                                                <select multiple data-plugin-selectTwo  name="fields[]" class="form-control populate">
                                                    @foreach($fields as $field)
                                                        <option value="{{$field->id}}">{{$field->field}}</option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('fields'))
                                                    <span class="help-block">
                                                        {{ $errors->first('fields') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('members') ? ' has-error' : '' }} row">
                                            <label for="example-email-input" class="col-sm-2 col-form-label">Members</label>
                                            <div class="col-sm-10">
                                                <select multiple data-plugin-selectTwo name="members[]" class="form-control populate">
                                                    @foreach($members as $member)
                                                        @if ($member->id != Auth::user()->id)
                                                            <option value="{{$member->id}}">{{$member->name}}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('members'))
                                                    <span class="help-block">
                                                        {{ $errors->first('members') }}
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                        <label for="example-url-input"{{ $errors->has('keys') ? ' has-error' : '' }} class="col-sm-2 col-form-label">Search Keys</label>
                                        <div class="col-sm-10">
                                            <select id="tags-input-multiple" multiple data-role="tagsinput" name="keys[]" data-tag-class="badge badge-primary">

                                            </select>
                                            @if ($errors->has('keys'))
                                                <span class="help-block">
                                                        {{ $errors->first('keys') }}
                                                    </span>
                                            @endif
                                        </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Acceptance</label>
                                            <div class="col-sm-10 p-t-10">
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="radio1">
                                                        <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1" checked>everyone can follow
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label" for="radio2">
                                                        <input type="radio" class="form-check-input" id="radio2" name="optradio" value="0">needs acceptance
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group m-t-40">
                                            <div>
                                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                                    Submit
                                                </button>
                                                <a href="{{route('project.index')}}" class="btn btn-secondary waves-effect m-l-5">
                                                    Cancel
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div><!-- container -->

</div> <!-- Page content Wrapper -->

</div> <!-- content -->

@include('includes/footer_start')

<!-- Specific Page Vendor -->

<script src="{{asset('vendor/select2/js/select2.js')}}"></script>
<script src="{{asset('vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
<script src="{{asset('vendor/dropzone/dropzone.js')}}"></script>

<script src="{{asset('')}}vendor/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{asset('js/theme.js')}}"></script>

<!-- Theme Custom -->
<script src="{{asset('js/custom.js')}}"></script>

<!-- Theme Initialization Files -->
<script src="{{asset('js/theme.init.js')}}"></script>

<!-- Examples -->
<script src="{{asset('js/examples/examples.advanced.form.js')}}"></script>

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