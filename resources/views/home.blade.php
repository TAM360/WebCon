<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <link rel="profile" href="http://gmpg.org/xfn/11"> --}}

    <title>Home</title>
    <link rel='dns-prefetch' href='//fonts.googleapis.com' />
    @include('layouts.header')
</head>

<body class="home page-template page-template-template-parts page-template-construction-home page-template-template-partsconstruction-home-php page page-id-22 wp-custom-logo">
    <input type="hidden" id="ajax-url" url="https://demo.accesspressthemes.com/construction/wp-admin/admin-ajax.php" />
    <div id="page" class="site">
        {{-- <a class="skip-link screen-reader-text" href="#content">Skip to content</a> --}}

        <header id="masthead" class="site-header" role="banner">
           @include('layouts.menubar')
        </header>
        <!-- #masthead -->
        @include('layouts.home.introSlide')
        <div id="content" class="site-content">
            @include('layouts.home.aboutUs')
            @include('layouts.home.appServices')
            {{-- @include('layouts.teamMembers') --}}
            @include('layouts.home.portfolio')
            {{-- @include('layouts.home.blog') --}}
            @include('layouts.home.helpYou')
            {{-- @include('layouts.home.shopItems') --}}
            {{-- @include('layouts.home.companyClients') --}}
        </div>
        <!-- #content -->
        <footer id="colophon" class="site-footer" role="contentinfo">
            @include('layouts.footer')
        </footer>
        <!-- #colophon -->
    </div>
    <!-- #page -->

    <script type='text/javascript'>
        /* <![CDATA[ */
        var wpcf7 = {
            "apiSettings": {
                "root": "https:\/\/demo.accesspressthemes.com\/construction\/wp-json\/contact-form-7\/v1",
                "namespace": "contact-form-7\/v1"
            },
            "recaptcha": {
                "messages": {
                    "empty": "Please verify that you are not a robot."
                }
            }
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.9.1'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_add_to_cart_params = {
            "ajax_url": "\/construction\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "https:\/\/demo.accesspressthemes.com\/construction\/?wc-ajax=%%endpoint%%",
            "i18n_view_cart": "View cart",
            "cart_url": "https:\/\/demo.accesspressthemes.com\/construction\/cart\/",
            "is_cart": "",
            "cart_redirect_after_add": "no"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min.js?ver=3.2.5'></script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min.js?ver=2.70'></script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/woocommerce/assets/js/js-cookie/js.cookie.min.js?ver=2.1.4'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var woocommerce_params = {
            "ajax_url": "\/construction\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "https:\/\/demo.accesspressthemes.com\/construction\/?wc-ajax=%%endpoint%%"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min.js?ver=3.2.5'></script>
    <script type='text/javascript'>
        /* <![CDATA[ */
        var wc_cart_fragments_params = {
            "ajax_url": "\/construction\/wp-admin\/admin-ajax.php",
            "wc_ajax_url": "https:\/\/demo.accesspressthemes.com\/construction\/?wc-ajax=%%endpoint%%",
            "fragment_name": "wc_fragments_2c54f85df4b8180f5cfea5b6e75ccf61"
        };
        /* ]]> */
    </script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min.js?ver=3.2.5'></script>
    <script type='text/javascript' src='https://demo.accesspressthemes.com/construction/wp-includes/js/wp-embed.min.js?ver=4.9.1'></script>
</body>

</html>