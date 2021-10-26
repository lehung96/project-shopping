<!-- jQuery -->
<script src="<?php echo e(asset('public/adminlte/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('public/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<!-- Select2 -->
<script src="<?php echo e(asset('public/adminlte/plugins/select2/js/select2.full.min.js')); ?>"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo e(asset('public/adminlte/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js')); ?>"></script>
<!-- InputMask -->
<script src="<?php echo e(asset('public/adminlte/plugins/moment/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/adminlte/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
<!-- date-range-picker -->
<script src="<?php echo e(asset('public/adminlte/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo e(asset('public/adminlte/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('public/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Bootstrap Switch -->
<script src="<?php echo e(asset('public/adminlte/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>"></script>
<!-- BS-Stepper -->
<script src="<?php echo e(asset('public/adminlte/plugins/bs-stepper/js/bs-stepper.min.js')); ?>"></script>
<!-- dropzonejs -->
<script src="<?php echo e(asset('public/adminlte/plugins/dropzone/min/dropzone.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/adminlte/dist/js/adminlte.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/adminlte/dist/js/simple.money.format.js')); ?>"></script>



<!-- Summernote -->
<script src="<?php echo e(asset('public/adminlte/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
<!-- CodeMirror -->
<script src="<?php echo e(asset('public/adminlte/plugins/codemirror/codemirror.js')); ?>"></script>
<script src="<?php echo e(asset('public/adminlte/plugins/codemirror/mode/css/css.js')); ?>"></script>
<script src="<?php echo e(asset('public/adminlte/plugins/codemirror/mode/xml/xml.js')); ?>"></script>
<script src="<?php echo e(asset('public/adminlte/plugins/codemirror/mode/htmlmixed/htmlmixed.js')); ?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('public/adminlte/dist/js/demo.js')); ?>"></script>



<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!--  js sử dụng biểu đồ Morris.Bar(hình thanh kẹo) -->

<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>


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
        placeholder: "chọn vai trò",
    });
</script>



<script type="text/javascript">

    $( function() {
        $( "#datepicker").datepicker({// #datepicker là id="datepicker".datepicker
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
            duration: "slow"
        });
        $( "#datepicker2").datepicker({
            prevText:"Tháng trước",
            nextText:"Tháng sau",
            dateFormat:"yy-mm-dd",
            dayNamesMin: [ "Thứ 2", "Thứ 3", "Thứ 4", "Thứ 5", "Thứ 6", "Thứ 7", "Chủ nhật" ],
            duration: "slow"
        });
    } );

</script>







<script type="text/javascript">
    $('.price_format').simpleMoneyFormat();

</script>


<script type="text/javascript">
    $('#price_format').simpleMoneyFormat();

</script>

<script type="text/javascript">
    $(document).ready(function(){

        chart60daysorder();

        //sử dụng biểu đồ Morris.Bar(hình thanh kẹo)
        //var chart là biết chứa toàn bộ dữ liệu biểu đồ
        var chart = new Morris.Bar({

            element: 'chart',// bắt dữ liệu id="chart"
            //option chart
            lineColors: ['#819C79', '#fc8710','#FF6541', '#516fec', '#03c6fc'],// hiện thị color
            parseTime: false,// hiển thị ngày giờ
            hideHover: 'auto',// tự động đóng khi di chuyển chuột ra ngoài
            xkey: 'period',//tương ứng với ngày , khoẳng thời gian rder_date,
            ykeys: ['order','sales','profit','quantity'],//các key
            labels: ['đơn hàng','doanh số','lợi nhuận','số lượng']//labels là tên của các key

        });


//Hàm  này mặc định  tự động chạy lấy ra biểu đồ lọc 30 ngày hoặc 60 ngày
        function chart60daysorder(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(url('/days-order')); ?>",
                method:"POST",
                dataType:"JSON",
                data:{_token:_token},

                success:function(data)
                {
                    chart.setData(data);
                }
            });
        }


// cầu lệnh $('.dashboard-filter').change(function() có nghĩa là người dùng có chọn select
        $('.dashboard-filter').change(function(){
            var dashboard_value = $(this).val();//lấy ra giá trị value khi select
            var _token = $('input[name="_token"]').val();//sau đó gửi token
            // alert(dashboard_value);
            // khi lấy được value rồi giờ gửi qua bằng mã ajxa
            $.ajax({
                //gửi qua 1 urlL = /dashboard-filter
                url:"<?php echo e(url('/dashboard-filter')); ?>",
                method:"POST",// hình thức gửi là post
                dataType:"JSON",// trả về kiều JSON key value
                data:{dashboard_value:dashboard_value,_token:_token},
                //nếu thành công
                success:function(data)
                {
                    // trả về chart.setData(data) nghĩa là trả về data kiểu JSON hiển thị biểu đồ
                    chart.setData(data);
                }
            });

        });

        // Bắt sự kiện id="btn-dashboard-filter" lọc theo ngày tháng được thay đổi thay đổi
        $('#btn-dashboard-filter').click(function(){
            // alert('ok !');
            var _token = $('input[name="_token"]').val();

            var from_date = $('#datepicker').val();// lấy ra giá trị từ ngày
            var to_date = $('#datepicker2').val();//lấy ra giá trị đến ngày

            // alert(_token);
            // alert(from_date);
            // alert(to_date);
            //lấy được giá trị sử dụng ajax để gửi giá trị qua controller bằng
            //url cái route là '/filter-by-date'
            $.ajax({
                url:"<?php echo e(url('/filter-by-date')); ?>",
                method:"POST",
                dataType:"JSON",//trả về JSON là key và value cho biểu đồ của mình
                data:{from_date:from_date,to_date:to_date,_token:_token},
                // Khi thành công thì mọi dữ liệu lấy được mà ngày lọc ra trả về kiểu trả về JSON cho biểu đồ của mình
                success:function(data)
                {
                    chart.setData(data);// câu lệnh này trả về chart data hiển thị biểu đồ
                }
            });

        });

    });

</script>


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
                // hiểm thi sản phẩm đếm được ỏ bên hàm show_dashboard()


                {label:"Sản phẩm", value:<?php echo $app_product ?>},
                
                {label:"Đơn hàng", value:<?php echo $app_order ?>},
                
                {label:"Khách hàng", value:<?php echo $app_customer ?>}
                

                

                
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

        //Date picker hiển thị lịch
        $('#reservationdate').datetimepicker({
            format: 'L'
        });

        //Date and time picker
        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });

        //Date picker hiển thị lịch
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
            tags: true,// option chọn tags là tags = true
            tokenSeparators: [',']
        })

        $(".select2_init").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });


        $(".select2_in").select2({
            placeholder: "Chọn danh mục",
            allowClear: true
        });
        // đổi biến var thành let
        // let editor_config = {
        //     path_absolute : "/",
        //     // đổi tên selector my-editor thành tinymce_editor_init
        //     // sau đó coppy class tinymce_editor_init vào file add.blade.php
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

<!-- impost thư viện -->




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




<script type="text/javascript">
    
    $('.order_details').change(function(){
        <!-- sử dụng alert ra message test -->
        // alert('đã change');
        // <!--lấy được var order_status = $(this) nghĩa là của class .order_details của class select
        //  .val()nghĩa là lấy ra value=1 của option -->
        var order_status = $(this).val();

        // <!-- Lấy được var order_id dựa vào order_id đơn hàng ở bảng order để update order_status
        //  = $(this) nghĩa là của class .order_details của class select
        //  .children(":selected")có nghĩa là con của class .order_details của class select có selected
        //   .attr("id") attr là viết tắt attribute(thuộc tính ) id khai báo bên option  -->
        var order_id = $(this).children(":selected").attr("id");
        
        var _token = $('input[name="_token"]').val();

        <!-- sử dụng alert ra message test in ra đúng giá trị chưa-->
        // alert(order_status);
        // alert(order_id);
        // alert(_token);

        //lay ra so luong
        <!-- quantity = []; khai báo là một chuỗi -->
        quantity = [];
      //   <!--đầu tiên lay ra so luong  quantity = []; dựa vào tên của input
      // có name là name="product_sales_quantity"-->
        $("input[name='product_sales_quantity']").each(function(){
          //push($(this)có nghĩa là push cái input[name='product_sales_quantity']
            quantity.push($(this).val());
        });

        //tiếp tục lay ra product id để so sánh
        order_product_id = [];<!-- khai báo order_product_id = []; bằng chuỗi -->
        $("input[name='order_product_id']").each(function(){
            order_product_id.push($(this).val());
        });

        <!-- sử dụng alert ra message test in ra đúng giá trị chưa-->
        // alert(quantity);
        // alert(order_product_id);
        // khởi tọa biến j =0
        j = 0;
        for(i=0;i<order_product_id.length;i++){
            // alert(order_product_id[i]);
            //đã lấy được product_id
            
            var order_qty = $('.order_qty_' + order_product_id[i]).val();// biến [i] có để chạy theo chuỗi
            // biến  var order_qty_storage là so luong ton kho
            var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
            // alert(order_qty)
            // alert(order_qty_storage)

            // việc kế tiếp là so sánh
            //nếu số lượng khách đặt là order_qty này lớn hơn số lượng tồn kho order_qty_storage
            //parseInt là chuyển kiểu dữ liệu này sang kiểu int hết
            if(parseInt(order_qty)>parseInt(order_qty_storage)){//nếu số lượng khách mua lơn hơn số lượng trong kho
                // thì biến j = j+1;
                j = j + 1;
                //nếu j==1 chỉ xuất thông báo ra một lần
                if(j==1){
                    alert('Số lượng bán trong kho không đủ');
                }
                // $('.color_qty_'+order_product_id[i]) lấy bên thẻ <tr> file
                // .css('background','#000');
                //nếu số lượng khách đặt nhỏ hơn số lượng tồn kho thì in ra màu đỏ
                $('.color_qty_'+order_product_id[i]).css('background','#FF0000');
            }
        }
        // alert(j);

        // nếu biến j=0 thì sẽ thực hiện câu lệnh ajax
        if(j==0){

        //Việc kết tiếp dùng ajax gửi tới order phương thức post
        $.ajax({
            url : '<?php echo e(url('/update-order-qty')); ?>',
            method: 'POST',
            <!-- sử dụng data gửi dữ liệu qua bằng phương thức post-->
            data:{_token:_token, order_status:order_status ,order_id:order_id ,quantity:quantity, order_product_id:order_product_id},
            <!-- sau khi gửi dữ liệu qua bằng phương thức post thành công rồi -->
            success:function(data){
                <!-- thì sẽ alert ra message Thông  báo -->
                alert('Thay đổi tình trạng đơn hàng thành công');
                location.reload();
            }
        });
        }
    });
</script>

































































































































</script>
<script type="text/javascript">

    load_gallery();

    function load_gallery(){
        var pro_id = $('.pro_id').val();
        var _token = $('input[name="_token"]').val();
        alert(pro_id);
        $.ajax({
            url:"<?php echo e(url('/select-gallery')); ?>",
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
            error+='<p>Bạn chọn tối đa chỉ được 5 ảnh</p>';
        }else if(files.length==''){
            error+='<p>Bạn không được bỏ trống ảnh</p>';
        }else if(files.size > 2000000){
            error+='<p>File ảnh không được lớn hơn 2MB</p>';
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
            url:"<?php echo e(url('/update-gallery-name')); ?>",
            method:"POST",
            data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
            success:function(data){
                load_gallery();
                $('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
            }
        });
    });

    $(document).on('click','.delete-gallery',function(){
        var gal_id = $(this).data('gal_id');

        var _token = $('input[name="_token"]').val();
        if(confirm('Bạn muốn xóa hình ảnh này không?')){
            $.ajax({
                url:"<?php echo e(url('/delete-gallery')); ?>",
                method:"POST",
                data:{gal_id:gal_id,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Xóa hình ảnh thành công</span>');
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


//Sử tên tên ảnh
        $.ajax({
            url:"<?php echo e(url('/update-gallery')); ?>",
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
                $('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
            }
        });

    });


</script>


<script type="text/javascript">
    //sự kiện thay đổi là $ tương tác đến id là dấu # và id của nào là inputname
    // bây giờ sự kiện on change của javascript ứng với nó là những sự kiện .change
    $('#inputName').change(function(event){
        //khai báo biến var _input = sự kiện id = inputName. đến giá trị của class vaule1 vaule2 vaule3
       var _input =  $('#inputName').val();//.val(); lầ lấy ra giá trị value ở class = value1  value2 value3
        // alert('coler');
        // kiểm tra  nếu _input = size
        if (_input=='DUNG TÍCH NỒI') {
            //thì tương tác đến class = value2 để hiển thị thẻ input và class = value1 và class = value3 đồng thì bị ẩn đi .hide() là hàm dùng để ẩn đi có nghĩa là ẩn đi
            $('.value2').show();//.show() hiển thị thẻ input
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

            // $('.value1').hide();//là hàm dùng để ẩn đi thẻ input
            // $('.value3').hide();//là hàm dùng để ẩn đi thẻ input

            
        }else if (_input== 'Nhà sản xuất'){
            // thì tương tác đến class = value3 để hiển thị thẻ input
            // $('.value3').show();//.show() hiển thị thẻ input
            $('.value3').show();//.show() hiển thị thẻ input
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

            // $('.value1').hide();//là hàm dùng để ẩn đi thẻ input
            // $('.value2').hide();//là hàm dùng để ẩn đi thẻ input

        }else {
            $('.value1').show();//.show() hiển thị thẻ input
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
        //     $('.value1').show();//.show() hiển thị thẻ input
        //     $('.value2').hide();//là hàm dùng để ẩn đi thẻ input
        //     $('.value2').hide();//là hàm dùng để ẩn đi thẻ input
        // }

///sửa tên thuộc tính
        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"<?php echo e(url('/update-gallery-name')); ?>",
                method:"POST",
                data:{gal_id:gal_id,gal_text:gal_text,_token:_token},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
                }
            });
        });


    });

</script>


<script type="text/javascript">
    $('.comment_duyet_btn').click(function(){
        var comment_status = $(this).data('comment_status');

        var comment_id = $(this).data('comment_id');
        var comment_product_id = $(this).attr('id');
        if(comment_status==0){
            var alert = 'Thay đổi thành duyệt thành công';
        }else{
            var alert = 'Thay đổi thành không duyệt thành công';
        }
        $.ajax({
            url:"<?php echo e(url('/allow-comment')); ?>",
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
            url:"<?php echo e(url('/reply-comment')); ?>",
            method:"POST",

            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data:{comment:comment,comment_id:comment_id,comment_product_id:comment_product_id},
            success:function(data){
                $('.reply_comment_'+comment_id).val('');
                $('#notify_comment').html('<span class="text text-alert">Trả lời bình luận thành công</span>');

            }
        });


    });
</script>



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


<?php /**PATH D:\xampp\htdocs\shopping-Houseware\resources\views/backend/script.blade.php ENDPATH**/ ?>