<!doctype html>
<html class="no-js" lang="">
<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Home || MySneaker </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- favicon
        ============================================ -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('assetsClient/img/PQTA (1).png')}}">

        @include('Auth.layouts.css')

    </head>
    <body>
        @include('Auth.layouts.header')

        @yield('content')

        @include('Auth.layouts.footer')
        @include('Auth.layouts.js')
        <script>
            $('.price_from').val(<?php echo $price['min'] ?>);
            $('.price_to').val(<?php echo $price['max'] ?>);
            $(function() {
                $("#slider-range").slider({
                    range: true,
                    min: <?php echo $price['min']; ?>,
                    max: <?php echo $price['max']; ?>,
                    values: [<?php echo $price['min']; ?>, <?php echo $price['max']; ?>],
                    slide: function(event, ui) {
                        $("#amount").val(addPlus(ui.values[0]) + "đ" + " - " + addPlus(ui.values[1]) + "đ");
                        $('.price_from').val(ui.values[0]);
                        $('.price_to').val(ui.values[1]);
                    }
                });
                $("#amount").val(addPlus($("#slider-range").slider("values", 0)) +
                    "đ - " + addPlus($("#slider-range").slider("values", 1)) + "đ");
            });

            function addPlus(nStr) {
                nStr += '';
                x = nStr.split('.');
                x1 = x[0];
                x2 = x.length > 1 ? '.' + x[1] : '';
                var rgx = /(\d+)(\d{3})/;
                while (rgx.test(x1)) {
                    x1 = x1.replace(rgx, '$1' + '.' + '$2');
                }
                return x1 + x2;
            };
        </script>

    </body>
</html>
