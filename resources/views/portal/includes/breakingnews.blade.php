<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Breaking News Slider</title>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Slick Slider -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Include your existing CSS file -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/your-existing-styles.css') }}">
</head>
<body>
    <section class="quick_news">
        <div class="container">
            <div class="news_slider">
                <button class="qn_button">
                    ताजा अपडेट
                </button>
                <div class="news_track">
                    @foreach($breakingNews as $notice)
                    <div class="news_slide">
                        <a href="#">
                            <p><i class="fa-solid fa-file-pdf"></i> {{ $notice->title }}</p>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.news_track').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 1000,
                dots: false,
                arrows: false,
                infinite: true,
                speed: 300,
                cssEase: 'linear',
                variableWidth: true
            });
        });
    </script>
</body>
</html>
