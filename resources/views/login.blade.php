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
                                    <label> Enter Mobile Number </label>
                                    <input type="phone" id="phone" name="phone" value="" class="form-control" placeholder="Enter Mobile Number">
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
                                    <img src="{{ captcha_src('flat') }}" alt="CAPTCHA" id="image-captcha">
                                    <a href="#" id="refresh-captcha" class="align-middle" title="refresh">
                                        <span class="fas fa-redo-alt align-middle" style="margin-left: 20px; color:#035ab3;"></span></a>
                                </div>



                                <div class="form-group col-md-12">
                                    <label> Enter Captcha Text</label>
                                    <input type="text" name="captcha" class="form-control" placeholder="Enter CAPTCHA">
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


  