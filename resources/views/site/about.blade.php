<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
@extends('layouts.app')

<!-- jquery CDN -->
@section('theme-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
@endsection

<!-- jquery functions for small and large the font size  -->
@section('script')
    <script>
        $(document).ready(function() {
            var resize = new Array('p', '.resizable');
            resize = resize.join(',');

            //resets the font size when "reset" is clicked
            var resetFont = $(resize).css('font-size');
            $(".reset").click(function() {
                $(resize).css('font-size', resetFont);
            });

            //increases font size when "+" is clicked
            $(".increase").click(function() {
                var originalFontSize = $(resize).css('font-size');
                var originalFontNumber = parseFloat(originalFontSize, 10);
                var newFontSize = originalFontNumber * 1.2;
                $(resize).css('font-size', newFontSize);
                return false;
            });

            //decrease font size when "-" is clicked

            $(".decrease").click(function() {
                var originalFontSize = $(resize).css('font-size');
                var originalFontNumber = parseFloat(originalFontSize, 10);
                var newFontSize = originalFontNumber * 0.8;
                $(resize).css('font-size', newFontSize);
                return false;
            });

        });

    </script>
@endsection

@section('css')
    <style>
        span {
            font-size: 25px;
            float: right;
            display: block;
            font-weight: bold;
        }

        a {
            color: #417993;
        }

        a:hover {
            color: #1a3d6e;
            cursor: pointer;
        }

    </style>

@endsection

@section('content')
    <div class="container page-home lift-and-drop-shadow">
        <div class="row justify-content-center">
            <div class="col-md-12 card">

                @includeIf('site.partials.banner')
                <!-- There elements use for -->
                <span align='right'>
                    <a class="increase">+</a> |
                    <a class="decrease">-</a> |
                    <a class="reset">reset</a>
                </span>

                <h2 class="text-center mt-4 mb-4"><b>About Us</b></h2>

                <div id="who-we-are" class="row mb-3">
                    <div class="col-md-12">
                        <h3><b>Who we are</b></h3>
                        <p pl>
                            We are Sussex Comapnions a club for over the 50s which seeks to match up individuals with new
                            friends. We are based in Brighton on the Southcoast of England.We also have multiple branches
                            accross london , with the support of our loyal clients and staffs we have opened two branches in
                            the beautiful towns of Eastbourne and Bogonor.</p>
                    </div>
                </div>


                <div id="what-is-our-objective" class="row mb-3">
                    <div class="col-md-12">
                        <h3><b>What is our objective</b></h3>
                        <p>
                            While there are finally some other friendship apps catching up with the need to make finding
                            friends easier, MatchIT is the only place where you can make a friend with someone of any gender
                            and someone with similar interests and hobbies as yours. In fact, in a recent poll conducted by
                            our team, we discovered that 90% of our members are open to making friends with any gender, not
                            just their own.

                            We help people who are in their 50s or above to find friends - because loneliness is a rising
                            issue that affects the young and old alike.Our community is devoted to making it easier to find
                            real friends, whether that is a friend you keep online or in person.

                            We keep our features simple - profiles,search tool for booking events and finding friends. </p>
                    </div>

                </div>
                <div id="how-to-contact-us" class="row mb-3">
                    <div class="col-md-12">
                        <h3><b>How to get in touch with us</b></h3>
                        <p>
                            Hey there! Are you interested in joining our club to meet your new friend ? Get in touch with us
                            via below channels.<br>
                            <i class="bi bi-telephone-fill">: <a href="tel:+44 20 7946 0612">+44 20 7946 0612</a>(Head
                                office Brighton) /
                                <a href="tel:+44 20 7946 0612">+44 20 7946 0612</a>(Eastbourne) /
                                <a href="tel:+44 20 7946 0612">+44 20 7946 0612</a>(Bognor)</i>
                            <br>

                            <i class="bi bi-envelope-fill"></i>Email: <a href="mailto:matchit.sussexcompanions@gmail.com">
                                matchit.sussexcompanions@gmail.com </a><br>
                            <i class="bi bi-printer-fill"></i> Fax: <a href="fax:+44-020-5555-915"> 44-020-5555-915 </a><br>
                            Or simply get registered with us on this website by clicking register! if you face any technical
                            diffculties please send an email to matchit.sussexcompanions@gmail.com.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
