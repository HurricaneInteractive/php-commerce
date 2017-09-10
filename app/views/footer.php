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
        <script>
            $('#checkout_form').on('submit', function(e) {
                e.preventDefault();
                // $(this).text('Processing...');
                formData = new FormData($(this));
                console.log(formData);
                $.ajax({
                    url: '/checkout/processPayment',
                    method: 'post',
                    data: formData,
                    processData: false,
                    success: function(response) {
                        console.log(response);
                        // $(this).text('Buy');
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    </body>
</html>