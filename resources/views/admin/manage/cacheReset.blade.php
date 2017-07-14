
@extends('template.admin', ['type' => 1, 'menu' => 3])

@section('title', 'Dashboard')

@section('css')
<!--  -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
@endsection

@section('js')
<!--  -->
        <script type="text/javascript">
            $(document).ready(function(e) {

                $('#resetJSON[data-toggle=confirmation]').confirmation({
                    title: 'Are you sure?',
                    content: '',
                    onConfirm: function() {
                        $.ajax({
                            type: 'POST',
                            url: '/admin/reset',
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
    <h1>Reset All</h1>
    <h4>Reset cached json data <small style="color: #bdbdbd;">(including prices, styles & etc)</small></h4>
    <br/>
    <a id="resetJSON" href="javascript:;" class="btn btn-danger" data-toggle="confirmation" data-placement="bottom" data-trigger="hover"><i class="fa fa-rotate-left"></i> Process Reset</a>
@endsection
