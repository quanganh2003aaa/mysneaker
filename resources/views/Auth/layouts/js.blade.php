<!-- modernizr JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/vendor/modernizr-2.8.3.min.js') }}"></script>
<!-- quickview product start -->
<!-- jquery
        ============================================ -->
<script src="{{ asset('assetsClient/js/vendor/jquery-1.12.1.min.js') }}"></script>
<!-- bootstrap JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/bootstrap.min.js') }}"></script>
<!-- wow JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/wow.min.js') }}"></script>
<!-- price-slider JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/jquery-price-slider.js') }}"></script>
<!-- nivoslider JS
        ============================================ -->
<script src="{{ asset('assetsClient/lib/js/jquery.nivo.slider.js') }}"></script>
<script src="{{ asset('assetsClient/lib/home.js') }}"></script>
<!-- meanmenu JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/owl.carousel.min.js') }}"></script>
<!-- elevatezoom JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/jquery.elevatezoom.js') }}"></script>
<!-- scrollUp JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/jquery.scrollUp.min.js') }}"></script>
<!-- plugins JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/plugins.js') }}"></script>
<!-- main JS
        ============================================ -->
<script src="{{ asset('assetsClient/js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (session()->has('success'))
        toastr.success('{{ session()->get('success') }}')
    @elseif (session()->has('error'))
        toastr.error('{{ session()->get('error') }}')
    @endif
</script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
