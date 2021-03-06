<!-- jQuery -->
<script src="{{asset('public/adminlte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<!-- Select2 -->
<script src="{{asset('public/adminlte/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{asset('public/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')}}"></script>
<!-- InputMask -->
<script src="{{asset('public/adminlte/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/inputmask/jquery.inputmask.min.js')}}"></script>
<!-- date-range-picker -->
<script src="{{asset('public/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap color picker -->
<script src="{{asset('public/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('public/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Bootstrap Switch -->
<script src="{{asset('public/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
<!-- BS-Stepper -->
<script src="{{asset('public/adminlte/plugins/bs-stepper/js/bs-stepper.min.js')}}"></script>
<!-- dropzonejs -->
<script src="{{asset('public/adminlte/plugins/dropzone/min/dropzone.min.js')}}"></script>

<script src="{{asset('public/adminlte/dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('public/adminlte/dist/js/simple.money.format.js')}}"></script>



<!-- Summernote -->
<script src="{{asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- CodeMirror -->
<script src="{{asset('public/adminlte/plugins/codemirror/codemirror.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/codemirror/mode/css/css.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/codemirror/mode/xml/xml.js')}}"></script>
<script src="{{asset('public/adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')}}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/adminlte/dist/js/demo.js')}}"></script>



<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--  js s??? d???ng bi???u ????? Morris.Bar(h??nh thanh k???o) -->

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
{{--<script src="{{asset('public/ckfinder.js')}}"></script>--}}

<!-- Page specific script -->
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<script>
    $(function () {
        // Summernote
        $('#summernotes').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<script>
    $(function () {
        // Summernote
        $('#summernotes1').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>

<script>
    $(function () {
        // Summernote
        $('#summernotes2').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    })
</script>


<script>
    $(".select2_init").select2({
        placeholder: "ch???n vai tr??",
    });
</script>

{{--S??? s???ng th?? vi???n Jquery  d??ng Datepicker(??e pic c??) jquery th??m l???ch --}}

<script type="text/javascript">

    $( function() {
        $( "#datepicker").datepicker({// #datepicker l?? id="datepicker".datepicker
            prevText:"Th??ng tr?????c",
            nextText:"Th??ng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: [ "Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t" ],
            duration: "slow"
        });
        $( "#datepicker2").datepicker({
            prevText:"Th??ng tr?????c",
            nextText:"Th??ng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: [ "Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t" ],
            duration: "slow"
        });
    } );

</script>



{{-- h??m   $(document).ready(function() n??y nh???n gi?? tr??? tr??? v??? h??m
 $('.dashboard-filter').change(function() gi?? tr??? tr??? v??? ki???u
 JSON key value ????? in ra bi???u ?????--}}


{{--price_format gi?? ti???n khi nh???p  --}}
<script type="text/javascript">
    $('.price_format').simpleMoneyFormat();

</script>

{{--price_format gi?? ti???n khi nh???p  --}}
<script type="text/javascript">
    $('#price_format').simpleMoneyFormat();

</script>
{{--ajax th??ng k?? doanh s??? ????n h??ng  --}}
<script type="text/javascript">
    $(document).ready(function(){

        chart60daysorder();

        //s??? d???ng bi???u ????? Morris.Bar(h??nh thanh k???o)
        //var chart l?? bi???t ch???a to??n b??? d??? li???u bi???u ?????
        var chart = new Morris.Bar({

            element: 'chart',// b???t d??? li???u id="chart"
            //option chart
            lineColors: ['#819C79', '#fc8710','#FF6541', '#516fec', '#03c6fc'],// hi???n th??? color
            parseTime: false,// hi???n th??? ng??y gi???
            hideHover: 'auto',// t??? ?????ng ????ng khi di chuy???n chu???t ra ngo??i
            xkey: 'period',//t????ng ???ng v???i ng??y , kho???ng th???i gian rder_date,
            ykeys: ['order','sales','profit','quantity'],//c??c key
            labels: ['????n h??ng','doanh s???','l???i nhu???n','s??? l?????ng']//labels l?? t??n c???a c??c key

        });


//H??m  n??y m???c ?????nh  t??? ?????ng ch???y l???y ra bi???u ????? l???c 30 ng??y ho???c 60 ng??y
        function chart60daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/days-order')}}",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},

                success:function(data)
                {
                    chart.setData(data);
                }
            });
        }


// c???u l???nh $('.dashboard-filter').change(function() c?? ngh??a l?? ng?????i d??ng c?? ch???n select
        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();//l???y ra gi?? tr??? value khi select
            var _token = $('input[name="_token"]').val();//sau ???? g???i token
            // alert(dashboard_value);
            // khi l???y ???????c value r???i gi??? g???i qua b???ng m?? ajxa
            $.ajax({
                //g???i qua 1 urlL = /dashboard-filter
                url:"{{url('/dashboard-filter')}}",
                method:"POST",// h??nh th???c g???i l?? post
                dataType:"JSON",// tr??? v??? ki???u JSON key value
                data:{dashboard_value:dashboard_value,_token:_token},
                //n???u th??nh c??ng
                success:function(data)
                {
                    // tr??? v??? chart.setData(data) ngh??a l?? tr??? v??? data ki???u JSON hi???n th??? bi???u ?????
                    chart.setData(data);
                }
            });

        });

        // B???t s??? ki???n id="btn-dashboard-filter" l???c theo ng??y th??ng ???????c thay ?????i thay ?????i
        $('#btn-dashboard-filter').click(function(){
            // alert('ok !');
            var _token = $('input[name="_token"]').val();

            var from_date = $('#datepicker').val();// l???y ra gi?? tr??? t??? ng??y
            var to_date = $('#datepicker2').val();//l???y ra gi?? tr??? ?????n ng??y

            // alert(_token);
            // alert(from_date);
            // alert(to_date);
            //l???y ???????c gi?? tr??? s??? d???ng ajax ????? g???i gi?? tr??? qua controller b???ng
            //url c??i route l?? '/filter-by-date'
            $.ajax({
                url:"{{url('/filter-by-date')}}",
                method:"POST",
                dataType:"JSON",//tr??? v??? JSON l?? key v?? value cho bi???u ????? c???a m??nh
                data:{from_date:from_date,to_date:to_date,_token:_token},
                // Khi th??nh c??ng th?? m???i d??? li???u l???y ???????c m?? ng??y l???c ra tr??? v??? ki???u tr??? v??? JSON cho bi???u ????? c???a m??nh
                success:function(data)
                {
                    chart.setData(data);// c??u l???nh n??y tr??? v??? chart data hi???n th??? bi???u ?????
                }
            });

        });

    });

</script>

{{--Th???ng k?? truy c???p t???ng b??i vi???t , s??? l?????ng , c??ng nh?? ????n h??ng
bi???u ????? Morris chart donut example--}}
<script type="text/javascript">
    $(document).ready(function(){

        //     });
        var donut = Morris.Donut({
            element: 'donut',
            resize: true,
            colors: [
                '#a8328e',
                '#61a1ce',
                '#ce8f61',
                '#f5b942',
                '#4842f5'

            ],
            //labelColor:"#cccccc", // text color
            //backgroundColor: '#333333', // border color
            data: [
                // hi???m thi s???n ph???m ?????m ???????c ??? b??n h??m show_dashboard()


                {label:"S???n ph???m", value:<?php echo $app_product ?>},
                {{--{label:"Bai viet", value:<?php echo $app_post ?>},--}}
                {label:"????n h??ng", value:<?php echo $app_order ?>},
                {{--{label:"Video", value:<?php echo $app_video ?>},--}}
                {label:"Kh??ch h??ng", value:<?php echo $app_customer ?>}
                {{--{label:"San pham", value:<?php echo $product ?>},--}}

                {{--{label:"Don hang", value:<?php echo $order ?>},--}}

                {{--{label:"Khach hang", value:<?php echo $customer ?>}--}}
            ]
        });

    });
</script>

<script>
    $(function () {
        // //Initialize Select2 Elements
        // $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker hi???n th??? l???ch
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date picker hi???n th??? l???ch
        //Date range picker
        // $('#reservation').daterangepicker()
        // //Date range picker with time picker
        // $('#reservationtime').daterangepicker({
        //     timePicker: true,
        //     timePickerIncrement: 30,
        //     locale: {
        //         format: 'MM/DD/YYYY hh:mm A'
        //     }
        // })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        })

        $("input[data-bootstrap-switch]").each(function(){
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        })

    })


</script>

<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
    var options = {
        filebrowserImageBrowseUrl: 'laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: 'laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: 'laravel-filemanager?type=Files',
        filebrowserUploadUrl: 'laravel-filemanager/upload?type=Files&_token='
    };
</script>
<script>
    CKEDITOR.replace('my-editor', options);
</script>

<script>
    $(function () {
        $(".tags_select_choose").select2({
            tags: true,// option ch???n tags l?? tags = true
            tokenSeparators: [',']
        })

        $(".select2_init").select2({
            placeholder: "Ch???n danh m???c",
            allowClear: true
        });


        $(".select2_in").select2({
            placeholder: "Ch???n danh m???c",
            allowClear: true
        });
        // ?????i bi???n var th??nh let
        // let editor_config = {
        //     path_absolute : "/",
        //     // ?????i t??n selector my-editor th??nh tinymce_editor_init
        //     // sau ???? coppy class tinymce_editor_init v??o file add.blade.php
        //     selector: "textarea.tinymce_editor_init",
        //     relative_urls: false,
        //     plugins: [
        //         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //         "searchreplace wordcount visualblocks visualchars code fullscreen",
        //         "insertdatetime media nonbreaking save table contextmenu directionality",
        //         "emoticons template paste textcolor colorpicker textpattern"
        //     ],
        //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        //
        //     file_browser_callback : function(field_name, url, type, win) {
        //         let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        //         let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        //
        //         let cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
        //         if (type == 'image') {
        //             cmsURL = cmsURL + "&type=Images";
        //         } else {
        //             cmsURL = cmsURL + "&type=Files";
        //         }
        //
        //         tinyMCE.activeEditor.windowManager.open({
        //             file : cmsURL,
        //             title : 'Filemanager',
        //             width : x * 0.8,
        //             height : y * 0.8,
        //             resizable : "yes",
        //             close_previous : "no"
        //         });
        //     }
        // };
        //
        // tinymce.init(editor_config);





        // let editor_config = {
        //     path_absolute : "/",
        //     selector: "textarea.tinymce_editor_init",
        //     plugins: [
        //         "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        //         "searchreplace wordcount visualblocks visualchars code fullscreen",
        //         "insertdatetime media nonbreaking save table contextmenu directionality",
        //         "emoticons template paste textcolor colorpicker textpattern"
        //     ],
        //     toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        //     relative_urls: false,
        //     file_browser_callback : function(field_name, url, type, win) {
        //         let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        //         let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        //
        //         let cmsURL = editor_config.path_absolute + 'filemanager?field_name=' + field_name;
        //         if (type == 'image') {
        //             cmsURL = cmsURL + "&type=Images";
        //         } else {
        //             cmsURL = cmsURL + "&type=Files";
        //         }
        //
        //         tinyMCE.activeEditor.windowManager.open({
        //             file : cmsURL,
        //             title : 'Filemanager',
        //             width : x * 0.8,
        //             height : y * 0.8,
        //             resizable : "yes",
        //             close_previous : "no"
        //         });
        //     }
        // };
        //
        // tinymce.init(editor_config);
        //
        // $(document).on('change', '.preview_image_detail', loadPreviewMutipleImage);

    })
</script>

<!-- impost th?? vi???n -->
{{--<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>--}}



<script type="text/javascript">
    function actionDelete(event){
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let that = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'GET',
                    url: urlRequest,
                    success: function (data) {
                        if (data.code == 200) {
                            that.parent().parent().remove();
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }

                    },
                    error: function () {

                    }
                });


            }
        })

    }

    $(function () {
        $(document).on('click', '.action_delete', actionDelete);
    });
</script>



{{--S??? d???ng ajax update select tr???ng th??i ????n h??ng (order_status)
d???a v??o class order_detail--}}
<script type="text/javascript">
    {{--g???i class order_details b??n form select
    .change ngh??a l??  c?? thay ?????i l???a ch???n (select)--}}
    $('.order_details').change(function(){
        <!-- s??? d???ng alert ra message test -->
        // alert('???? change');
        // <!--l???y ???????c var order_status = $(this) ngh??a l?? c???a class .order_details c???a class select
        //  .val()ngh??a l?? l???y ra value=1 c???a option -->
        var order_status = $(this).val();

        // <!-- L???y ???????c var order_id d???a v??o order_id ????n h??ng ??? b???ng order ????? update order_status
        //  = $(this) ngh??a l?? c???a class .order_details c???a class select
        //  .children(":selected")c?? ngh??a l?? con c???a class .order_details c???a class select c?? selected
        //   .attr("id") attr l?? vi???t t???t attribute(thu???c t??nh ) id khai b??o b??n option  -->
        var order_id = $(this).children(":selected").attr("id");
        {{--trong form c??  @csrf l?? token ????? ki???m tra ch???ng b???o m???t   --}}
        var _token = $('input[name="_token"]').val();

        <!-- s??? d???ng alert ra message test in ra ????ng gi?? tr??? ch??a-->
        // alert(order_status);
        // alert(order_id);
        // alert(_token);

        //lay ra so luong
        <!-- quantity = []; khai b??o l?? m???t chu???i -->
        quantity = [];
      //   <!--?????u ti??n lay ra so luong  quantity = []; d???a v??o t??n c???a input
      // c?? name l?? name="product_sales_quantity"-->
        $("input[name='product_sales_quantity']").each(function(){
          //push($(this)c?? ngh??a l?? push c??i input[name='product_sales_quantity']
            quantity.push($(this).val());
        });

        //ti???p t???c lay ra product id ????? so s??nh
        order_product_id = [];<!-- khai b??o order_product_id = []; b???ng chu???i -->
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });

        <!-- s??? d???ng alert ra message test in ra ????ng gi?? tr??? ch??a-->
        // alert(quantity);
        // alert(order_product_id);
        // kh???i t???a bi???n j =0
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            // alert(order_product_id[i]);
            //???? l???y ???????c product_id
            {{--//bi???n var order_qty l?? s??? l?????ng kh??ch ?????t = c??i  class="order_qty_{{$details->product_id}}" khai b??o b??n input --}}
            var order_qty = $('.order_qty_' + order_product_id[i]).val();// bi???n [i] c?? ????? ch???y theo chu???i
            // bi???n  var order_qty_storage l?? so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
            // alert(order_qty)
            // alert(order_qty_storage)

            // vi???c k??? ti???p l?? so s??nh
            //n???u s??? l?????ng kh??ch ?????t l?? order_qty n??y l???n h??n s??? l?????ng t???n kho order_qty_storage
            //parseInt l?? chuy???n ki???u d??? li???u n??y sang ki???u int h???t
            if(parseInt(order_qty)>parseInt(order_qty_storage)){//n???u s??? l?????ng kh??ch mua l??n h??n s??? l?????ng trong kho
                // th?? bi???n j = j+1;
                j = j + 1;
                //n???u j==1 ch??? xu???t th??ng b??o ra m???t l???n
                if(j==1){
                    alert('S??? l?????ng b??n trong kho kh??ng ?????');
                }
                // $('.color_qty_'+order_product_id[i]) l???y b??n th??? <tr> file
                // .css('background','#000');
                //n???u s??? l?????ng kh??ch ?????t nh??? h??n s??? l?????ng t???n kho th?? in ra m??u ?????
                $('.color_qty_'+order_product_id[i]).css('background','#FF0000');
            }
        }
        // alert(j);

        // n???u bi???n j=0 th?? s??? th???c hi???n c??u l???nh ajax
        if(j==0){

        //Vi???c k???t ti???p d??ng ajax g???i t???i order ph????ng th???c post
        $.ajax({
            url : '{{url('/update-order-qty')}}',
            method: 'POST',
            <!-- s??? d???ng data g???i d??? li???u qua b???ng ph????ng th???c post-->
            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
            <!-- sau khi g???i d??? li???u qua b???ng ph????ng th???c post th??nh c??ng r???i -->
            success:function(data){
                <!-- th?? s??? alert ra message Th??ng  b??o -->
                alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
                location.reload();
            }
        });
        }
    });
</script>


{{--<!--script d??ng ????? x??? l?? vi???c th??m ???nh  -->--}}
{{--<script type="text/javascript">--}}
{{--    <!-- load_gallery() d??ng ????? ch???y c??u l???nh trong function load_gallery()  -->--}}
{{--    load_gallery();--}}
{{--    //h??m function load_gallery() load ra danh s??ch h??nh ???nh--}}
{{--    function load_gallery(){--}}

{{--       // .pro_id l?? l???y ????? t?????ng class b??n ph??a <input type="hidden" value="" name="pro_id" class="pro_id"> b??n file add_gallery--}}
{{--        var pro_id = $('.pro_id').val();--}}
{{--        var _token = $('input[name="_token"]').val();--}}
{{--        alert(pro_id);--}}

{{--        //g???i ajax qua ????? v??o table gallery l???y nh???ng h??nh ???nh d???a tr??n product_id--}}
{{--        $.ajax({--}}
{{--            //?????u ti??n g???i = url tr?????c--}}
{{--            url:"{{url('/select-gallery')}}",--}}
{{--            //g???i b???ng ph????ng th???c post--}}
{{--            method:"POST",--}}
{{--            data:{pro_id:pro_id,_token:_token},--}}
{{--            //success l?? khi th??nh c??ng load d??? li???u ( load table gallery)--}}
{{--            success:function(data){--}}
{{--                $('#gallery_load').html(data);--}}
{{--            }--}}
{{--        });--}}
{{--    }--}}
{{--      //b???t s??? ki???n ch???n ???nh id="file" trong th??? <input> b??n add_gallery--}}
{{--    //.change c?? ngh?? l?? ch???n ???nh--}}
{{--    //H??m x??? l?? th??m h??nh ???nh--}}
{{--    $('#file').change(function(){--}}
{{--        var error = ''; // kh???i t???o bi???n error b???ng r???ng--}}
{{--        // var files = ???nh ($('#file') b???t id="file" l?? ???nh ch???n trong t???p tin--}}
{{--        //[0] l?? ???y l?? ???nh ?????u ti??n (l??u d?????i d???ng m???ng )--}}
{{--        var files = $('#file')[0].files;--}}
{{--        // ki???m tra chi???u d??i cho t???i da 5 ???nh cho m???t l???n upload--}}
{{--        if(files.length>5){// n???u files ???nh ???nh s??? l?????ng l???n h??n 5--}}
{{--            // th?? in ra th???ng b??o--}}
{{--            error+='<p>B???n ch???n t???i ??a ch??? ???????c 5 ???nh</p>';--}}
{{--            // ki???m tra files.length=='' kh?? ???????c ????? r???ng--}}
{{--        }else if(files.length==''){--}}
{{--            error+='<p>B???n kh??ng ???????c b??? tr???ng ???nh</p>';--}}
{{--            // ki???m tra kh??ch th?????c ???nh kh??ng q??a 2MB (2 tri???u)--}}
{{--        }else if(files.size > 2000000){--}}
{{--            error+='<p>File ???nh kh??ng ???????c l???n h??n 2MB</p>';--}}
{{--        }--}}

{{--        if(error==''){// n???u error ch???i qua 3 b?????c tr??n = r???ng  th?? o l??m g??--}}

{{--        }else{// ng?????c  l???i th??--}}
{{--            $('#file').val('');//xu???t hi???n l???i song tr??? l???i ko c?? t???p n??o ???????c ch???n--}}
{{--            $('#error_gallery').html('<span class="text-danger">'+error+'</span>');--}}
{{--            return false;--}}
{{--        }--}}

{{--    });--}}

{{--    // x??? l?? c???p nh???t t??n h??nh ???nh--}}
{{--    $(document).on('blur','.edit_gal_name',function(){--}}
{{--        var gal_id = $(this).data('gal_id');--}}
{{--        var gal_text = $(this).text();--}}
{{--        var _token = $('input[name="_token"]').val();--}}
{{--        $.ajax({--}}
{{--            url:"{{url('/update-gallery-name')}}",--}}
{{--            method:"POST",--}}
{{--            data:{gal_id:gal_id,gal_text:gal_text,_token:_token},--}}
{{--            success:function(data){--}}
{{--                load_gallery();--}}
{{--                $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>');--}}
{{--            }--}}
{{--        });--}}
{{--    });--}}
{{--// x??a th?? vi???n ???nh--}}
{{--    $(document).on('click','.delete-gallery',function(){--}}
{{--        //x??a b???t  data-gal_id  v?? data-gal_id ch???a gallery_id c???n x??a <button data-gal_id="'.$gal->gallery_id b??n ph??a n???t button--}}
{{--        var gal_id = $(this).data('gal_id');--}}

{{--        var _token = $('input[name="_token"]').val();--}}
{{--        if(confirm('B???n mu???n x??a h??nh ???nh n??y kh??ng?')){--}}
{{--            $.ajax({--}}
{{--                url:"{{url('/delete-gallery')}}",--}}
{{--                method:"POST",--}}
{{--                data:{gal_id:gal_id,_token:_token},--}}
{{--                success:function(data){--}}
{{--                    load_gallery();--}}
{{--                    $('#error_gallery').html('<span class="text-danger">X??a h??nh ???nh th??nh c??ng</span>');--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    });--}}
{{--// h??m n??y x??? l?? c???p nh???t h??nh ???nh ( thay ?????i h??nh ???nh )--}}
{{--    //.file_image l?? b???t ???????c khi ng?????i d??ng click th???c hi???n l???nh ajax th?? mang c??i id c???a h??nh ???nh ????--}}
{{--    $(document).on('change','.file_image',function(){--}}

{{--        var gal_id = $(this).data('gal_id');--}}
{{--        var image = document.getElementById("file-"+gal_id).files[0];--}}

{{--        var form_data = new FormData();--}}

{{--        form_data.append("file", document.getElementById("file-"+gal_id).files[0]);--}}
{{--        form_data.append("gal_id",gal_id);--}}

{{--        $.ajax({--}}
{{--            url:"{{url('/update-gallery')}}",--}}
{{--            method:"POST",--}}
{{--            headers:{--}}
{{--                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--            },--}}
{{--            data:form_data,--}}

{{--            contentType:false,--}}
{{--            cache:false,--}}
{{--            processData:false,--}}
{{--            success:function(data){--}}
{{--                load_gallery();--}}
{{--                $('#error_gallery').html('<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</span>');--}}
{{--            }--}}
{{--        });--}}

{{--    });--}}




{{--</script>--}}




</script>
<script type="text/javascript">

    load_gallery();

    function load_gallery(){
        var pro_id = $('.pro_id').val();
        var _token = $('input[name="_token"]').val();
        alert(pro_id);
        $.ajax({
            url:"{{url('/select-gallery')}}",
            method:"POST",
            data:{pro_id:pro_id,_token:_token},
            success:function(data){
                $('#gallery_load').html(data);
            }
        });
    }

    $('#file').change(function(){
        var error = '';
        var files = $('#file')[0].files;

        if(files.length>5){
            error+='<p>B???n ch???n t???i ??a ch??? ???????c 5 ???nh</p>';
        }else if(files.length==''){
            error+='<p>B???n kh??ng ???????c b??? tr???ng ???nh</p>';
        }else if(files.size > 2000000){
            error+='<p>File ???nh kh??ng ???????c l???n h??n 2MB</p>';
        }

        if(error==''){

        }else{
            $('#file').val('');
            $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
            return false;
        }

    });

    $(document).on('blur','.edit_gal_name',function(){
        var gal_id = $(this).data('gal_id');
        var gal_text = $(this).text();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url:"{{url('/update-gallery-name')}}",
            method:"POST",
            data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>');
            }
        });
    });

    $(document).on('click','.delete-gallery',function(){
        var gal_id = $(this).data('gal_id');

        var _token = $('input[name="_token"]').val();
        if(confirm('B???n mu???n x??a h??nh ???nh n??y kh??ng?')){
            $.ajax({
                url:"{{url('/delete-gallery')}}",
                method:"POST",
                data:{gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">X??a h??nh ???nh th??nh c??ng</span>');
                }
            });
        }
    });

    $(document).on('change','.file_image',function(){

        var gal_id = $(this).data('gal_id');
        var image = document.getElementById("file-"+gal_id).files[0];

        var form_data = new FormData();

        form_data.append("file", document.getElementById("file-"+gal_id).files[0]);
        form_data.append("gal_id",gal_id);


//S??? t??n t??n ???nh
        $.ajax({
            url:"{{url('/update-gallery')}}",
            method:"POST",
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:form_data,

            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</span>');
            }
        });

    });


</script>

{{-- s??? d???ng c??u l???nh Jquery b???t s??? ki???n b???ng id  id="inputname" b??n form add thu???c t??nh --}}
<script type="text/javascript">
    //s??? ki???n thay ?????i l?? $ t????ng t??c ?????n id l?? d???u # v?? id c???a n??o l?? inputname
    // b??y gi??? s??? ki???n on change c???a javascript ???ng v???i n?? l?? nh???ng s??? ki???n .change
    $('#inputName').change(function(event){
        //khai b??o bi???n var _input = s??? ki???n id = inputName. ?????n gi?? tr??? c???a class vaule1 vaule2 vaule3
       var _input =  $('#inputName').val();//.val(); l??? l???y ra gi?? tr??? value ??? class = value1  value2 value3
        // alert('coler');
        // ki???m tra  n???u _input = size
        if (_input=='DUNG T??CH N???I') {
            //th?? t????ng t??c ?????n class = value2 ????? hi???n th??? th??? input v?? class = value1 v?? class = value3 ?????ng th?? b??? ???n ??i .hide() l?? h??m d??ng ????? ???n ??i c?? ngh??a l?? ???n ??i
            $('.value2').show();//.show() hi???n th??? th??? input
            $('#v2').attr({
                name:'value',
            });
            $('.value1').hide();
            $('#v1').attr({
                name:' ',
            });
            $('.value3').hide();
            $('#v3').attr({
                name:' ',
            });

            // $('.value1').hide();//l?? h??m d??ng ????? ???n ??i th??? input
            // $('.value3').hide();//l?? h??m d??ng ????? ???n ??i th??? input

            {{-- ng?????c l???i else ?? ho???c n???u _input== 'brand' --}}
        }else if (_input== 'Nh?? s???n xu???t'){
            // th?? t????ng t??c ?????n class = value3 ????? hi???n th??? th??? input
            // $('.value3').show();//.show() hi???n th??? th??? input
            $('.value3').show();//.show() hi???n th??? th??? input
            $('#v3').attr({
                name:'value',
            });
            $('.value1').hide();
            $('#v1').attr({
                name:' ',
            });
            $('.value2').hide();
            $('#v2').attr({
                name:' ',
            });

            // $('.value1').hide();//l?? h??m d??ng ????? ???n ??i th??? input
            // $('.value2').hide();//l?? h??m d??ng ????? ???n ??i th??? input

        }else {
            $('.value1').show();//.show() hi???n th??? th??? input
            $('#v1').attr({
                name:'value',
            });
            $('.value2').hide();
            $('#v2').attr({
                name:' ',
            });
            $('.value3').hide();
            $('#v3').attr({
                name:' ',
            });
        }

        //
        //     $('.value1').show();//.show() hi???n th??? th??? input
        //     $('.value2').hide();//l?? h??m d??ng ????? ???n ??i th??? input
        //     $('.value2').hide();//l?? h??m d??ng ????? ???n ??i th??? input
        // }

///s???a t??n thu???c t??nh
        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/update-gallery-name')}}",
                method:"POST",
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>');
                }
            });
        });


    });

</script>

{{--Ajax x??? l?? duy???t b??nh lu???n--}}
<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');

        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Thay ?????i th??nh duy???t th??nh c??ng';
        }else{
            var alert = 'Thay ?????i th??nh kh??ng duy???t th??nh c??ng';
        }
        $.ajax({
            url:"{{url('/allow-comment')}}",
            method:"POST",

            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment_status:comment_status,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                location.reload();
                $('#notify_comment').html('<span class="text text-alert">'+alert+'</span>');

            }
        });


    });
    $('.btn-reply-comment').click(function(){
        var comment_id = $(this).data('comment_id');

        var comment = $('.reply_comment_'+comment_id).val();



        var comment_product_id = $(this).data('product_id');


        // alert(comment);
        // alert(comment_id);
        // alert(comment_product_id);

        $.ajax({
            url:"{{url('/reply-comment')}}",
            method:"POST",

            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                $('.reply_comment_'+comment_id).val('');
                $('#notify_comment').html('<span class="text text-alert">Tr??? l???i b??nh lu???n th??nh c??ng</span>');

            }
        });


    });
</script>

{{--<???????ng d???n th?? vi???n Alert js>--}}

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


