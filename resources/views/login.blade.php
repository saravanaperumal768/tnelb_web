@include('include.header')
<style>
    .height-100 {
        height: 80vh
    }

    .card {
        width: 400px;
        border: none;
        height: 300px;
        box-shadow: 0px 5px 20px 0px #d2dae3;
        z-index: 1;
        display: flex;
        justify-content: center;
        align-items: center
    }

    .card h6 {
        color: red;
        font-size: 20px
    }

    .inputs input {
        width: 40px;
        height: 40px
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        margin: 0
    }

    .card-2 {
        background-color: #fff;
        padding: 10px;
        width: 350px;
        height: 100px;
        bottom: -50px;
        left: 20px;
        position: absolute;
        border-radius: 5px
    }

    .card-2 .content {
        margin-top: 50px
    }

    .card-2 .content a {
        color: red
    }

    .form-control:focus {
        box-shadow: none;
        border: 2px solid red
    }

    .validate {
        border-radius: 20px;
        height: 40px;
        background-color: #035ab3;
        border: 1px solid #035ab3;
        width: 140px
    }
</style>


<!-- About section -->

<section class="register-form">
    <div class="auto-container-form">
        <div class="wrapper-box">
            <div class="row">
                <div class=" offset-md-4 col-lg-4 col-12">
                    <div class="card1 register">
                        <div class="mb-3" data-select2-id="14">
                            <div class="card-header-login">
                                <h2>Applicant's Login Form</h2>
                            </div>
                        </div>
                        <!-- <div class="bg-gray">
                            <h2>Login</h2>
                        </div> -->
                        <form id="login-form">


                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label> Enter  Mobile Number </label>
                                    <input type="phone" id="phone" name="phone" value=""  class="form-control" placeholder="Enter Mobile Number">
                                    <span id="phoneError" class="text-danger"></span>
                                </div>

                            </div>

                            <!-- <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="password" name="password" value="" placeholder="Enter Password" >
                                </div>

                            </div> -->
                            <div class="row">

                                <div class="form-group col-md-12">
                                    <img src="{{ url('captcha/image') }}" alt="CAPTCHA" id="image-captcha">
                                    <a href="#" id="refresh-captcha" class="align-middle" title="refresh">
                                        <span class="fas fa-redo-alt align-middle" style="margin-left: 20px; color:#035ab3;"></span>
                                    </a>
                                </div>



                                <div class="form-group col-md-12">
                                <label> Enter Captcha Text</label>
                                    <input type="text" name="captcha" class="form-control" placeholder="Enter CAPTCHA" >
                                </div>
                            </div>


                            <button type="submit">Submit</button>
                        </form>
                        <p class="text-md-right register_title mt-3"> <a href="{{route('register')}}" style="text-decoration: underline;"> Click to Register </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="separator50"></div>
<!-- OTP  -->
<!-- OTP Overlay -->
<div id="otp-overlay" class="otp-overlay" style="display: none;">
    <div class="otp-modal">
        <h6>Please enter the one-time password to verify your account</h6>
        <div class="otp-inputs d-flex justify-content-center">
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
            <input class="m-2 text-center form-control" type="text" maxlength="1" />
        </div>
        <h5>OTP: 123456</h5>
        <div class="mt-4">
            <button id="validateBtn" class="btn btn-danger px-4">Validate</button>
        </div>
    </div>
</div>

<!-- Overlay Background -->
<div id="overlay-bg" class="overlay-bg" style="display: none;"></div>



<footer class="main-footer">

    @include('include.footer')


    <script type="text/javascript">
        var refreshButton = document.getElementById("refresh-captcha");
        var captchaImage = document.getElementById("image-captcha");

        refreshButton.onclick = function(event) {
            event.preventDefault();
            captchaImage.src = './captcha/image.php?' + Date.now();
        };

        $("#contact-form").submit(function(e) {

            // console.log('asd');


            e.preventDefault(); // avoid to execute the actual submit of the form.

            // var phone = $("#phone").val();

            var phone = $('input[name="phone"]').val();
            // return false;


            intRegex = /[0-9 -()+]+$/;

            if ((phone.length < 10) || (!intRegex.test(phone))) {
                alert('Please enter a valid phone number.');
                return false;
            }


            if (phone.length !== 0) {
                $('#otp_card').removeAttr("style");


            }
            console.log(phone);
            return false;

            // $.ajax({
            //     type: "POST",
            //     url: '',
            //     data: form.serialize(), // serializes the form's elements.
            //     success: function(data)
            //     {
            //     alert(data); // show response from the php script.
            //     }
            // });

        });

        document.addEventListener("DOMContentLoaded", function() {
            function OTPInput() {
                const inputs = document.querySelectorAll('.otp-inputs > input');

                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('input', function() {
                        if (this.value.length > 1) {
                            this.value = this.value[0]; // Limit input to one character
                        }
                        if (this.value !== '' && i < inputs.length - 1) {
                            inputs[i + 1].focus(); // Move to next field
                        }
                    });

                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === 'Backspace') {
                            this.value = '';
                            if (i > 0) {
                                inputs[i - 1].focus(); // Move to previous field
                            }
                        }
                    });
                }
            }

            OTPInput();

            $("#validateBtn").click(function() {
                let otp = "";
                $(".otp-inputs > input").each(function() {
                    otp += $(this).val();
                });

                $.ajax({
                    type: "POST",
                    url: "{{ route('login.verify') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        otp: otp
                    },
                    success: function(response) {
                        if (response.success) {
                            window.location.href = response.redirect_url; // Redirect after successful login
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr) {
                        alert(xhr.responseJSON.message);
                    }
                });
            });
        });


        $("#contact-form").submit(function(e) {
            e.preventDefault(); // Avoid the form submission

            var phone = $('input[name="phone"]').val();

            var intRegex = /[0-9 -()+]+$/;

            if ((phone.length < 10) || (!intRegex.test(phone))) {
                alert('Please enter a valid phone number.');
                return false;
            }

            // Show OTP modal if the phone number is valid
            if (phone.length !== 0) {
                $('#otp-overlay').show();
                $('#overlay-bg').show();
            }

            return false;
        });

        // Function to handle OTP input behavior
        document.addEventListener("DOMContentLoaded", function() {
            function OTPInput() {
                const inputs = document.querySelectorAll('.otp-inputs > input');
                for (let i = 0; i < inputs.length; i++) {
                    inputs[i].addEventListener('input', function() {
                        if (this.value.length > 1) {
                            this.value = this.value[0]; // Limit input to one character
                        }
                        if (this.value !== '' && i < inputs.length - 1) {
                            inputs[i + 1].focus(); // Move to the next input field
                        }
                    });

                    inputs[i].addEventListener('keydown', function(event) {
                        if (event.key === 'Backspace') {
                            this.value = '';
                            if (i > 0) {
                                inputs[i - 1].focus(); // Move to the previous input field on backspace
                            }
                        }
                    });
                }
            }

            OTPInput();

            const validateBtn = document.getElementById('validateBtn');
            validateBtn.addEventListener('click', function() {
                let otp = '';
                document.querySelectorAll('.otp-inputs > input').forEach(input => otp += input.value);

                // If OTP is correct, redirect user to the login page
                if (otp === '123456') {
                    window.location.href = "{{ route('user_login') }}";

                } else {
                    alert("Incorrect OTP, please try again.");
                }
            });
        });

        $(document).ready(function() {
            $("#refresh-captcha").click(function(e) {
                e.preventDefault();
                $("#image-captcha").attr("src", "{{ url('captcha/image') }}?" + Math.random());
            });
        });
    </script>