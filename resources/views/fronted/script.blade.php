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
                window.alert('C???m ??n b???n ???? mua h??ng c???a ch??ng t??i!');
            });
        }
    }, '#paypal-button');

</script>

<!-- Thanh to??n paypal -->
{{--<script src="https://www.paypalobjects.com/api/checkout.js"></script>--}}
{{--<script>--}}


{{--    kh???i t???o bi???n usd--}}
{{--    var usd = document.getElementById("vnd_to_usd").value;--}}
{{--    paypal.Button.render({--}}
{{--        // Configure environment( c???u h??nh m??i tr?????ng )--}}
{{--        env: 'sandbox',--}}
{{--        client: {--}}
{{--            //sandbox:l???y t??? Client ID myAccount--}}
{{--            sandbox: 'AUK8g5Mo-WRzU7zpJOBUgXHEbZkxyz1x_OcTsb_QdUYrG3WQggch2RWXDYv028Sfd_OOyll9YDK1ETgE',--}}
{{--            production: 'demo_production_client_id'--}}
{{--        },--}}
{{--        // Customize button (optional)--}}
{{--        locale: 'en_US',--}}
{{--        style: {--}}
{{--            // size: 'small',//l?? k??ch th?????c n???t paypal nh???--}}
{{--            size: 'large',// k??ch th?????c l???n--}}
{{--            color: 'gold',// m??u v??ng n???t thanh to??n paypal--}}
{{--            shape: 'pill',// ngh??a l?? bo tr??n n???t paypal--}}
{{--        },--}}

{{--        // Enable Pay Now checkout flow (optional)--}}
{{--        commit: true,--}}

{{--        // Set up a payment()--}}
{{--        payment: function(data, actions) {--}}
{{--            return actions.payment.create({--}}
{{--                transactions: [{--}}
{{--                    amount: {--}}
{{--                        // n???i chu???i--}}
{{--                        // total: `${usd}`,--}}
{{--                        total:'$110',--}}
{{--                        currency: 'USD'// ????n v??? ti???n t???--}}
{{--                    }--}}
{{--                }]--}}
{{--            });--}}
{{--        },--}}
{{--        // Execute the payment( sau khi th??nh c??ng hi???n th??? ra th???ng b??o)--}}
{{--        onAuthorize: function(data, actions) {--}}
{{--            return actions.payment.execute().then(function() {--}}
{{--                // Show a confirmation message to the buyer( th??ng tin x??c nh???n ????n h??ng )--}}
{{--                window.alert('C???m ??n b???n ???? mua h??ng c???a ch??ng t??i!');--}}
{{--            });--}}
{{--        }--}}
{{--    }, '#paypal-button');--}}

{{--</script>--}}

{{--??o???n m?? ajax n??y d??ng ????? S???p x???p theo k?? t???--}}

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
{{--    // ?????nh ngh??a ph????ng th???c addTocart n??y--}}
{{--    // truy???n  tham s??? event v??o h??m--}}
{{--    function addTocart(event){--}}
{{--        // alert('12345')--}}
{{--    // event.preventDefault(); Hu??? b??? event n???u n?? c?? th??? hu??? m?? kh??ng d???ng s??? lan r???ng(propagation) c???a event t???i ph???n kh??c.--}}
{{--        //B??y gi??? s??? kh??ng c?? g?? x???y ra--}}
{{--        event.preventDefault();--}}
{{--        //?????u ti??n n?? s??? l???y ra bi???t let , m??nh c?? url ????? m??nh call ajax,--}}
{{--          // khi click v??o button s??? l?? this v?? g???i ?????n data--}}
{{--        // key l?? url--}}
{{--       let urlCart = $(this).data('url');// ???? x??c ?????nh ???????c url ????? call ajax r???i--}}
{{--        //ti???p ?????n m??nh s??? g???i ajax--}}
{{--        //????? g???i ???????c ajax d??ng: $.ajax--}}
{{--        // v?? truy???n option trong ph????ng th???c  $.ajax()--}}
{{--        //Ajax l?? g?? : l?? m???t h??nh ?????ng n?? s??? g???i xml--}}
{{--       // http ????? request v?? sau ???? nh???n ???????c data tr??? v??? trong c??i success--}}

{{--        $.ajax({--}}
{{--                //truy???n option ??? ????y l?? type- lo???i--}}
{{--            // mu???n ??? b??n kia nh???n request l?? Get, v?? t???o route l?? get b??n web.php--}}
{{--            //c?? lo???i l?? get--}}
{{--            type:"GET",--}}
{{--            // v?? c?? url ????? m??nh g???i ajax--}}
{{--            // khi m??nh nh???n button th?? s??? th???c hi???n 1 c??i  request ?????n  url n??y--}}
{{--            // url n??y ch??nh b???ng c??i urlCart m??nh l???y ???????c--}}
{{--            url:urlCart,--}}
{{--            // v?? m??nh c?? 2 c??i s???c s??t  (success)--}}
{{--            // t???o m???t function call back t???c l?? g???i l???i h??m--}}
{{--            // khi m?? d??? li???u tr??? v??? c???a m??nh ok, ko c?? l???i g?? s??? ch???y v??o c??i success n??y--}}
{{--            // v?? nh???n v??o c??i data n??y ch??nh l?? c??i d??? li???u tr??? v???--}}
{{--            // mu???n d??? li???u tr??? v??? json--}}
{{--            //Th??m dataType--}}
{{--            // b??n server tr??? v???--}}
{{--            // json l?? g??: l?? c?? key v?? value--}}
{{--            dataType: 'json',--}}
{{--            success: function (data){--}}


{{--            },--}}
{{--            // c?? e do (error) l???i th?? m??nh c??ng ph???i c?? m???t function call back h??m g???i l???i--}}
{{--            error: function (){--}}

{{--            },--}}


{{--        });--}}
{{--    }--}}
{{--    $(function (){--}}
{{--        // trong n??y m??nh s??? l?? call ajax--}}
{{--        // ?????u ti??n m??nh b???t s??? ki???n l?? $('.add_to_cart') v?? b???t s??? ki???n on('click',addTocart)--}}
{{--        // trong on s??? d???ng ph????ng th???c l?? addTocart--}}
{{--        $('.add_to_cart').on('click',addTocart)--}}
{{--    });--}}
{{--</script>--}}


{{--S??? d???ng ajax ????? th??m s???n ph???m trang chi ti???t v??o gi??? h??ng --}}
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
        //     alert('L??m ??n ?????t nh??? h??n ' + pro_quantity);
        // }else{
            $.ajax({
                url: url,
                method: 'post',
                data: {
                    _token: _token, quantity: quantity, product_id: product_id
                },
                success: function () {
                    swal({
                            title: "???? th??m s???n ph???m v??o gi??? h??ng",
                            text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                            showCancelButton: true,
                            cancelButtonText: "Xem ti???p",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "??i ?????n gi??? h??ng",
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


{{--<mua ngay s???n ph???m ??? quickview(xem nhanh)  s???n ph???m s??? d???ng Ajax Jquery.>--}}

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
                $("#beforesend_quickview").html("<p class='text text-primary'>??ang th??m s???n ph???m v??o gi??? h??ng</p>");
            },
            success: function () {
                $("#beforesend_quickview").html("<p class='text text-success'>S???n ph???m ???? th??m v??o gi??? h??ng</p>");


            }

        });

    });
    $(document).on('click', '.redirect-cart', function () {
        window.location.href = "{{url('/shopping-list-cart')}}";
    });

</script>

{{--<Th??m s???n ph???m s??? d???ng Ajax Jquery.>--}}
<script>
    // t???o 1 h??m c?? t??n l?? add() v?? nh???n v??o 1 $product_id
    function add(product_id) {
        // // in ra
        // console.log(product_id)
        // ti???p theo m??nh s??? th???c hi???n c?? ph??p ajax
        //ajax s??? d???ng jquery m??nh ???? c?? th?? vi???n jquery r???i <script src="https://code.jquery.com/jquery-3.6.0.min.js" >
        // <!-- url:'', -->
        $.ajax({
            <!-- url:'', l?? c??i ???????ng d???n  m??nh l???y b??n route web.php product.addToCart sau ???? + id-->
            url: 'add-to-cart/' + product_id,
            <!-- type:'', l?? c??i get hay post, hi???n t???i m??nh d??ng GET , m??nh s??? ??i???n v??o l?? Get  -->

            type: 'GET',
            // <!-- C??n ph???n  .done(function (response){

            // });  l?? song done ????n l?? song th??nh c??ng th?? tr??? v??? k???t qu??? ??? l?? ????y (response)  response c?? th??? ?????t t??n kh??c-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // g???i h??m RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('???? th??m m???i s???n ph???m');

        });

    }


    // h??m n??y th???c hi???n x??a gi??? h??ng  g???i class cha v?? b???t s??? ki???n cho class = close b??n file cart.blade.php
    function delete_cart(product_id) {
        /// in object hi???n t???i l?? this ch??nh l?? ?????i t?????ng mu???n click x??a ??? b??n cart.blade.php
        /// m??nh ph???i l???y ???????c c??i id th?? m??nh m???i bi???t m??nh ??ang x??a cho s???n ph???m n??o
        /// ?????i t?????ng this s??? , t???i thu???c t??nh l?? data v?? t??n product_id truy???n v??o l?? m??nh ?????t b??n cart.blade.php data-id="$item['item']->product_id}}"></i>
        // console.log($(this).data("product_id"));

        $.ajax({
            <!-- url:'', l?? c??i ???????ng d???n  m??nh l???y b??n route web.php product.addToCart sau ???? + id-->
            url: 'delete-item-cart/' + product_id,
            <!-- type:'', l?? c??i get hay post, hi???n t???i m??nh d??ng GET , m??nh s??? ??i???n v??o l?? Get  -->

            type: 'GET',
            // <!-- C??n ph???n  .done(function (response){

            // });  l?? song done ????n l?? song th??nh c??ng th?? tr??? v??? k???t qu??? ??? l?? ????y (response)  response c?? th??? ?????t t??n kh??c-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // g???i h??m RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('???? x??a s???n ph???m');

        });

    };

    // t???o h??m RenderCart
    function RenderCart(response) {
        $("#change-item-cart").empty();
        $("#change-item-cart").html(response);
        // in id id="total-quanty-cart"  b??n  cart.blade.php ki???m gi?? tr??? xem
        // console.log($("#total-quanty-cart").val())
        //t???o m???t c??i elemen c?? id l?? total-quanty-show. text() v?? b???ng v???i s??? l?????ng m???i n??y $("#total-quanty-cart").val()

        //---------//
        //ph???n x??? l?? t???ng ti???n v?? s??? l?????ng ??? gi??? h??ng
        $("#total-quanty-show").text($("#total-quanty-cart").val());
        $("#total-quanty-show").text($("#total-price-cart").val());


    }


</script>


<script>

    // h??m x??? l?? ch???c n??ng x??a ??? danh s??ch gi??? h??ng
    function DeleteListIteamCart(product_id) {
        // in product_id ra
        // console.log(product_id);

        $.ajax({
            <!-- url:'', l?? c??i ???????ng d???n  m??nh l???y b??n route web.php product.addToCart sau ???? + id-->
            url: 'delete-item-list/' + product_id,
            <!-- type:'', l?? c??i get hay post, hi???n t???i m??nh d??ng GET , m??nh s??? ??i???n v??o l?? Get  -->

            type: 'GET',
            // <!-- C??n ph???n  .done(function (response){

            // });  l?? song done ????n l?? song th??nh c??ng th?? tr??? v??? k???t qu??? ??? l?? ????y (response)  response c?? th??? ?????t t??n kh??c-->
        }).done(function (response) {
            // console.log(response);
            // $("#change-item-cart").empty();
            // $("#change-item-cart").html(response);
            // $("#total-quanty-show").text($("#total-quanty-cart").val());
            // $("#total-quanty-show").text($("#total-price-cart").val());

            // g???i h??m RenderCart
            RenderListCart(response);
            alertify.success('???? x??a s???n ph???m th??nh c??ng');

        });


    }

    // h??m x??? l?? ch???c n??ng l??u s??? l?????ng c???p nh???t ??? danh s??ch gi??? h??ng
    function SaveListCart(product_id) {
        // $("#quanty-item-"+product_id).val();// ????y ch??nh l?? gi?? tr??? ???? thay ?????i
        ///t???i ?????y ch??ng ta  l???y c??i id = quanty-item elemen b??n ph??a list_cart ra
        // $("#quanty-item-"+ product_id).val()
        // in product_id ra
        // console.log(product_id)
        // console.log($("#quanty-item-"+ product_id).val());
        ///Ch??ng ta th???c hi???n ajax v?? ph???i request qua m???t c??i url save-item-list l??m ch???c n??ng l?? l??u
        $.ajax({
            // <!-- url:'', l?? c??i ???????ng d???n  m??nh l???y b??n route web.php product.addToCart sau ???? + id
            //  t???i ?????y ch??ng ta  l???y c??i id = quanty-item elemen b??n ph??a list_cart ra
            //  product_id l?? id truy???n v??o c??n  $("#quanty-item-"+ product_id).val(),l?? s??? l?????ng  -->
            //save-item-list/'+product_id+'/'+$("#quanty-item-"+ product_id).val(), <=> save-item-list/1/5
            //product_id =1 c??n $("#quanty-item-"+ product_id).val() l?? =5 l?? s??? l?????ng
            url: 'save-item-list/' + product_id + '/' + $("#quanty-item-" + product_id).val(),
            <!-- type:'', l?? c??i get hay post, hi???n t???i m??nh d??ng GET , m??nh s??? ??i???n v??o l?? Get  -->

            type: 'GET',
            // <!-- C??n ph???n  .done(function (response){

            // });  l?? song done ????n l?? song th??nh c??ng th?? tr??? v??? k???t qu??? ??? l?? ????y (response)  response c?? th??? ?????t t??n kh??c-->
        }).done(function (response) {

            // g???i h??m RenderCart
            location.reload();
            // RenderCart(response);
            alertify.success('???? th??m m???i s???n ph???m');

        });
    }

    function RenderListCart(response) {
        //x??? l?? x??a chi ti???t gi??? h??ng
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

    // t???o m???t s??? ki???n ????? g???i ?????i t?????ng edit-all v?? on ra
    // trong on() m??nh l???y s??? ki???n click
    //s??? d???ng c?? ph??o jquery
    $(".edit-all").on("click", function () {
        // th?? in ra m???t th??ng b??o alert
        //
        // t???o ra m???t bi???t ch???a danh s??ch ??? ????y l?? array m???ng
        let lists = [];
        // s??? d???ng c?? ph??p vi???t ng???n g???n c???a jquery
        //c??i each() t????ng ??????ng v???i c??i foreach()
        $("table tbody tr td").each(function () {
            //trong h??m n??y l???p l???y ra
            // t??m input , ??? input ch???a t???t c??? gi?? tr??? s??? l?????ng ??? trong ?? input
            //c?? ph??p t??m input , s??? ch??nh l?? ?????i t?????ng td hi???n t???i l?? ?????i t?????ng this
            // ?????i t?????ng this n??y tr??? ?????n h??m find(), trong h??m find c???n t??m input
            // t??? find ch???m t???i each() trong each c?? 1 function
            $(this).find("input").each(function () {// c??  ph??p n??y ???? t??m ???????c input
                //trong element th???c hi???n t???i t?????ng c?? key $(this)  v?? value
                let element = {key: $(this).data("product_id"), value: $(this).val()};
                // l???y bi???t ch???a danh s??ch list ch???m push l?? ?????y l??n  trong push truy???n v??o bi???t
                // truy???n bi???t element v??o trong push
                lists.push(element);
            })
        });
        // in ra m??n m??nh console
        // console.log(list)
        // khi c?? danh s??ch s??? th???c hi???n ajax
        $.ajax({
            // <!-- url:'', l?? c??i ???????ng d???n  m??nh l???y b??n route web.php product.addToCart sau ???? + id
            //  t???i ?????y ch??ng ta  l???y c??i id = quanty-item elemen b??n ph??a list_cart ra
            //  product_id l?? id truy???n v??o c??n  $("#quanty-item-"+ product_id).val(),l?? s??? l?????ng  -->
            //save-item-list/'+product_id+'/'+$("#quanty-item-"+ product_id).val(), <=> save-item-list/1/5
            //product_id =1 c??n $("#quanty-item-"+ product_id).val() l?? =5 l?? s??? l?????ng
            url: 'save-all',
            <!-- type:'', l?? c??i post , hi???n t???i m??nh d??ng post , m??nh s??? ??i???n v??o l?? post -->
            // ??i qua ph????ng th???c post, ?????i v???i ph????ng th???c post c???n c?? th??m data
            type: 'POST',
            //data c?? c??c ?????i t?????ng truy???n v??o c?? 2 th??? quan tr???ng l?? token v?? data
            //token c???n c??i csrf_token() x??c th???c ????? ?????y d??? li???u qua ko b??? l???i
            // data ???????c truy???n v??o ch??nh l?? c??i nh???n l???i b??n ph??a controoler
            data: {
                "_token": "{{csrf_token()}}",
                "data": lists,
            }
            // <!-- C??n ph???n  .done(function (response){
            // });  l?? song done ????n l?? song th??nh c??ng th?? tr??? v??? k???t qu??? ??? l?? ????y (response)  response c?? th??? ?????t t??n kh??c-->
        }).done(function (response) {
            // alert("ok")
            location.reload();

            // g???i h??m RenderCart
            // RenderListCart(response);
            // alertify.success('???? c???p nh???t s???n ph???m th??nh c??ng');

        });

    });
</script>

{{--h??m s??? l?? th??m s???n ph???m t??? chi ti???t --}}

<script>
    function addCartDetails(product_id) {
        console.log(product_id);
    }
</script>

{{--khi m?? ng?????i d??ng ch???n th??nh ph???--}}

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
// //khi m?? ng?????i d??ng ch???n th??nh ph???
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

{{--x??c nh???n ????n h??ng--}}
<script type="text/javascript">
    $(document).ready(function () {
        $('.send_order').click(function () {
            swal({
                    title: "X??c nh???n ????n h??ng",
                    text: "Ho??n th??nh b?????c n??y s??? gi??p b???n nh???n ???????c s???n ph???m nhanh h??n",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "C???m ??n!, Mua h??ng",
                    cancelButtonText: "????ng,ch??a mua!",
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
                                swal("????n h??ng", "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng", "success");
                            }
                        });

                        //khi x??c nh???n ????n h??ng thanh c??ng r???i , s??? th??ng b??o l?? x??c nh???n ????n h??ng th??nh c??ng
                        window.setTimeout(function () {
                            location.reload();
                            // sau ???? kho???ng 3s s??? Refresh l???i c??i form checkout
                        }, 3000);

                    } else {
                        swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");
                    }
                });
        });
    });
</script>


{{--<script type="text/javascript">--}}
{{--    $(document).ready(function(){--}}

{{--//????u ti??n b???t c??i id="sort" trong th??? <select name="sort" id="sort" class="nice-select form-control">--}}
{{--//.on change trong select l?? s??? thay ?????i (kh??ch h??ng c?? ch???n)--}}

{{--        $('#sort').on('change',function(){--}}
{{--            //$(this) l?? b???t ???????ng d???n ??? trong select mang id="sort"--}}
{{--            //This c?? ngh??a l?? ????y  v?? this = c???m--}}
{{--           // n??y $('#sort').on('change',function(){--}}

{{--                var url = $(this).val();//.val() l?? l???y c??i gi?? tr??? khi select thay ?????i--}}

{{--            // alert(url);--}}
{{--            if (url) {--}}
{{--                window.location = url;--}}
{{--            }--}}
{{--            return false;--}}
{{--        });--}}

{{--    });--}}
{{--</script>--}}


{{--??o???n ajax x??? l?? comment--}}
<script type="text/javascript">
    $(document).ready(function () {

        load_comment();

        //t???o h??m function load_comment()
        function load_comment() {
            //load load_comment() d???a tr??n product_id
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

                    $('#notify_comment').html('<span class="text text-success">Th??m b??nh lu???n th??nh c??ng, b??nh lu???n ??ang ch??? duy???t</span>');
                    load_comment();
                    $('#notify_comment').fadeOut(9000);
                    $('.comment_name').val('');
                    $('.comment_content').val('');
                }
            });
        });
    });
</script>

{{--<T??m ki???m Autocomplete>--}}
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

{{--ajax xem nhanh s???n ph???m --}}
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


{{--????nh gi?? sao--}}
<script type="text/javascript">
    function remove_background(product_id) {
        for (var count = 1; count <= 5; count++) {
            $('#' + product_id + '-' + count).css('color', '#ccc');
        }
    }

    //hover chu???t ????nh gi?? sao
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
    //nh??? chu???t ko ????nh gi??
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

    //click ????nh gi?? sao
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
                    alert("B???n ???? ????nh gi?? " + index + " tr??n 5");
                } else {
                    alert("L???i ????nh gi??");
                }
            }
        });

    });
</script>
{{--js x??? l?? so s??nh--}}
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
    //                     <td <a href="` +url+ `">Xem s???n ph???m </a></td>
    //                     <td onclick="delete_compare(` +id+ `)"><a style="cursor:pointer;">X??a so s??nh</a></td>
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
        // document.getElementById('title-compare').innerText ='ch??? cho ph??p so s??nh t???i ??a 3 s???n ph???m';
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
        //                 <td <a href="` +newItem.url+ `">Xem s???n ph???m </a></td>
        //                 <td onclick="delete_compare(` +id+ `)"><a style="cursor:pointer;">X??a so s??nh</a></td>
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


{{--l???ch s??? mua h??ng--}}
<script>
    $(function () {
        $("#appect_receive_products").click(function (event) {
            event.preventDefault();
            url = $(this).attr("href");
            swal({
                title: "B???n c?? ch???c ch???n?",
                text: "B???n ???? th???c s??? nh???n ???????c nh???ng s???n ph???m ???????c g???i t??? b??n ch??ng t??i ch??a !!",
                icon: "info",
                buttons: ["Kh??ng", {
                    text: "?????ng ??",
                    value: true,
                    visible: true,
                    className: "bg-success",
                    closeModal: true
                }],
                successMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    swal("Th??nh c??ng", "C???m ??n b???n ???? s??? d???ng d???ch v??? c???a ch??ng t??i !", 'success').then(function () {
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
{{--so s??nh s???n ph???m --}}


{{--L???c gi??--}}
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


