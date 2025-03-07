@include('include.header')
<section class="dashboard-panel">
    <div class="layout-login">
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <aside class="sidebar-login">

                    <nav>
                        <ul>
                            <li><a href="#" class="active">Dashboard</a></li>
                            <li><a href="{{ route('apply-form-s') }}">Apply for License C [Form S] </a></li>
                            <li><a href="{{ route('apply-form-w') }}">Apply For License B [Form W]</a></li>
                            <!-- <li><a href="applynow-form2.php">Apply New - 3</a></li> -->
                            <li><a href="#">Others</a></li>
                            <!-- <li><a href="#">Paramètres</a></li> -->
                        </ul>
                    </nav>
                </aside>

                <!-- Main Content -->
                <main class="main-content-login">
                    @if(Auth::check())
                    <header class="header-login">
                        <h2 class="text-capitalize">Welcome Mr/Ms. {{ Auth::user()->name }}</h2>

                    </header>

                    @endif

                    <!-- Tasks and Projects Section -->
                    <section class="tasks-projects-login">


                        <!-- Projects -->
                        <div class="projects-section-login">
                            <h5 class="mb-2">Present License Details</h5>
                            <div class="project-list-login mt-2">

                                <div class="project-card-login" data-status="en-cours">
                                    <div class="row" style="border: none;">
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Lincense C</strong></p>
                                        </div>
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Date Validity</strong> : Jan 05 2025 </p>
                                        </div>
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Status<span class="text-danger">: &nbsp;Expired</span></strong></p>
                                        </div>

                                    </div>
                                    <div class="row" style="border: none;">
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Lincense B</strong></p>
                                        </div>
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Date Validity</strong> : August 17 2025 </p>
                                        </div>
                                        <div class="col-6 col-lg-4 ">
                                            <p><strong>Status<span class="text-success">: Active</span></p>
                                        </div>

                                    </div>


                                </div>

                            </div>
                        </div>

                        <!-- Tasks -->
                        <div class="tasks-section-login">
                            <h5 class="mb-2">Status of Application</h5>
                            <table class="table-login">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Form Name</th>
                                        <th>Applied On</th>

                                        <th>Status</th>
                                        <th>Download/License No</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($workflows as $index => $workflow)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $workflow->formname_appliedfor }}</td> <!-- Adjust column name as per DB -->
                                        <td>{{ \Carbon\Carbon::parse($workflow->created_at)->format('d/m/Y') }}</td>
                                        <td>
                                            @if(!empty($workflow->payment_status))
                                            <span class="btn btn-success">Under Process</span>
                                            @else
                                            <span class="btn btn-danger">Rejected</span>
                                            @endif
                                        </td>


                                  
                                        <td>
                                            <a href="{{ route('generate.tamil.pdf', ['login_id' => $workflow->application_id]) }}" target="_blank" class="btn btn-primary">
                                               Tamil PDF
                                            </a>

                                            <a href="{{ route('generate.pdf', ['login_id' => $workflow->application_id]) }}" target="_blank" class="btn btn-primary">
                                                English PDF
                                            </a>
                                        </td>

                                        </td>



                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5">No records found</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </section>
                </main>
            </div>
        </div>
    </div>
</section>



<footer class="main-footer">
    @include('include.footer')

    <script>
        document.getElementById("filter-status-login").addEventListener("change", function(e) {
            const filter = e.target.value;

            // Filter projects
            document.querySelectorAll(".project-card-login").forEach(card => {
                if (filter === "all" || card.dataset.status === filter) {
                    card.style.display = "block";
                } else {
                    card.style.display = "none";
                }
            });

            // Filter tasks
            document.querySelectorAll(".table-login tbody tr").forEach(row => {
                if (filter === "all" || row.dataset.status === filter) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>