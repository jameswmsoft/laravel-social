       
        <!-- App js -->
        <script src="{{asset('assets/js/app.js')}}"></script>

        <!-- Theme Base, Components and Settings -->
        <script src="{{asset('')}}js/theme.js"></script>

        <!-- Theme Custom -->
        <script src="{{asset('')}}js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script src="{{asset('')}}js/theme.init.js"></script>

        <script src="{{asset('toastor/js/toastr.min.js')}}"></script>

        <script>
            $('#search').keyup(function (e) {
                if (e.keyCode == 13){
                    $('#searchForm').submit();
                }else {
                    var query = $(this).val();
                    if(query != '') {

                        _token = $('input[name="_token"]').val();
                        $.ajax({
                            url: "{{route('top.search.fetch')}}",
                            method: "POST",
                            data: {query: query, _token: _token},
                            success: function (data) {

                                $('#resultList').css({'display':'block'});
                                $('#resultList').html(data);
                            }
                        })
                    }
                }
            });

            $('.page-content-wrapper').on('click', function () {
                $('#resultList').css({'display':'none'});
            })
        </script>

        </div>
        @include('includes/partials/toastor')
    </body>
</html>