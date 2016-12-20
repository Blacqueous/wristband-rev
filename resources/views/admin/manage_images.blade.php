
@extends('template.admin', ['type' => 1, 'menu' => 2])

@section('title', 'Dashboard')

@section('css')
<!--  -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
@endsection

@section('js')
<!--  -->
        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#eraseTemp[data-toggle=confirmation]').confirmation({
                    title: 'Are you sure?',
                    content: '',
                    onConfirm: function() {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/images/clear',
                            data: {
                                _token: $('meta[name="csrf-token"]').attr('content')
                            },
                            beforeSend: function() {
                                $('.btn').prop('disabled', true);
                                $('.btn').addClass('disabled');
                                toastr.info('Wait a while, we\'re reprocessing.', 'Processing...');
                            },
                            success: function() { },
                            error: function() {
                                toastr.error('Reprocess failed. Try again.', 'Ooops!');
                                $('.btn').prop('disabled', false);
                                $('.btn').removeClass('disabled');
                            },
                        }).done(function(data) {
                            data = $.parseJSON(data);
                            if(data.status) {
                                $('#temp_size').html('0 B');
                                toastr.success('Reprocess successful.', 'Congrats!');
                            } else {
                                toastr.error('Reprocess failed. Try again.', 'Ooops!');
                            }
                            $('.btn').prop('disabled', false);
                            $('.btn').removeClass('disabled');
                        });
                    },
                    onCancel: function() { },
                    popout: true,
                    singleton: true,
                    rootSelector: '[data-toggle=confirmation]',
                    buttons: [
                        {
                            class: 'btn btn-success',
                            label: '',
                            icon: 'fa fa-check',
                            onClick: function() { }
                        },
                        {
                            class: 'btn btn-danger',
                            icon: 'fa fa-remove',
                            cancel: true
                        }
                    ],
                });

            });
        </script>
@endsection

@section('content')
    <h1>Manage Images</h1>
    <br/>
    <p>Total size of temporary images : <span id='temp_size'>{{ $size }}</span></p>
    <a id="eraseTemp" href="javascript:;" class="btn btn-danger" data-toggle="confirmation" data-placement="bottom" data-trigger="hover"><i class="fa fa-eraser"></i> Remove Temp Images</a>
@endsection
