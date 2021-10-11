<!DOCTYPE html>
<html>
@include('layouts.sections.header')

<body class="hold-transition sidebar-mini">

<div class="wrapper">


    @include('layouts.sections.top-menu')

    @include('layouts.sections.sidebar')
    <div class="content-wrapper">

        @yield('content')
    </div>

</div>

@include('layouts.common.alertModalDelete')
@include('layouts.share.script')

<script>

    function deleteItem(route) {
        document.getElementById("itemDelete").action = route;
    }

    $('#formSearch').validate({
        rules: {
            phrase: {required: true},
            field: {required: true},
        },
        messages: {
            phrase: {required: "عبارت مورد جستجو وارد نشده است"},
            field: {required: "فیلد مورد جستجو انتخاب نشده است"},
        },
        errorPlacement: function (error, element) {
            var n = element.attr('name');
            $('#error_' + n).addClass('show');
            $('#error_' + n).removeClass('hide');
            error.appendTo("#error_" + n);
        },
    });

    $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
    });

    $('.select2').select2()

    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass: 'iradio_minimal-blue'
    })
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass: 'iradio_minimal-red'
    })
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass: 'iradio_flat-green'
    });


</script>


@yield('scriptsExtra')


</body>

</html>
