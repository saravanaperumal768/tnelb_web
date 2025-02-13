@include('include.header')

<!-- <section class="page-title" style="background-image: url(assets/images/slider/slider3.jpg);">
    <div class="auto-container">
        <div class="content-box">
            <div class="content-wrapper">
                <div class="title">
                    <h1 class="text-uppercase">Register</h1>
                </div>
                <ul class="bread-crumb">
                    <li><a href="index.php">Home</a></li>
                    <li>Register </li>

                </ul>
            </div>
        </div>
    </div>
</section> -->

<!-- About section -->

<section class="apply-form">
    <div class="auto-container">
        <div class="wrapper-box">
            <div class="row">
                <div class="col-lg-12 col-12">
                    <div class="apply-card apply-card-info" data-select2-id="14">
                        <div class="apply-card-header" style="background-color: #877e85 !important;">
                            <div class="row">
                                <div class="col-6 col-lg-8">
                                    <h5 class="card-title_apply text-white text-center"> New Registration Form <span style="font-weight: 600;">[ Form S - License 'C' ] </span></h5>
                                </div>

                                <div class="col-6 col-lg-4 text-md-right">
                                    <a href="assets/pdf/form_s_notes.pdf" target="_blank"><i class="fa fa-download"></i>&nbsp; Important Notes</a>
                                </div>

                            </div>

                        </div>
                        <div class="apply-card-body">

                            <form action="success_page.php" method="post">
                                <div class="row">

                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">1. Applicant's Name <span style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">&nbsp;&nbsp;&nbsp;விண்ணப்பதாரர் பெயர்</label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <input autocomplete="off" class="form-control text-box single-line" id="Applicant_Name" name="Applicant_Name" type="text" value="">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">2. Father's Name <span style="color: red;">*</span></label>
                                                            <br>
                                                            <label for="tamil" class="tamil">&nbsp;&nbsp;&nbsp;தகப்பனார் பெயர்</label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <input autocomplete="off" class="form-control text-box single-line" id="Fathers_Name" name="Fathers_Name" type="text" value="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row align-items-center">
                                                <div class="col-12 col-md-6 ">
                                                    <div class="row align-items-center">
                                                        <div class="col-12 col-md-5 ">
                                                            <label for="Name">3. Applicant Address <span style="color: red;">*</span><br><span class="text-label">(To be clear)</span>
                                                            </label>
                                                            <br>
                                                            <label for="tamil" class="tamil">&nbsp;&nbsp;விண்ணப்பதாரர் முகவரி
                                                                <span class="text-label">(தெளிவாக இருக்க வேண்டும்)</span></label>
                                                        </div>
                                                        <div class="col-12 col-md-7">
                                                            <!-- <input autocomplete="off" class="form-control text-box single-line" id="Applicant_Name" name="Applicant_Name" type="text" value=""> -->
                                                            <textarea rows="3" class="form-control "></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-6 ">
                                                    <div class="row">
                                                        <div class="col-12 col-lg-7">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-6 ">
                                                                    <label for="Name">4. (i) D.O.B <span style="color: red;">*</span></label>
                                                                    <br>
                                                                    <label for="tamil" class="tamil">பிறந்த நாள்,மாதம், வருடம்</label>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <input autocomplete="off" class="form-control text-box single-line" id="dob" name="dob" type="date" value="" placeholder="DD/MM/YY Age">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-lg-5">
                                                            <div class="row align-items-center">
                                                                <div class="col-12 col-md-5 ">
                                                                    <label for="Name">4. (ii) Age <span style="color: red;">*</span></label>
                                                                    <br>
                                                                    <label for="tamil" class="tamil">&nbsp;&nbsp;&nbsp;&nbsp; வயது</label>
                                                                </div>
                                                                <div class="col-12 col-md-7">
                                                                    <input autocomplete="off" class="form-control text-box single-line" id="age" name="age" type="number" value="" placeholder="">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>



                                            </div>
                                            <hr>
                                            <div class="row align-items-center head_label">
                                                <div class="col-12 col-md-12 ">
                                                    <label> 5. Applicant's Educational/ Technical qualification and pass details <span class="text-label"> (documents to be uploaded) </span></label>
                                                    <br>
                                                    <label for="tamil" class="tamil">விண்ணப்பதாரரின் தொழில்நுட்ப
                                                        தேர்ச்சி மற்றும் தேர்ச்சி பற்றிய விவரங்கள்
                                                        <span class="text-label">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></label>
                                                </div>

                                            </div>



                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="education-table">
                                                    <thead>
                                                        <tr>
                                                            <th>Education Level</th>
                                                            <th>Institution/School Name</th>
                                                            <th>Year of Passing</th>
                                                            <th>Percentage / Grade</th>
                                                            <th>Upload Document</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="education-container">
                                                        <tr class="education-fields">
                                                            <td> <select class="form-control" name="educational_level[]">
                                                                    <option selected disabled>Select Education</option>
                                                                    <option value="PG">PG</option>
                                                                    <option value="UG">UG</option>
                                                                    <option value="Diploma">Diploma</option>
                                                                    <option value="+2">+2</option>
                                                                    <option value="10">10</option>
                                                                </select></td>
                                                            <td><input type="text" class="form-control" name="institute_name[]"></td>
                                                            <td>
                                                                <select name="year_of_passing[]" class="form-control">
                                                                    <option value="0">Select Year</option>
                                                                    <script>
                                                                        let currentYear = new Date().getFullYear();
                                                                        for (let year = currentYear; year >= 1980; year--) {
                                                                            document.write(`<option value="${year}">${year}</option>`);
                                                                        }
                                                                    </script>
                                                                </select>
                                                            </td>
                                                            <td><input type="number" class="form-control" name="percentage[]"></td>
                                                            <td><input type="file" class="form-control" name="document[]"></td>
                                                            <td>
                                                                <button type="button" class="btn btn-primary add-more">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <script>
                                                document.addEventListener("click", function(e) {
                                                    if (e.target.closest(".add-more")) {
                                                        let container = document.getElementById("education-container");

                                                        let newRow = document.createElement("tr");
                                                        newRow.classList.add("education-fields");

                                                        newRow.innerHTML = `
            <td><select class="form-control" name="educational_level[]">
                        <option selected disabled>Select Education</option>
                      <option value="PG">PG</option>
                                                                    <option value="UG">UG</option>
                                                                    <option value="Diploma">Diploma</option>
                                                                    <option value="+2">+2</option>
                                                                    <option value="10">10</option>
                    </select></td>
            <td><input type="text" class="form-control" name="institute_name[]"></td>
            <td>
                <select name="year_of_passing[]" class="form-control">
                    <option value="0">Select Year</option>
                    ${[...Array(new Date().getFullYear() - 1979).keys()]
                        .map(i => `<option value="${new Date().getFullYear() - i}">${new Date().getFullYear() - i}</option>`)
                        .join('')}
                </select>
            </td>
            <td><input type="number" class="form-control" name="percentage[]"></td>
            <td><input type="file" class="form-control" name="document[]"></td>
            <td>
              <button type="button" class="btn btn-primary add-more">
                                                                    <i class="fa fa-plus"></i>
                                                                </button>
            </td>
        `;

                                                        container.appendChild(newRow);
                                                    }

                                                    // Remove row functionality
                                                    if (e.target.closest(".remove-education")) {
                                                        e.target.closest("tr").remove();
                                                    }
                                                });
                                            </script>





                                        </div>
                                        <hr>
                                        <div class="row align-items-center head_label">
                                            <div class="col-12 col-md-12 ">
                                                <label>6. Details of Previous and Current Work experiences </label>
                                                <br>
                                                <label for="tamil" class="tamil">பெற்றுள்ள
                                                    முந்தைய மற்றும் தற்போதைய அனுபவங்களின் விவரங்கள்
                                                    <span class="text-label">(ஆவணங்களை பதிவேற்ற வேண்டும்)</span></label>
                                            </div>

                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="work-table">
                                                <thead>
                                                    <tr>
                                                        <th>Company Name / Contractor</th>
                                                        <th>Years of Experience</th>
                                                        <th>Designation</th>

                                                        <th>Upload Experience Certificate</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="work-container">
                                                    <tr class="work-fields">
                                                        <td>
                                                            <input autocomplete="off" class="form-control" name="work_level[]" type="text">
                                                        </td>
                                                        <td>
                                                            <input autocomplete="off" class="form-control" name="experience[]" type="number">
                                                        </td>
                                                        <td>
                                                            <input autocomplete="off" class="form-control" name="Designation[]" type="text">
                                                        </td>

                                                        <td>
                                                            <input class="form-control" name="document[]" type="file">
                                                        </td>
                                                        <td>
                                                            <button type="button" class="btn btn-primary add-more-work">
                                                                <i class="fa fa-plus"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <script>
                                            document.addEventListener("click", function(e) {
                                                if (e.target.closest(".add-more-work")) {
                                                    let container = document.getElementById("work-container");

                                                    let newRow = document.createElement("tr");
                                                    newRow.classList.add("work-fields");

                                                    newRow.innerHTML = `
                <td><input autocomplete="off" class="form-control" name="work_level[]" type="text"></td>
                <td><input autocomplete="off" class="form-control" name="experience[]" type="number"></td>
                <td><input autocomplete="off" class="form-control" name="Designation[]" type="text"></td>
                
                <td><input class="form-control" name="document[]" type="file"></td>
                <td><button type="button" class="btn btn-primary add-more-work"><i class="fa fa-plus"></i></button></td>
            `;

                                                    container.appendChild(newRow);
                                                }

                                                // Remove row functionality
                                                if (e.target.closest(".remove-work")) {
                                                    e.target.closest("tr").remove();
                                                }
                                            });
                                        </script>
                                        <hr>
                                        <div class="row align-items-center">
                                            <div class="col-12 col-md-12 ">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-md-7 ">
                                                        <label for="Name">7. Have previously applied for Electrical Assistant Qualification Certificate and if yes then mention its number and date
                                                        </label>
                                                        <br>
                                                        <label for="tamil" class="tamil">இதற்கு முன்னாள் விண்ணப்பம் செய்து மின் கம்பி உதவியாளர் தகுதி சான்றிதழ் பெற்றுஉள்ளதா ஆம் என்றால் அதன் எண் மற்றும் நாளைக் குறிப்பிடுக
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-4">
                                                        <input autocomplete="off" class="form-control text-box single-line" id="Applicant_Name" name="Applicant_Name" type="text" value="">
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <hr>
                                        <div class="row align-items-center head_label mt-2">
                                            <div class="col-12 col-md-12 ">
                                                <label>8. Upload Documents </label>
                                                <br>
                                                <label for="tamil" class="tamil">ஆவணங்களைப் பதிவேற்றவும்
                                                </label>

                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-12 col-md-6 ">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-md-5 ">
                                                        <label for="Name">(i) Upload Photo
                                                        </label>
                                                        <br>
                                                        <label for="tamil" class="tamil">புகைப்படத்தைப் பதிவேற்றவும்
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-7">
                                                        <input autocomplete="off" class="form-control text-box single-line" id="photo" name="photo" type="file" value="">
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-12 col-md-6 ">
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-md-5 ">
                                                        <label for="Name">(iI) Upload Signature
                                                        </label>
                                                        <br>
                                                        <label for="tamil" class="tamil">கையொப்பத்தைப் பதிவேற்றவும்
                                                        </label>
                                                    </div>
                                                    <div class="col-12 col-md-7">
                                                        <input autocomplete="off" class="form-control text-box single-line" id="photo" name="photo" type="file" value="">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>





                                </div>





                                <div class="row mt-5">
                                    <div class="offset-md-5 col-12 col-md-6">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-social" id="saveDraftBtn">
                                                Save As Draft
                                            </button>
                                            <button type="submit" class="btn btn-success btn-social">
                                                Proceed for Payment
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="draftModal" class="overlay-bg" style="display: none;">
    <div class="otp-modal">
        <h5>Your Application Details Saved Successfully</h5>
        <br>
        <button onclick="closeDraftModal()">OK</button>
    </div>
</div>



<!-- JavaScript -->
<script>
    document.getElementById('saveDraftBtn').addEventListener('click', function() {
        document.getElementById('draftModal').style.display = 'flex';
    });

    function closeDraftModal() {
        document.getElementById('draftModal').style.display = 'none';
    }
</script>


<div class="apply-card1 register" style="display: none;">
    <h2>Register</h2>
    <form method="post" action="https://html.tonatheme.com/2021/Governlia/inc/sendemail.php" id="contact-form">
        <div class="row">

            <div class="form-group col-md-12">

                <input type="text" name="name" value="" placeholder="Your Name">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input type="email" name="email" value="" placeholder="Enter Email">
            </div>

        </div>

        <div class="row">
            <div class="form-group col-md-12">
                <input type="text" name="mobile" value="" placeholder="Enter Mobile Number">
            </div>

        </div>

        <div class="row">

            <div class="form-group col-md-12">


                <select id="district" name="district">
                    <option value="">Select District</option>
                    <option value="Ariyalur">Ariyalur</option>
                    <option value="Chengalpattu">Chengalpattu</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Coimbatore">Coimbatore</option>
                    <option value="Cuddalore">Cuddalore</option>
                    <option value="Dharmapuri">Dharmapuri</option>
                    <option value="Dindigul">Dindigul</option>
                    <option value="Erode">Erode</option>
                    <option value="Kancheepuram">Kancheepuram</option>
                    <option value="Kanyakumari">Kanyakumari</option>
                    <option value="Karur">Karur</option>
                    <option value="Krishnagiri">Krishnagiri</option>
                    <option value="Madurai">Madurai</option>
                    <option value="Nagapattinam">Nagapattinam</option>
                    <option value="Namakkal">Namakkal</option>
                    <option value="Nilgiris">Nilgiris</option>
                    <option value="Perambalur">Perambalur</option>
                    <option value="Pudukkottai">Pudukkottai</option>
                    <option value="Ramanathapuram">Ramanathapuram</option>
                    <option value="Salem">Salem</option>
                    <option value="Sivagangai">Sivagangai</option>
                    <option value="Tenkasi">Tenkasi</option>
                    <option value="Thanjavur">Thanjavur</option>
                    <option value="The Nilgiris">The Nilgiris</option>
                    <option value="Theni">Theni</option>
                    <option value="Tirunelveli">Tirunelveli</option>
                    <option value="Tiruppur">Tiruppur</option>
                    <option value="Tiruvallur">Tiruvallur</option>
                    <option value="Tiruvannamalai">Tiruvannamalai</option>
                    <option value="Vellore">Vellore</option>
                    <option value="Viluppuram">Viluppuram</option>
                    <option value="Virudhunagar">Virudhunagar</option>
                </select>
            </div>

        </div>


        <button type="submit">Submit</button>
    </form>
</div>
<footer class="main-footer">
 @include('include.footer')