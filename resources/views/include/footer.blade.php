<!-- Footer Bottom -->
<div class="footer-bottom">
    <div class="auto-container">

        <div class="wrapper-box">
            <div class="row text-center">
                <div class="col-lg-12  text-center">

                    <!-- <div class="col-lg-2 col-md-2 col-12"></div> -->
                    <div class="col-lg-12 col-md-8 col-12  ">
                        <i class="fa fa-file "></i> <a rel="noopener" href="websitepolicies.php"> Website Policies </a><span>
                            | </span>

                        <i class="fa fa-question"></i><a rel="noopener" href="#"> Help </a>
                        <span>|</span>

                        <i class="fa fa-comment"></i> <a rel="noopener" href="niot_feedback.php"> Feedback </a>
                        <span>|</span>

                        <i class="fa fa-id-badge"></i> <a rel="noopener" href="#" onclick="set_session_home_menu('','','niot_contactus.php')"> Contact Us</a>

                    </div>
                    <!-- <div class="col-lg-2 col-md-2 col-12"></div> -->
                </div>
            </div>

            <div class="col-lg-12 pt-2">
                <div class="  text-center middleContent text-white"> © Content Owned and Maintained by Tamilnadu Electrical Licensing Board (TNELB), <br> Website Designed and Developed By<a rel="noopener" href="http://www.nic.in/" target="blank" class="external_link pt-2"> National Informatics Centre (NIC) </a>,
                    <a rel="noopener" href="http://meity.gov.in/" target="blank" class="external_link pt-2"> Ministry of Electronics &amp; Information Technology</a>, Government of India
                </div>
            </div>
            <div class="copyright">
                <div class="text">© <script>
                        document.write(new Date().getFullYear());
                    </script> <a href="#">TNELB</a> - All rights reserved.
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
</div>
</div>
<!--End pagewrapper-->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon-arrow"></span></div>

<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.js') }}"></script>
<script src="{{ asset('js/isotope.js') }}"></script>
<script src="{{ asset('js/owl.js') }}"></script>
<script src="{{ asset('js/appear.js') }}"></script>
<script src="{{ asset('js/wow.js') }}"></script>
<script src="{{ asset('js/lazyload.js') }}"></script>
<script src="{{ asset('js/scrollbar.js') }}"></script>
<script src="{{ asset('js/TweenMax.min.js') }}"></script>
<script src="{{ asset('js/swiper.min.js') }}"></script>
<script src="{{ asset('js/jquery.polyglot.language.switcher.js') }}"></script>
<script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('js/parallax-scroll.js') }}"></script>

<script src="{{ asset('js/script.js') }}"></script>
<!-- --------------------------------------------------------------- -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.2.2/mixitup.min.js'></script>
<!-- fancybox -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js'></script>
<!-- Fancybox js -->
<script>
    /*Downloaded from https://www.codeseek.co/ezra_siton/mixitup-fancybox3-JydYqm */
    // 1. querySelector
    var containerEl = document.querySelector(".portfolio-item");
    // 2. Passing the configuration object inline
    //https://www.kunkalabs.com/mixitup/docs/configuration-object/
    var mixer = mixitup(containerEl, {
        animation: {
            effects: "fade translateZ(-100px)",
            effectsIn: "fade translateY(-100%)",
            easing: "cubic-bezier(0.645, 0.045, 0.355, 1)"
        }
    });
    // fancybox insilaze & options //
    $("[data-fancybox]").fancybox({
        loop: true,
        hash: true,
        transitionEffect: "slide",
        /* zoom VS next////////////////////
        clickContent - i modify the deafult - now when you click on the image you go to the next image - i more like this approach than zoom on desktop (This idea was in the classic/first lightbox) */
        clickContent: function(current, event) {
            return current.type === "image" ? "next" : false;
        }
    });
</script>


<script>
    $('a[data-toggle="formtab"]').click(function() {
        event.preventDefault();
        var targetId = $(this).attr('href');

        $('.tabs-panels').removeClass('active')
        $('a[data-toggle="formtab"]').removeClass('active');

        $(targetId).addClass('active');
        $('a[href="' + targetId + '"]').addClass('active')



    });
</script>
<!-- 
<script>
    $('a[data-toggle="formtab"]').click(function (event) {
        event.preventDefault(); // Prevent default anchor click behavior
        var targetId = $(this).attr('href'); // Get the target tab's ID

        // Remove active class from all tabs and links
        $('.tabs-panels').removeClass('active');
        $('a[data-toggle="formtab"]').removeClass('active');

        // Add active class to the clicked tab and its corresponding content
        $(targetId).addClass('active');
        $('a[href="' + targetId + '"]').addClass('active');
    });
</script> -->

<script>
    // JavaScript to ensure footer is at the bottom
    function setFooterPosition() {
        const body = document.body;
        const html = document.documentElement;
        const wrapper = document.querySelector('.page-wrapper');
        const footer = document.querySelector('.footer-bottom');

        // Reset height to auto before recalculating
        wrapper.style.minHeight = '500';

        // Calculate height of visible content
        const contentHeight = Math.max(
            body.scrollHeight, body.offsetHeight,
            html.clientHeight, html.scrollHeight, html.offsetHeight
        );

        // Adjust wrapper height
        if (contentHeight < window.innerHeight) {
            wrapper.style.minHeight = `${window.innerHeight}px`;
        }
    }

    // Run on load and resize
    window.addEventListener('load', setFooterPosition);
    window.addEventListener('resize', setFooterPosition);
</script>

<script>
    $(document).ready(function() {
        $("#form1").submit(function(event) {
            event.preventDefault(); // Prevent form refresh

            let name = $("#Name").val().trim();
            let gender = $("input[name='gender']:checked").val();
            let phone = $("#PhoneNo").val().trim();
            let email = $("#EmailAddress").val().trim();
            let address = $("#Address").val().trim();
            let state = $("#state").val();
            let district = $("#district").val();
            let pincode = $("#pincode").val().trim();
            let errors = [];

            if (name === "") errors.push("Name is required.");
            if (!gender) errors.push("Gender is required.");
            if (!/^\d{10}$/.test(phone)) errors.push("Enter a valid 10-digit mobile number.");
            if (email !== "" && !/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email)) errors.push("Enter a valid email.");
            if (address === "") errors.push("Address is required.");
            if (state === "") errors.push("Select a state.");
            if (district === "") errors.push("Select a district.");
            if (!/^\d{6}$/.test(pincode)) errors.push("Enter a valid 6-digit pincode.");

            if (errors.length > 0) {
                alert(errors.join("\n"));
                return;
            }

            $.ajax({
                type: "POST",
                url: "/register", // Laravel route
                data: {
                    _token: "{{ csrf_token() }}",
                    Name: name,
                    gender: gender,
                    PhoneNo: phone,
                    EmailAddress: email,
                    Address: address,
                    state: state,
                    district: district,
                    pincode: pincode
                },
                success: function(response) {
                    console.log("Response:", response);

                    if (response.success) {
                        $("#success-popup").fadeIn();
                        $("#overlay").fadeIn();
                    }
                },
                error: function(xhr) {
                    console.log("Error:", xhr.responseText);
                    alert("Error occurred. Try again.");
                }
            });
        });

        $(".btn").click(function() {
            window.location.href = "{{ route('login') }}";
        });
    });
</script>

<script>
    $(document).ready(function() {
        $("#add-more-education").click(function() {
            // Clone the last set of education fields
            let newFields = $(".education-fields").last().clone();

            // Clear input values inside the cloned fields
            newFields.find("input").val("");
            newFields.find("select").prop("selectedIndex", 0);

            // Append cloned fields to the container
            $("#education-container").append(newFields);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $("#add-more-work").click(function() {
            // Clone the last work fields section
            let newFields = $(".work-fields").last().clone();

            // Clear input values
            newFields.find("input").val("");
            newFields.find("input[type='checkbox']").prop("checked", false);

            // Append cloned fields to the container
            $("#work-container").append(newFields);
        });
    });
</script>



</body>

</html>