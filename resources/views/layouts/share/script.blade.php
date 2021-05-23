<!-- jQuerygfdsfddsfgs -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Morris.js charts -->
<script src="/js/raphael-min.js"></script>
<script src="/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="/js/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- Select2 -->
<script src="/plugins/select2/select2.full.min.js"></script>

<!-- InputMask -->
<script src="/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- bootstrap color picker -->
<script src="/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="/plugins/iCheck/icheck.min.js"></script>
<!-- Persian Data Picker -->
<script src="/dist/js/persian-date.min.js"></script>
<script src="/dist/js/persian-datepicker.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
<!-- Page script -->


<!-- CK Editor -->
<script src="/plugins/ckeditor/ckeditor.js"></script>

<!-- DataTables -->
<script src="/plugins/datatables/jquery.dataTables.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap4.js"></script>
<!-- page script -->

<script>



    $(function () {


        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $('.dataTable1').DataTable({
            // "scrollY": 300,
            "scrollX": true,
            "info": true,
            "pagingType": "simple_numbers",
            "pageLength": 5,
            "lengthMenu": [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, "همه"]],
            "paging": true,
            "language": {
                "emptyTable": "هیچ داده‌ای در جدول وجود ندارد",
                "info": "نمایش رکورد _START_ تا _END_ از _TOTAL_ رکورد",
                // "infoEmpty": "نمایش 0 تا 0 از 0 رکورد",
                "infoEmpty": "",
                // "infoFiltered": "(فیلتر شده از _MAX_ رکورد)",
                "infoFiltered": "",
                "infoThousands": ",",
                "lengthMenu": "نمایش _MENU_ رکورد",
                "processing": "در حال پردازش...",
                "search": "جستجو:",
                "zeroRecords": "رکوردی با این مشخصات پیدا نشد",
                "paginate": {
                    "first": "برگه‌ی نخست",
                    "last": "برگه‌ی آخر",
                    "next": "بعدی",
                    "previous": "قبلی"
                },
                "aria": {
                    "sortAscending": ": فعال سازی نمایش به صورت صعودی",
                    "sortDescending": ": فعال سازی نمایش به صورت نزولی"
                },
                "autoFill": {
                    "cancel": "انصراف",
                    "fill": "پر کردن همه سلول ها با ساختار سیستم",
                    "fillHorizontal": "پر کردن سلول های افقی",
                    "fillVertical": "پرکردن سلول های عمودی",
                    "info": "نمونه اطلاعات پرکردن خودکار"
                },
                "buttons": {
                    "collection": "مجموعه",
                    "colvis": "قابلیت نمایش ستون",
                    "colvisRestore": "بازنشانی قابلیت نمایش",
                    "copy": "کپی",
                    "copySuccess": {
                        "1": "یک رکورد داخل حافظه کپی شد",
                        "_": "%ds رکورد داخل حافظه کپی شد"
                    },
                    "copyTitle": "کپی در حافظه",
                    "excel": "اکسل",
                    "pageLength": {
                        "-1": "نمایش همه رکورد‌ها",
                        "1": "نمایش 1 رکورد",
                        "_": "نمایش %d رکورد"
                    },
                    "print": "چاپ",
                    "copyKeys": "برای کپی داده جدول در حافظه سیستم کلید های ctrl یا ⌘ + C را فشار دهید",
                    "csv": "فایل CSV",
                    "pdf": "فایل PDF"
                },
                "searchBuilder": {
                    "add": "افزودن شرط",
                    "button": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "clearAll": "خالی کردن همه",
                    "condition": "شرط",
                    "conditions": {
                        "date": {
                            "after": "بعد از",
                            "before": "بعد از",
                            "between": "میان",
                            "empty": "خالی",
                            "equals": "برابر",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد"
                        },
                        "number": {
                            "between": "میان",
                            "empty": "خالی",
                            "equals": "برابر",
                            "gt": "بزرگتر از",
                            "gte": "برابر یا بزرگتر از",
                            "lt": "کمتر از",
                            "lte": "برابر یا کمتر از",
                            "not": "نباشد",
                            "notBetween": "میان نباشد",
                            "notEmpty": "خالی نباشد"
                        },
                        "string": {
                            "contains": "حاوی",
                            "empty": "خالی",
                            "endsWith": "به پایان می رسد با",
                            "equals": "برابر",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "startsWith": "شروع  شود با"
                        },
                        "array": {
                            "equals": "برابر",
                            "empty": "خالی",
                            "contains": "حاوی",
                            "not": "نباشد",
                            "notEmpty": "خالی نباشد",
                            "without": "بدون"
                        }
                    },
                    "data": "اطلاعات",
                    "deleteTitle": "حذف عنوان",
                    "logicAnd": "و",
                    "logicOr": "یا",
                    "title": {
                        "0": "جستجو ساز",
                        "_": "جستجوساز (%d)"
                    },
                    "value": "مقدار"
                },
                "select": {
                    "1": "%d رکورد انتخاب شد",
                    "_": "%d رکورد انتخاب شد",
                    "cells": {
                        "1": "1 سلول انتخاب شد",
                        "_": "%d سلول انتخاب شد"
                    },
                    "columns": {
                        "1": "یک ستون انتخاب شد",
                        "_": "%d ستون انتخاب شد"
                    },
                    "rows": {
                        "0": "%d رکورد انتخاب شد",
                        "1": "1رکورد انتخاب شد",
                        "_": "%d  انتخاب شد"
                    }
                },
                "thousands": ",",
                "decimal": "اعشاری",
                "searchPanes": {
                    "clearMessage": "همه را پاک کن",
                    "collapse": {
                        "0": "صفحه جستجو",
                        "_": "صفحه جستجو (٪ d)"
                    },
                    "count": "{total}",
                    "countFiltered": "{shown} ({total})",
                    "emptyPanes": "صفحه جستجو وجود ندارد",
                    "loadMessage": "در حال بارگیری صفحات جستجو ...",
                    "title": "فیلترهای فعال - %d"
                },
                "loadingRecords": "در حال بارگذاری...",
                "datetime": {
                    "previous": "قبلی",
                    "next": "بعدی",
                    "hours": "ساعت",
                    "minutes": "دقیقه",
                    "seconds": "ثانیه",
                    "amPm": [
                        "صبح",
                        "عصر"
                    ]
                },
                "editor": {
                    "close": "بستن",
                    "create": {
                        "button": "جدید",
                        "title": "ثبت جدید",
                        "submit": "ایجــاد"
                    },
                    "edit": {
                        "button": "ویرایش",
                        "title": "ویرایش",
                        "submit": "به‌روزرسانی"
                    },
                    "remove": {
                        "button": "حذف",
                        "title": "حذف",
                        "submit": "حذف"
                    },
                    "multi": {
                        "restore": "واگرد"
                    }
                }
            },
        });

        $('.dataTable2').DataTable({
            "paging": true,
            "language": {
                "paginate": {
                    "next": "بعدی",
                    "previous": "قبلی"
                }
            },
            "info": false,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "autoWidth": false
        });

        ClassicEditor.create(document.querySelector('#editor1')).then(function (editor) {
                // The editor instance
            })
            .catch(function (error) {
                console.error(error)
            })


        $('.textarea').wysihtml5({
            toolbar: {fa: true}
        })
        //Initialize Select2 Elements
        $('.select2').select2()

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {'placeholder': 'mm/dd/yyyy'})
        //Money Euro
        $('[data-mask]').inputmask().persianDatepicker(
            {
                // inline: true,
                calendar: {
                    persian: {
                        locale: 'fa'
                    }
                },
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.observer-example-alt'

            }
        )

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()


        $('.normal-example').persianDatepicker(
            {
                initialValue: false,
                calendar: {
                    persian: {
                        locale: 'fa'
                    }
                },
                observer: false,
                format: 'YYYY/MM/DD',
                altField: '.observer-example-alt'  ,
                // placeholder: 'yyyy/mm/dd'

            }
        )
    })


</script>

