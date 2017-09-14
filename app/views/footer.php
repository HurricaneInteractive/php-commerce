        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            $ = jQuery.noConflict();
            $('.product a').on('click', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $.ajax({
                    url: '/cart/add',
                    method: 'post',
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        var sess = response.session;
                        $('#cart-count').text(sess);
                        var successMsg = '<div class="alert alert-success" role="alert">Item was added to the cart! <a href="/cart">View cart</a></div>';
                        $('#messages').html(successMsg);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
        <!-- <script>
            $('#checkout_form').on('submit', function(e) {
                e.preventDefault();
                // $(this).text('Processing...');
                var elems = document.getElementById('checkout_form');
                var inputs = elems.elements;

                $.ajax({
                    url: '/checkout/processPayment',
                    method: 'post',
                    data: {
                        card_number: inputs.card_number.value,
                        cvc: inputs.cvc.value,
                        expiry_month: inputs.expiry_month.value,
                        expiry_year: inputs.expiry_year.value
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        // $(this).text('Buy');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script> -->
        <script>
            var stripe = Stripe('pk_test_WIRYtSewtY7gFWIHZG7zNcXk');
            var elements = stripe.elements();

            var card = elements.create('card', {
                style: {
                    base: {
                        iconColor: '#666EE8',
                        color: '#31325F',
                        lineHeight: '40px',
                        fontWeight: 300,
                        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                        fontSize: '15px',

                        '::placeholder': {
                            color: '#CFD7E0',
                        },
                    },
                }
            });
            card.mount('#card-element');

            function setOutcome(result) {
                var successElement = document.querySelector('.success');
                var errorElement = document.querySelector('.error');
                successElement.classList.remove('visible');
                errorElement.classList.remove('visible');

                if (result.token) {
                    // Use the token to create a charge or a customer
                    // https://stripe.com/docs/charges
                    successElement.querySelector('.token').textContent = result.token.id;
                    successElement.classList.add('visible');
                } 
                else if (result.error) {
                    errorElement.textContent = result.error.message;
                    errorElement.classList.add('visible');
                }
            }

            card.on('change', function(event) {
                setOutcome(event);
            });

            document.getElementById('checkout_form').addEventListener('submit', function(e) {
                e.preventDefault();
                var form = document.getElementById('checkout_form');
                var extraDetails = {
                    name: form.querySelector('input[name=cardholder-name]').value,
                };
                stripe.createToken(card, extraDetails).then(setOutcome);
            });
        </script>
    </body>
</html>