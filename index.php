<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/navbar.php" ?>
<?php include_once "./includes/db_connect.php" ?>
<?php include_once './includes/db_init.php' // creating tables etc 
?>

<?php

?>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<div id='recaptcha' class="g-recaptcha" data-sitekey="6LeUa7QfAAAAAA3yNTLw0b2G5c2NFQHIDjvKbqhM" data-callback="onSubmit" data-size="invisible"></div>

<body>

    <div class="box-normal index-top">
        <div class='intro'>
            <h1>Explore the outdoors.</h1><br>
            <h2>Discover and reserve camping sites and swimming areas at stunning natural locations around the world.</h2>
        </div>


        <div class="img-slider">
            <div class="slide active">
                <img src="./assets/images/slideshow/slide1.jpg" alt="">
                <div class="info">
                    <h2>Slide 01</h2>

                </div>
            </div>
            <div class="slide">
                <img src="./assets/images/slideshow/slide2.jpg" alt="">
                <div class="info">
                    <h2>Slide 02</h2>
                </div>
            </div>
            <div class="slide">
                <img src="./assets/images/slideshow/slide3.jpg" alt="">
                <div class="info">
                    <h2>Slide 03</h2>

                </div>
            </div>
            <div class="slide">
                <img src="./assets/images/slideshow/slide4.jpg" alt="">
                <div class="info">
                    <h2>Slide 04</h2>

                </div>
            </div>

            <div class="navigation">
                <div class="btn active"></div>
                <div class="btn"></div>
                <div class="btn"></div>
                <div class="btn"></div>
            </div>
        </div>


    </div>


    <div class="box-normal index-top">
        <div class='intro'>
            <h1>Pitch Types Available</h1><br>
            <h2>Discover and reserve camping sites and swimming areas at stunning natural locations around the world.</h2>
        </div>


    </div>



    <div class="cursor"></div>

    <script>
        var cursor = document.querySelector(".cursor");
        var cursorinner = document.querySelector(".cursor2");
        var a = document.querySelectorAll("a");

        document.addEventListener("mousemove", function(e) {
            var x = e.clientX;
            var y = e.clientY;
            cursor.style.transform = `translate3d(calc(${e.clientX}px - 50%), calc(${e.clientY}px - 50%), 0)`;
        });

        document.addEventListener("mousemove", function(e) {
            var x = e.clientX;
            var y = e.clientY;
            cursorinner.style.left = x + "px";
            cursorinner.style.top = y + "px";
        });

        document.addEventListener("mousedown", function() {
            cursor.classList.add("click");
            cursorinner.classList.add("cursorinnerhover");
        });

        document.addEventListener("mouseup", function() {
            cursor.classList.remove("click");
            cursorinner.classList.remove("cursorinnerhover");
        });

        a.forEach((item) => {
            item.addEventListener("mouseover", () => {
                cursor.classList.add("hover");
            });
            item.addEventListener("mouseleave", () => {
                cursor.classList.remove("hover");
            });
        });


        function record() {
            var recognition = new webkitSpeechRecognition();
            recognition.lang = "en-GB";

            recognition.onresult = function(event) {
                // console.log(event);
                document.getElementById('speechToText').value = event.results[0][0].transcript;
            }
            recognition.start();

        }

        var slides = document.querySelectorAll('.slide');
        var btns = document.querySelectorAll('.btn');
        let currentSlide = 1;

        // Javascript for image slider manual navigation
        var manualNav = function(manual) {
            slides.forEach((slide) => {
                slide.classList.remove('active');

                btns.forEach((btn) => {
                    btn.classList.remove('active');
                });
            });

            slides[manual].classList.add('active');
            btns[manual].classList.add('active');
        }

        btns.forEach((btn, i) => {
            btn.addEventListener("click", () => {
                manualNav(i);
                currentSlide = i;
            });
        });

        // Javascript for image slider autoplay navigation
        var repeat = function(activeClass) {
            let active = document.getElementsByClassName('active');
            let i = 1;

            var repeater = () => {
                setTimeout(function() {
                    [...active].forEach((activeSlide) => {
                        activeSlide.classList.remove('active');
                    });

                    slides[i].classList.add('active');
                    btns[i].classList.add('active');
                    i++;

                    if (slides.length == i) {
                        i = 0;
                    }
                    if (i >= slides.length) {
                        return;
                    }
                    repeater();
                }, 10000);
            }
            repeater();
        }
        repeat();
    </script>

</body>


<?php include_once "./includes/footer.php" ?>

</html>