    <!doctype html>
    <html lang="en">

        <head>

            <meta charset="utf-8" />
            <title>Dashboard | Upcube - Admin & Dashboard Template</title>
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
            <meta content="Themesdesign" name="author" />

            {{-- Styles --}}
            @include('admin.layouts.inc.styles')
            @yield('stayles')
            {{-- / Styles --}}

        </head>

        <body data-topbar="dark">

            <!-- <body data-layout="horizontal" data-topbar="dark"> -->

            <div id="layout-wrapper">


                {{-- Header --}}
                @include('admin.layouts.inc.header')
                {{-- / Header --}}


                {{-- Left Sidebar --}}
                @include('admin.layouts.inc.left_bar')
                {{-- / Left Sidebar --}}


                {{-- Content --}}

                <div class="main-content">
                    <div class="page-content">
                        @yield('content')
                    </div>

                    {{-- Footer --}}
                    @include('admin.layouts.inc.footer')
                    {{-- / Footer --}}

                </div>

                {{-- / Content --}}


            </div>


            {{-- Right Sidebar --}}
            @include('admin.layouts.inc.right_bar')
            {{-- / Right Sidebar --}}



            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>

            {{-- Scripts --}}

            @include('admin.layouts.inc.scripts')

            @stack('scripts')

            {{-- / Scripts --}}
        </body>

    </html>
