@push('js')
    <script src="{{ asset('/') }}assets/frontend/js/city.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#apply-coupon', function(e) {
                e.preventDefault();
                $('#coupon').removeClass('is-invalid');
                let code = $('input#coupon').val();
                let id = "{!! $request->id !!}";
                let qty = "{!! $request->qty !!}";
                let dynamic_price = "{!! $request->dynamic_price !!}";
                let shipping_charge = 0;
                let download_able = "{!! $product->download_able !!}";

                if (download_able != 1) {
                    if ($("select[name='city']").val() == 'Dhaka') {
                        let charge = "{!! setting('shipping_charge') !!}";
                        shipping_charge += parseInt(charge);
                    } else {
                        let charge = "{!! setting('shipping_charge_out_of_range') !!}";
                        shipping_charge += parseInt(charge);
                    }
                }

                if (code != '') {
                    $.ajax({
                        type: 'GET',
                        url: '/apply/coupon/buy-now/' + code + '/' + id + '/' + qty + '/' +
                            dynamic_price,
                        dataType: "JSON",
                        success: function(response) {
                            console.log(response);
                            $('.alert-message').removeClass('d-none');
                            if (response.alert == 'success') {
                                $('.alert-message .alert').removeClass('alert-danger').addClass(
                                    'alert-success').text(response.message);
                                $('span#ship-charge').text(number_format(shipping_charge, 2,
                                    '.', ','));
                                $('span#coupon').text(number_format(response.discount, 2, '.',
                                    ','));
                                let total = response.total + shipping_charge;
                                $('span#total').text(number_format(total, 2, '.', ','));
                                $('span.coupon-name').text('(' + code + ')');
                                $('#coupon').val('')
                            } else {
                                $('.alert-message .alert').removeClass('alert-success')
                                    .addClass('alert-danger').text(response.message);
                            }
                        },
                        error: function(xhr) {
                            console.log(xhr);
                        }
                    });
                } else {
                    $('#coupon').addClass('is-invalid');
                }
                setTimeout(() => {
                    $('.alert-message .alert').removeClass('alert-danger alert-success').text('');
                }, 10000);

            });


            // default COD - Payment Method
            $('#cod').parent("label").css("background", "yellow");
            $('.payment_method').change(function(e) {
                // Check if the selected payment method is not "Cash on Delivery"
                if ($(this).val() !== 'Cash on Delivery') {
                    // If not, automatically select the "Cash on Delivery" option
                    $('#cod').parent("label").css("background", "white");

                }
            });

            $(document).on('click', '.payment_method', function(e) {
                $("label").css("background", "white");
                $(this).parent("label").css("background", "yellow");
                let method = $(this).val();
                let html = '';
                var bkash = "{{ setting('bkash') }}";
                var nogod = "{{ setting('nagad') }}";
                var rocket = "{{ setting('rocket') }}";
                var bank = "{!! setting('bank_name') !!}";
                var branch = "{!! setting('branch_name') !!}";
                var holder = "{!! setting('holder_name') !!}";
                var account = "{!! setting('bank_account') !!}";
                var appended = $('#appended');;
                if (method == 'Bkash') {
                    appended.html(bkash + ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
                    off_email();
                } else if (method == 'Nagad') {
                    appended.html(nogod + ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
                    off_email();
                } else if (method == 'Rocket') {
                    appended.html(rocket +
                        ' - এই নাম্বারে টাকা পাঠিয়ে নিচের ফিল্ডে  Transaction ID টি দিন');
                    off_email();
                } else if (method == 'Bank') {
                    appended.html('নিচে দেয়া ব্যাংকে টাকা পাঠিয়ে নিচের ফিল্ডগুলো পূরণ করুন <br> ' +
                        'Bank Name: ' + bank + '<br>Branch: ' + branch + '<br>holder: ' + holder +
                        '<br>Account: ' + account);
                    
                        off_email();
                } else if (method == 'Cash on Delivery') {
                    appended.html('পণ্য হাতে পেয়ে টাকা দিন। ');
                    off_email();
                } else if (method == 'uddoktapay') {

                    // Email On
                    $('#email_wrap').removeClass('d-none');
                    $('#email').prop('required', true);
                    $('#email').addeAttr('required');

                    // document.getElementById("email_wrap").classList.remove("d-none");
                    // document.getElementById("email_wrap").style.display = 'block';
                    console.log("uddaktapay");


                } else {
                    appended.html('');
                    off_email();
                }


                if (method == 'Bkash' || method == 'Nagad' || method == 'Rocket') {

                    off_email();

                    html += '<div class="form-group">'
                    html += '<label for="mobile_number">Mobile Number</label>'
                    html +=
                        '<input required type="text" name="mobile_number" id="mobile_number" class="form-control" placeholder="Enter your mobile number"/>'
                    html += '</div>'
                    html += '<div class="form-group">'
                    html += '<label for="transaction_id">Transaction ID</label>'
                    html +=
                        '<input required type="text" name="transaction_id" id="transaction_id" class="form-control" placeholder="Enter transaction ID"/>'
                    html += '</div>'
                } else if (method == 'Bank') {

                    off_email();

                    html += '<div class="form-group">'
                    html += '<label for="bank_name">Bank Name</label>'
                    html +=
                        '<input required type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter bank name"/>'
                    html += '</div>'
                    html += '<div class="form-group">'
                    html += '<label for="account_number">Account Number</label>'
                    html +=
                        '<input required type="text" name="account_number" id="account_number" class="form-control" placeholder="Enter account number"/>'
                    html += '</div>'
                    html += '<div class="form-group">'
                    html += '<label for="holder_name">Holder Name</label>'
                    html +=
                        '<input required type="text" name="holder_name" id="holder_name" class="form-control" placeholder="Enter holder name"/>'
                    html += '</div>'
                    html += '<div class="form-group">'
                    html += '<label for="branch">Branch Name</label>'
                    html +=
                        '<input required type="text" name="branch" id="branch" class="form-control" placeholder="Enter branch name"/>'
                    html += '</div>'
                    html += '<div class="form-group">'
                    html += '<label for="routing">Routing Number</label>'
                    html +=
                        '<input required type="text" name="routing" id="routing" class="form-control" placeholder="Enter routing number"/>'
                    html += '</div>'
                } else {

                    off_email();

                    html = '';
                }
                $('#payment-details').html(html);
            })
            $(document).on('change', '#shipping_range', function(e) {
                divis()
            });


            // Email Off
            function off_email(){
                $('#email_wrap').addClass('d-none');
                $('#email').removeAttr('required');
            }
            
            
            divis();
            function divis() {
                let shipping_charge = 0;
                let download_able = "{!! $product->download_able !!}";
                if (download_able != 1) {
                    if ($("select[name='shipping_range']").val() == 1) {
                        let charge = "{!! setting('shipping_charge') !!}";
                        shipping_charge += parseInt(charge);
                    } else {
                        let charge = "{!! setting('shipping_charge_out_of_range') !!}";
                        shipping_charge += parseInt(charge);
                    }
                }
                let subtotal = $('span#sub-total').text();
                let coupon = $('span#coupon').text();
                let rep_subtotal = subtotal.replace(',', '');
                let rep_coupon = coupon.replace(',', '');
                let total = (parseInt(rep_subtotal) + shipping_charge) - parseInt(rep_coupon);
                $('span#ship-charge').text(number_format(shipping_charge, 2, '.', ','));
                $('span#total').text(number_format(total, 2, '.', ','));
            }

            function number_format(number, decimals, dec_point, thousands_sep) {
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    toFixedFix = function(n, prec) {
                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                        var k = Math.pow(10, prec);
                        return Math.round(n * k) / k;
                    },
                    s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
        });
    </script>
@endpush