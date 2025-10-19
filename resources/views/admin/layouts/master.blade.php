<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard &mdash; Stisla</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


    <!-- Template CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add jQuery -->

</head>

<body class="flex flex-col h-screen">



    @include('admin.layouts.header')


    <div class="flex overflow-hidden flex-1">
        @include('admin.layouts.sidebar')
        <main class="overflow-y-auto flex-1 p-4">@yield('content')</main>
    </div>


    <!-- jQuery CDN -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    {{--   <script>
      @if ($errors->any())
          @foreach ($errors->all() as $error)

      toastr.error("{{ $error }}")
         @endforeach
      @endif
  </script> --}}


  {{-- Sidebar script --}}
    <script>
        $(document).ready(function() {
            // Handle dropdown toggles
            $('.dropdown-toggle').on('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const targetId = $(this).data('target');
                const targetSubmenu = $('#' + targetId);
                const arrow = $(this).find('.dropdown-arrow');

                // Toggle current dropdown
                targetSubmenu.toggleClass('open');
                arrow.toggleClass('rotated');
                $(this).toggleClass('active');

                // Add max-height to open submenu
                if (targetSubmenu.hasClass('open')) {
                    targetSubmenu.addClass('max-h-96 py-2.5');
                    targetSubmenu.removeClass('max-h-0');
                    arrow.addClass('transform rotate-180');
                } else {
                    targetSubmenu.removeClass('max-h-96 py-2.5');
                    targetSubmenu.addClass('max-h-0');
                    arrow.removeClass('transform rotate-180');
                }

                // Close other open dropdowns
                $('.submenu').not(targetSubmenu).removeClass('open max-h-96 py-2.5').addClass('max-h-0');
                $('.dropdown-arrow').not(arrow).removeClass('rotated transform rotate-180');
                $('.dropdown-toggle').not(this).removeClass('active');
            });

            // Close dropdowns when clicking outside
            $(document).on('click', function(e) {
                if (!$(e.target).closest('.sidebar').length) {
                    $('.submenu').removeClass('open max-h-96 py-2.5').addClass('max-h-0');
                    $('.dropdown-arrow').removeClass('rotated transform rotate-180');
                    $('.dropdown-toggle').removeClass('active');
                }
            });

            // Prevent dropdown from closing when clicking inside submenu
            $('.submenu').on('click', function(e) {
                e.stopPropagation();
            });

            // Handle responsive sidebar toggle (if you add a mobile menu button)
            $('.mobile-menu-toggle').on('click', function() {
                $('.sidebar').toggleClass('mobile-open');
            });

            // Initialize active dropdowns on page load
            $('.submenu.open').each(function() {
                $(this).addClass('max-h-96 py-2.5').removeClass('max-h-0');
                const toggleButton = $('[data-target="' + $(this).attr('id') + '"]');
                toggleButton.addClass('active');
                toggleButton.find('.dropdown-arrow').addClass('rotated transform rotate-180');
            });
        });
    </script>
    {{-- // ========================
            // MOBILE SIDEBAR TOGGLE
            // ======================== --}}

    <script>
        $('#mobile-menu-btn').on('click', function() {
            $('#sidebar').removeClass('-translate-x-full');
            $('#mobile-overlay').removeClass('hidden');
            $('body').addClass('overflow-hidden');

            // Animate hamburger menu
            const lines = $(this).find('.hamburger-line');
            lines.eq(0).addClass('rotate-45 translate-y-1.5');
            lines.eq(1).addClass('opacity-0');
            lines.eq(2).addClass('-rotate-45 -translate-y-1.5');
        });

        function closeSidebar() {
            $('#sidebar').addClass('-translate-x-full');
            $('#mobile-overlay').addClass('hidden');
            $('body').removeClass('overflow-hidden');

            // Reset hamburger menu
            const lines = $('#mobile-menu-btn').find('.hamburger-line');
            lines.removeClass('rotate-45 translate-y-1.5 opacity-0 -rotate-45 -translate-y-1.5');
        }

        $('#sidebar-close, #mobile-overlay').on('click', closeSidebar);
    </script>

    @stack('scripts')

</body>

</html>
