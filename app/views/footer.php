        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        
        <script>
            $ = jQuery.noConflict();
            $('#add-to-cart').on('click', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                var title = $(this).parent().find('.card-title').text();
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
                        var successMsg = '<div class="alert alert-success" role="alert">' + title + ' was added to the cart! <a href="/cart">View cart</a></div>';
                        $('#messages').html(successMsg);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
        <?php if (isset($data['scripts'])): ?>
            <?php if (in_array('stripe', $data['scripts'])): ?>
                <script src="https://js.stripe.com/v3/"></script>
                <script src="js/stripe_payment.js"></script>
            <?php endif; ?>
        <?php endif; ?>
    </body>
</html>