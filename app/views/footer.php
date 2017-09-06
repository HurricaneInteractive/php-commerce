<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                        $('#cart-count').text(sess.length);
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            });
        </script>
    </body>
</html>