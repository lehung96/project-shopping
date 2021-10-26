<!-- jQuery-V1.12.4 -->
<script src="{{asset('public/frontend/js/vendor/jquery-1.12.4.min.js')}}"></script>
<!-- Popper js -->
<script src="{{asset('public/frontend/js/vendor/popper.min.js')}}"></script>
<!-- Bootstrap V4.1.3 Fremwork js -->
<script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
<!-- Ajax Mail js -->
<script src="{{asset('public/frontend/js/ajax-mail.js')}}"></script>
<!-- Meanmenu js -->
<script src="{{asset('public/frontend/js/jquery.meanmenu.min.js')}}"></script>
<!-- Wow.min js -->
<script src="{{asset('public/frontend/js/wow.min.js')}}"></script>
<!-- Slick Carousel js -->
<script src="{{asset('public/frontend/js/slick.min.js')}}"></script>
<!-- Owl Carousel-2 js -->
<script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
<!-- Magnific popup js -->
<script src="{{asset('public/frontend/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Isotope js -->
<script src="{{asset('public/frontend/js/isotope.pkgd.min.js')}}"></script>
<!-- Imagesloaded js -->
<script src="{{asset('public/frontend/js/imagesloaded.pkgd.min.js')}}"></script>
<!-- Mixitup js -->
<script src="{{asset('public/frontend/js/jquery.mixitup.min.js')}}"></script>
<!-- Countdown -->
<script src="{{asset('public/frontend/js/jquery.countdown.min.js')}}"></script>
<!-- Counterup -->
<script src="{{asset('public/frontend/js/jquery.counterup.min.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('public/frontend/js/waypoints.min.js')}}"></script>
<!-- Barrating -->
<script src="{{asset('public/frontend/js/jquery.barrating.min.js')}}"></script>
<!-- Jquery-ui -->
<script src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
<!-- Venobox -->
<script src="{{asset('public/frontend/js/venobox.min.js')}}"></script>
<!-- Nice Select js -->
<script src="{{asset('public/frontend/js/jquery.nice-select.min.js')}}"></script>
<!-- ScrollUp js -->
<script src="{{asset('public/frontend/js/scrollUp.min.js')}}"></script>
<!-- Main/Activator js -->
<script src="{{asset('public/frontend/js/main.js')}}"></script>
<!-- Main/sweetalert2 js -->
<script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>

<script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
<script src="{{asset('public/frontend/js/prettify.js')}}"></script>


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
            sandbox: 'demo_sandbox_client_id',
            production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
            size: 'large',
            color: 'gold',
            shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function (data, actions) {
            return actions.payment.create({
                transactions: [{
                    amount: {
                        total: '10',
                        currency: 'USD'
                    }
                }]
            });
        },
        // Execute the payment
        onAuthorize: function (data, actions) {
            return actions.payment.execute().then(function () {
                // Show a confirmation message to the buyer
                window.alert('Cảm ơn bạn đã mua hàng của chúng tôi!');
            });
        }
    }, '#paypal-button');

</script>

<!-- Thanh toán paypal -->
{{--<script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
{{--<script>--}}


{{--    khởi tạo biến usd--}}
{{--    var usd = document.getElementById("vnd_to_usd").value;--}}
{{--    paypal.Button.render({--}}
{{--        // Configure environment( cấu hình mơi trường )--}}
{{--        env: 'sandbox',--}}
{{--        client: {--}}
{{--            //sandbox:lấy từ Client ID myAccount--}}
{{--            sandbox: 'AUK8g5Mo-WRzU7zpJOBUgXHEbZkxyz1x_OcTsb_QdUYrG3WQggch2RWXDYv028Sfd_OOyll9YDK1ETgE',--}}
{{--            production: 'demo_production_client_id'--}}
{{--        },--}}
{{--        // Customize button (optional)--}}
{{--        locale: 'en_US',--}}
{{--        style: {--}}
{{--            // size: 'small',//là kích thước nốt paypal nhỏ--}}
{{--            size: 'large',// kích thước lớn--}}
{{--            color: 'gold',// màu vàng nốt thanh toán paypal--}}
{{--            shape: 'pill',// nghĩa là bo tròn nốt paypal--}}
{{--        },--}}

{{--        // Enable Pay Now checkout flow (optional)--}}
{{--        commit: true,--}}

{{--        // Set up a payment()--}}
{{--        payment: function(data, actions) {--}}
{{--            return actions.payment.create({--}}
{{--                transactions: [{--}}
{{--                    amount: {--}}
{{--                        // nối chuỗi--}}
{{--                        // total: `${usd}`,--}}
{{--                        total:'$110',--}}
{{--                        currency: 'USD'// đơn vị tiền tệ--}}
{{--                    }--}}
{{--                }]--}}
{{--            });--}}
{{--        },--}}
{{--        // Execute the payment( sau khi thành công hiển thị ra thống báo)--}}
{{--        onAuthorize: function(data, actions) {--}}
{{--            return actions.payment.execute().then(function() {--}}
{{--                // Show a confirmation message to the buyer( thông tin xác nhận đơn hàng )--}}
{{--                window.alert('Cảm ơn bạn đã mua hàng của chúng tôi!');--}}
{{--            });--}}
{{--        }--}}
{{--    }, '#paypal-button');--}}

{{--</script>--}}

{{--đoạn mã ajax này dùng để Sắp xếp theo ký tự--}}

<script type="text/javascript">
    $(document).ready(function () {

        $('#sort').on('change', function () {

            var url = $(this).val();
            // alert(url);
            if (url) {
                window.location = url;
            }
            return false;
        });

    });
</script>

{{--<script>--}}
{{--    // định nghĩa phương thức addTocart này--}}
{{--    // truyền  tham số event vào hàm--}}
{{--    function addTocart(event){--}}
{{--        // alert('12345')--}}
{{--    // event.preventDefault(); Huỷ bỏ event nếu nó có thể huỷ mà không dừng sự lan rộng(propagation) của event tới phần khác.--}}
{{--        //Bây giờ sẽ không có gì xảy ra--}}
{{--        event.preventDefault();--}}
{{--        //đầu tiên nó sẽ lấy ra biết let , mình có url để mình call ajax,--}}
{{--          // khi click vào button sẽ là this và gọi đến data--}}
{{--        // key là url--}}
{{--       let urlCart = $(this).data('url');// đã xác định được url để call ajax rồi--}}
{{--        //tiếp đến mình sẽ gọi ajax--}}
{{--        //để gọi được ajax dùng: $.ajax--}}
{{--        // và truyền option trong phương thức  $.ajax()--}}
{{--        //Ajax là gì : là một hành động nó sẽ gửi xml--}}
{{--       // http để request và sau đó nhận được data trả về trong cái success--}}

{{--        $.ajax({--}}
{{--                //truyền option ở đây là type- loại--}}
{{--            // muốn ở bên kia nhận request là Get, vì tạo route là get bên web.php--}}
{{--            //có loại là get--}}
{{--            type:"GET",--}}
{{--            // và có url để mình gọi ajax--}}
{{--            // khi mình nhấn button thì sẽ thực hiện 1 cái  request đến  url này--}}
{{--            // url này chính bằng cái urlCart mình lấy được--}}
{{--            url:urlCart,--}}
{{--            // và mình có 2 cái sắc sít  (success)--}}
{{--            // tạo một function call back tức là gọi lại hàm--}}
{{--            // khi mà dữ liệu trả về của mình ok, ko có lỗi gì sẽ chạy vào cái success này--}}
{{--            // và nhận vào cái data này chính là cái dữ liệu trả về--}}
{{--            // muốn dữ liệu trả về json--}}
{{--            //Thêm dataType--}}
{{--            // bên server trả về--}}
{{--            // json là gì: là có key và value--}}
{{--            dataType: 'json',--}}
{{--            success: function (data){--}}


{{--            },--}}
{{--            // có e do (error) lỗi thì mình cũng phải có một function call back hàm gọi lại--}}
{{--            error: function (){--}}

{{--            },--}}


{{--        });--}}
{{--    }--}}
{{--    $(function (){--}}
{{--        // trong này mình sử lý call ajax--}}
{{--        // đầu tiên mình bắt sự kiện là $('.add_to_cart') và bắt sự kiện on('click',addTocart)--}}
{{--        // trong on sử dụng phương thức là addTocart--}}
{{--        $('.add_to_cart').on('click',addTocart)--}}
{{--    });--}}
{{--</script>--}}


{{--Sử dụng ajax để thêm sản phẩm trang chi tiết vào giỏ hàng --}}
<script>
    $('#btn-add-cart').click(function () {
        var quantity = document.getElementById('quantity').value;
        var product_id = document.getElementById('product_id').value;
        // var pro_qty = document.getElementById('pro_qty').value;
        var _token = $('input[name="_token"]').val();
        let url = '{{ route("add-cart-details", ":id") }}';
        url = url.replace(':id', product_id);

        // alert(quantity);
        // alert(product_id);
        // alert(_token);
        // if(parseInt(quantity)>parseInt(pro_quantity)){
        //     alert('Làm ơn đặt nhỏ hơn ' + pro_quantity);
        // }else{
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    _token: _token, quantity: quantity, product_id: product_id
                },
                success: function () {
                    swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function () {
                            window.location.href = "{{route('shopping-list-cart')}}";
                        });
                }
            })

        // }

    })
</script>


{{--<mua ngay sẩn phẩm ở quickview(xem nhanh)  sản phẩm sử dụng Ajax Jquery.>--}}

<script type="text/javascript">

    $(document).on('click', '.add-to-cart-quickview', function () {
        var id = $(this).data('id_product');
        var cart_product_id = $('.cart_product_id_' + id).val();
        var cart_product_qty = $('.cart_product_qty_' + id).val();
        var _token = $('input[name="_token"]').val();
        let url = '{{ route("add-cart-details", ":id") }}';
        url = url.replace(':id', id);
        // alert(cart_product_id)
        // alert(cart_product_qty)
        // alert(_token)


        $.ajax({
            url: url,
            method: 'POST',
            data: {cart_product_id: cart_product_id, cart_product_qty: cart_product_qty, _token: _token},
            beforeSend: function () {
                $("#beforesend_quickview").html("<p class='text text-primary'>Đang thêm sản phẩm vào giỏ hàng</p>");
            },
            success: function () {
                $("#beforesend_quickview").html("<p class='text text-success'>Sản phẩm đã thêm vào giỏ hàng</p>");


            }

        });

    });
    $(document).on('click', '.redirect-cart', function () {
        window.location.href = "{{url('/shopping-list-cart')}}";
    });

</script>

{{--<Thêm sản phẩm sử dụng Ajax Jquery.>--}}
<script>
    // tạo 1 hàm có tên là add() và nhận vào 1 $product_id
    function add(product_id) {
        // // in ra
        // console.log(product_id)
        // tiếp theo mình sẽ thực hiện cú pháp ajax
        //ajax sử dụng jquery mình đã có thư viện jquery rồi <script src="https://code.jquery.com/jquery-3.6.0.min.js" >
        // <!-- url:'', -->
        $.ajax({
            <!-- url:'', là cái đường dẫn  mình lấy bên route web.php product.addToCart sau đó + id-->
            url: 'add-to-cart/' + product_id,
            <!-- type:'', là cái get hay post, hiện tại mình dùng GET , mình sẽ điền vào là Get  -->

            type: 'GET',
            // <!-- Còn phần  .done(function (response){

            // });  là song done đôn là song thành công thì trả về kết quả ở là đây (response)  response có thể đặt tên khác-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // gọi hàm RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('Đã thêm mới sản phẩm');

        });

    }


    // hàm này thực hiện xóa giỏ hàng  gọi class cha và bắt sự kiện cho class = close bên file cart.blade.php
    function delete_cart(product_id) {
        /// in object hiện tại là this chính là đối tượng muốn click xóa ở bên cart.blade.php
        /// mình phải lấy được cái id thì mình mới biết mình đang xóa cho sản phẩm nào
        /// đối tượng this sẽ , tới thuộc tính là data và tên product_id truyền vào là mình đặt bên cart.blade.php data-id="$item['item']->product_id}}"></i>
        // console.log($(this).data("product_id"));

        $.ajax({
            <!-- url:'', là cái đường dẫn  mình lấy bên route web.php product.addToCart sau đó + id-->
            url: 'delete-item-cart/' + product_id,
            <!-- type:'', là cái get hay post, hiện tại mình dùng GET , mình sẽ điền vào là Get  -->

            type: 'GET',
            // <!-- Còn phần  .done(function (response){

            // });  là song done đôn là song thành công thì trả về kết quả ở là đây (response)  response có thể đặt tên khác-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // gọi hàm RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('Đã xóa sản phẩm');

        });

    };

    // tạo hàm RenderCart
    function RenderCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        // in id id="total-quanty-cart"  bên  cart.blade.php kiểm giá trị xem
        // console.log($("#total-quanty-cart").val())
        //tạo một cái elemen có id là total-quanty-show. text() và bằng với số lượng mới này $("#total-quanty-cart").val()

        //---------//
        //phần xử lý tổng tiền và số lượng ở giỏ hàng
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        $("#total-quanty-show").text($("#total-price-cart").val());


    }


</script>


<script>

    // hàm xử lý chức năng xóa ở danh sách giỏ hàng
    function DeleteListIteamCart(product_id) {
        // in product_id ra
        // console.log(product_id);

        $.ajax({
            <!-- url:'', là cái đường dẫn  mình lấy bên route web.php product.addToCart sau đó + id-->
            url: 'delete-item-list/' + product_id,
            <!-- type:'', là cái get hay post, hiện tại mình dùng GET , mình sẽ điền vào là Get  -->

            type: 'GET',
            // <!-- Còn phần  .done(function (response){

            // });  là song done đôn là song thành công thì trả về kết quả ở là đây (response)  response có thể đặt tên khác-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // gọi hàm RenderCart
            RenderListCart(response);
            alertify.success('Đã xóa sản phẩm thành công');

        });


    }

    // hàm xử lý chức năng lưu số lượng cập nhật ở danh sách giỏ hàng
    function SaveListCart(product_id) {
        // $("#quanty-item-"+product_id).val();// đây chính là giá trị đã thay đổi
        ///tại đấy chúng ta  lấy cái id = quanty-item elemen bên phía list_cart ra
        // $("#quanty-item-"+ product_id).val()
        // in product_id ra
        // console.log(product_id)
        // console.log($("#quanty-item-"+ product_id).val());
        ///Chúng ta thực hiện ajax và phải request qua một cái url save-item-list làm chức năng là lưu
        $.ajax({
            // <!-- url:'', là cái đường dẫn  mình lấy bên route web.php product.addToCart sau đó + id
            //  tại đấy chúng ta  lấy cái id = quanty-item elemen bên phía list_cart ra
            //  product_id là id truyền vào còn  $("#quanty-item-"+ product_id).val(),là số lượng  -->
            //save-item-list/'+product_id+'/'+$("#quanty-item-"+ product_id).val(), <=> save-item-list/1/5
            //product_id =1 còn $("#quanty-item-"+ product_id).val() là =5 là số lượng
            url: 'save-item-list/' + product_id + '/' + $("#quanty-item-" + product_id).val(),
            <!-- type:'', là cái get hay post, hiện tại mình dùng GET , mình sẽ điền vào là Get  -->

            type: 'GET',
            // <!-- Còn phần  .done(function (response){

            // });  là song done đôn là song thành công thì trả về kết quả ở là đây (response)  response có thể đặt tên khác-->
        }).done(function (response) {

            // gọi hàm RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('Đã thêm mới sản phẩm');

        });
    }

    function RenderListCart(response) {
        //xử lý xóa chi tiết giỏ hàng
        $("#list-cart").empty();
        $("#list-cart").html(response);


        $(".cart-plus-minus").append('<div class="dec qtybutton"><i class="fa fa-angle-down"></i></div><div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>');
        $(".qtybutton").on("click", function () {
            var $button = $(this);
            var oldValue = $button.parent().find("input").val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find("input").val(newVal);
        });
    }

    // tạo một sự kiện để gọi đối tượng edit-all và on ra
    // trong on() mình lấy sự kiện click
    //sử dụng cú pháo jquery
    $(".edit-all").on("click", function () {
        // thư in ra một thông báo alert
        //
        // tạo ra một biết chứa danh sách ở đây là array mảng
        let lists = [];
        // sử dụng cú pháp viết ngắn gọn của jquery
        //cái each() tương đương với cái foreach()
        $("table tbody tr td").each(function () {
            //trong hàm này lặp lấy ra
            // tìm input , ở input chứa tất cả giá trị số lượng ở trong ô input
            //cú pháp tìm input , sẽ chính là đối tượng td hiện tại là đối tượng this
            // đối tượng this này trỏ đến hàm find(), trong hàm find cần tìm input
            // từ find chấm tới each() trong each có 1 function
            $(this).find("input").each(function () {// cú  pháp này đã tìm được input
                //trong element thực hiện tối tượng có key $(this)  và value
                let element = {key: $(this).data("product_id"), value: $(this).val()};
                // lấy biết chứa danh sách list chấm push là đẩy lên  trong push truyền vào biết
                // truyền biết element vào trong push
                lists.push(element);
            })
        });
        // in ra màn mình console
        // console.log(list)
        // khi có danh sách sẽ thực hiện ajax
        $.ajax({
            // <!-- url:'', là cái đường dẫn  mình lấy bên route web.php product.addToCart sau đó + id
            //  tại đấy chúng ta  lấy cái id = quanty-item elemen bên phía list_cart ra
            //  product_id là id truyền vào còn  $("#quanty-item-"+ product_id).val(),là số lượng  -->
            //save-item-list/'+product_id+'/'+$("#quanty-item-"+ product_id).val(), <=> save-item-list/1/5
            //product_id =1 còn $("#quanty-item-"+ product_id).val() là =5 là số lượng
            url: 'save-all',
            <!-- type:'', là cái post , hiện tại mình dùng post , mình sẽ điền vào là post -->
            // đi qua phương thức post, đối với phương thức post cần có thêm data
            type: 'POST',
            //data có các đối tường truyền vào có 2 thứ quan trọng là token và data
            //token cần cái csrf_token() xác thực để đẩy dữ liệu qua ko bị lỗi
            // data được truyền vào chính là cái nhận lại bên phía controoler
            data: {
                "_token": "{{csrf_token()}}",
                "data": lists,
            }
            // <!-- Còn phần  .done(function (response){
            // });  là song done đôn là song thành công thì trả về kết quả ở là đây (response)  response có thể đặt tên khác-->
        }).done(function (response) {
            // alert("ok")
            location.reload();

            // gọi hàm RenderCart
            // RenderListCart(response);
            // alertify.success('Đã cập nhật sản phẩm thành công');

        });

    });
</script>

{{--hàm sử lý thêm sản phẩm tử chi tiết --}}

<script>
    function addCartDetails(product_id) {
        console.log(product_id);
    }
</script>

{{--khi mà người dùng chọn thành phố--}}

<script type="text/javascript">
    $(document).ready(function () {
        $('.choose').on('change', function () {
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            // alert(action);
            //  alert(matp);
            //   alert(_token);

            if (action == 'city') {
                result = 'province';
            } else {
                result = 'wards';
            }
            $.ajax({
                url: '{{url('/select-delivery')}}',
                method: 'POST',
                data: {action: action, ma_id: ma_id, _token: _token},
                success: function (data) {
                    $('#' + result).html(data);
                }
            });
        });


        ///
//         $('.choose').on('change',function(){
//             var action = $(this).attr('id');
//             var ma_id = $(this).val();
//             var _token = $('input[name="_token"]').val();
//             var result = '';
//             // alert(action);
//             //  alert(matp);
//             //   alert(_token);
// //khi mà người dùng chọn thành phố
//             if(action=='city'){
//                 result = 'province';
//             }else{
//                 result = 'wards';
//             }
//             $.ajax({
//                 url: '/select-delivery',
//                 method: 'POST',
//                 data:{action:action,ma_id:ma_id,_token:_token},
//                 success:function(data){
//                     $('#'+result).html(data);
//                 }
//             });
//         });
    });
</script>

{{--xác nhận đơn hàng--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.send_order').click(function () {
            swal({
                    title: "Xác nhận đơn hàng",
                    text: "Hoàn thành bước này sẽ giúp bạn nhận được sản phẩm nhanh hơn",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cảm ơn!, Mua hàng",
                    cancelButtonText: "Đóng,chưa mua!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {
                        var shipping_name = $('.shipping_name').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.payment_select').val();
                        var _token = $('input[name="_token"]').val();

                        // alert(shipping_name);
                        // alert(shipping_phone);
                        // alert(shipping_address);
                        // alert(shipping_notes);
                        // alert(shipping_method);
                        // alert(_token);


                        $.ajax({
                            url: '{{url('/confirm-order')}}',
                            method: 'POST',
                            data: {
                                shipping_name: shipping_name,
                                shipping_address: shipping_address,
                                shipping_phone: shipping_phone,
                                shipping_notes: shipping_notes,
                                _token: _token,
                                shipping_method: shipping_method
                            },
                            success: function () {
                                swal("Đơn hàng", "Đơn hàng của bạn đã được gửi thành công", "success");
                            }
                        });

                        //khi xác nhận đơn hàng thanh công rồi , sẽ thông báo là xác nhận đơn hàng thành công
                        window.setTimeout(function () {
                            location.reload();
                            // sau đó khoảng 3s sẽ Refresh lại cái form checkout
                        }, 3000);

                    } else {
                        swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");
                    }
                });
        });
    });
</script>


{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}

{{--//đâu tiên bắt cái id="sort" trong thẻ <select name="sort" id="sort" class="nice-select form-control">--}}
{{--//.on change trong select là sự thay đổi (khách hàng có chọn)--}}

{{--        $('#sort').on('change',function(){--}}
{{--            //$(this) là bắt đường dẫn ở trong select mang id="sort"--}}
{{--            //This có nghĩa là đây  và this = cụm--}}
{{--           // này $('#sort').on('change',function(){--}}

{{--                var url = $(this).val();//.val() là lấy cái giá trị khi select thay đổi--}}

{{--            // alert(url);--}}
{{--            if (url) {--}}
{{--                window.location = url;--}}
{{--            }--}}
{{--            return false;--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}


{{--Đoạn ajax xử lý comment--}}
<script type="text/javascript">
    $(document).ready(function () {

        load_comment();

        //tạo hàm function load_comment()
        function load_comment() {
            //load load_comment() dựa trên product_id
            var product_id = $('.comment_product_id').val();
            // alert(product_id);
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data: {product_id: product_id, _token: _token},
                success: function (data) {

                    $('#comment_show').html(data);
                }
            });
        }

        $('.send-comment').click(function () {
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data: {
                    product_id: product_id,
                    comment_name: comment_name,
                    comment_content: comment_content,
                    _token: _token
                },
                success: function (data) {

                    $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                    load_comment();
                    $('#notify_comment').fadeOut(9000);
                    $('.comment_name').val('');
                    $('.comment_content').val('');
                }
            });
        });
    });
</script>

{{--<Tìm kiếm Autocomplete>--}}
<script type="text/javascript">
    $('#keywords').keyup(function () {
        var query = $(this).val();

        if (query != '') {
            var _token = $('input[name="_token"]').val();

            $.ajax({
                url: "{{url('/autocomplete-ajax')}}",
                method: "POST",
                data: {query: query, _token: _token},
                success: function (data) {
                    $('#search_ajax').fadeIn();
                    $('#search_ajax').html(data);
                }
            });

        } else {

            $('#search_ajax').fadeOut();
        }
    });

    $(document).on('click', '.li_search_ajax', function () {
        $('#keywords').val($(this).text());
        $('#search_ajax').fadeOut();
    });
</script>

{{--ajax xem nhanh sản phẩm --}}
<script type="text/javascript">

    $('.xemnhanh').click(function () {
        var product_id = $(this).data('id_product');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('/quickview')}}",
            method: "POST",
            dataType: "JSON",
            data: {product_id: product_id, _token: _token},
            success: function (data) {
                $('#product_quickview_title').html(data.product_name);
                $('#product_quickview_id').html(data.product_id);
                $('#product_quickview_price').html(data.price);
                $('#product_quickview_image').html(data.image);
                $('#product_quickview_gallery').html(data.product_gallery);
                $('#product_quickview_desc').html(data.desc);
                $('#product_quickview_content').html(data.content);
                $('#product_quickview_value').html(data.product_quickview_value);
                $('#product_quickview_button').html(data.product_button);
            }
        });
    });

</script>


{{--đánh giá sao--}}
<script type="text/javascript">
    function remove_background(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#ccc');
        }
    }

    //hover chuột đánh giá sao
    $(document).on('mouseenter', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        // alert(index);
        // alert(product_id);
        remove_background(product_id);
        for (var count = 1; count <= index; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });
    //nhả chuột ko đánh giá
    $(document).on('mouseleave', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var rating = $(this).data("rating");
        remove_background(product_id);
        //alert(rating);
        for (var count = 1; count <= rating; count++) {
            $('#' + product_id + '-' + count).css('color', '#ffcc00');
        }
    });

    //click đánh giá sao
    $(document).on('click', '.rating', function () {
        var index = $(this).data("index");
        var product_id = $(this).data('product_id');
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('insert-rating')}}",
            method: "POST",
            data: {index: index, product_id: product_id, _token: _token},
            success: function (data) {
                if (data == 'done') {
                    alert("Bạn đã đánh giá " + index + " trên 5");
                } else {
                    alert("Lỗi đánh giá");
                }
            }
        });

    });
</script>
{{--js xử lý so sánh--}}
<script type="text/javascript">
    // function delete_compare(id) {
    //     if (localStorage.getItem('compare') != null) {
    //         var data = JSON.parse(localStorage.getItem('compare'));
    //         var index = data.findIndex(item => item.id === id);
    //         data.splice(index, 1);
    //         localStorage.setItem('compare', JSON.stringify(data));
    //
    //         document.getElementById("row_compare" + id).remove();
    //     }
    // }
    //
    // viewed_compare();
    //
    // function viewed_compare() {
    //     if (localStorage.getItem('compare') != null) {
    //         var data = JSON.parse(localStorage.getItem('compare'));
    //
    //         for (i = 0; i < data.length; i++) {
    //             var name = data[i].name;
    //             var price = data[i].price;
    //             var image = data[i].image;
    //             var url = data[i].url;
    //             var content = data[i].content;
    //             var id = data[i].id;
    //             $('#row_compare').find('tbody').append(`
    //              <tr id="row_compare` +id+`">
    //                     <td>` +name+ `</td>
    //                     <td>` +price+ `</td>
    //                     <td><img width="200px" src="` +image+ `"></td>
    //                     <td></td>
    //                     <td></td>
    //                     <td></td>
    //                     <td <a href="` +url+ `">Xem sản phẩm </a></td>
    //                     <td onclick="delete_compare(` +id+ `)"><a style="cursor:pointer;">Xóa so sánh</a></td>
    //                 </tr>
    //
    //
    //             `);
    //
    //
    //         }
    //     }
    // }

    // $(document).ready(function($) {
    //     $("#div").on("click", "a", function(event) {
    //         event.preventDefault();
    //         jQuery.noConflict();
    //         $('#myModal').modal('show');
    //
    //     });
    // });
    function add_compare(product_id){
        // alert(product_id)
        // document.getElementById('title-compare').innerText ='chỉ cho phép so sánh tối đa 3 sản phẩm';
        // var id = product_id;
        // var name= document.getElementById('wishlist_productname'+id).value;
        // var content = document.getElementById('wishlist_productcontent'+id).value;
        // var price = document.getElementById('wishlist_productprice'+id).value;
        // var image = document.getElementById('wishlist_productimage'+id).src;
        // var url = document.getElementById('wishlist_producturl'+id).href;
        //
        // var newItem = {
        //     'url':url,
        //     'id':id,
        //     'name':name,
        //     'price':price,
        //     'image':image,
        //     'content':content,
        // }
        // if (localStorage.getItem('compare')==null){
        //     localStorage.setItem('compare','[]');
        // }
        // var old_data = JSON.parse(localStorage.getItem('compare'));
        // var  matches = $.grep(old_data, function (obj){
        //     return obj.id ==id;
        // })
        // if (matches.length){
        //
        // }else{
        //     if (old_data.length<=3){
        //         old_data.push(newItem);
        //         $('#row_compare').find('tbody').append(`
        //          <tr id="row_compare` +id+`">
        //                 <td>` +newItem.name+ `</td>
        //                 <td>` +newItem.price+ `</td>
        //                 <td><img width="200px" src="` +image+ `"></td>
        //                 <td></td>
        //                 <td></td>
        //                 <td></td>
        //                 <td <a href="` +newItem.url+ `">Xem sản phẩm </a></td>
        //                 <td onclick="delete_compare(` +id+ `)"><a style="cursor:pointer;">Xóa so sánh</a></td>
        //             </tr>
        //
        //
        //         `);
        //
        //     }
        // }
        // localStorage.setItem('compare',JSON.stringify(old_data));
        // $('#compare').modal();
        // window.$('#compare').modal();
        // $('#compare').modal('show');

    }

</script>


{{--lịch sử mua hàng--}}
<script>
    $(function () {
        $("#appect_receive_products").click(function (event) {
            event.preventDefault();
            url = $(this).attr("href");
            swal({
                title: "Bạn có chắc chắn?",
                text: "Bạn đã thực sự nhận được những sản phẩm được gửi từ bên chúng tôi chưa !!",
                icon: "info",
                buttons: ["Không", {
                    text: "Đồng ý",
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true
                }],
                successMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Thành công", "Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi !", 'success').then(function () {
                        window.location.href = url;
                    });
                }
            });
        });
        $(".js_order_item").click(function (event) {
            event.preventDefault();
            var id = $(this).attr('data-id');
            var url = $(this).attr('href');
            $.ajax({
                method: "GET",
                url: url
            }).done(function (result) {
                if (result) {
                    $(".modal_id_transacrion").text(id);
                    $(".modal-body").html('').append(result);
                }
            });
        });
    });
</script>
{{--so sánh sản phẩm --}}


{{--Lọc giá--}}
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}

{{--        $( "#slider-range" ).slider({--}}
{{--            orientation: "horizontal",--}}
{{--            range: true,--}}

{{--            min:{{$min_price_range}},--}}
{{--            max:{{$max_price_range}},--}}

{{--            steps:10000,--}}
{{--            values: [ {{$min_price}}, {{$max_price}} ],--}}

{{--            slide: function( event, ui ) {--}}
{{--                $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();--}}
{{--                $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();--}}


{{--                $( "#start_price" ).val(ui.values[ 0 ]);--}}
{{--                $( "#end_price" ).val(ui.values[ 1 ]);--}}

{{--            }--}}

{{--        });--}}

{{--        $( "#amount_start" ).val($( "#slider-range" ).slider("values",0)).simpleMoneyFormat();--}}
{{--        $( "#amount_end" ).val($( "#slider-range" ).slider("values",1)).simpleMoneyFormat();--}}

{{--    });--}}
{{--</script>--}}

{{--<Đường dẫn thư viện Alert js>--}}

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


