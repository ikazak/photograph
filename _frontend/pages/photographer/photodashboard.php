<!DOCTYPE html>
<html lang="en">
    

<?= include_page('photoex/phheader') ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center" style="z-index: 9999; border-radius: 12px;">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?= include_page('photoex/phsidebar') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div style="background: linear-gradient(135deg,white 0%, #2d2d2d 100%); border: 2px solid #0d6efd; border-radius: 12px; padding: 24px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2); cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 25px rgba(13, 110, 253, 0.4)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.boxShadow='0 4px 15px rgba(13, 110, 253, 0.2)'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fas fa-calendar-check fa-3x text-primary" style="opacity: 0.9;"></i>
                                <div class="ms-3">
                                    <p class="mb-2" style="color: #b0b0b0; font-weight: bold; font-size: 13px; letter-spacing: 0.5px; text-transform: uppercase;">Bookings</p>
                                    <h6 class="mb-0" style="color: #fff; font-weight: 800; font-size: 28px;">4</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div style="background: linear-gradient(135deg, white 0%, #2d2d2d 100%); border: 2px solid #0d6efd; border-radius: 12px; padding: 24px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2); cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 25px rgba(13, 110, 253, 0.4)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.boxShadow='0 4px 15px rgba(13, 110, 253, 0.2)'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fas fa-users fa-3x text-primary" style="opacity: 0.9;"></i>
                                <div class="ms-3">
                                    <p class="mb-2" style="color: #b0b0b0; font-weight: 600; font-size: 13px; letter-spacing: 0.5px; text-transform: uppercase;">Total Clients</p>
                                    <h6 class="mb-0" style="color: #fff; font-weight: 800; font-size: 28px;">12</h6>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-xl-3">
                        <div style="background: linear-gradient(135deg, white 0%, #2d2d2d 100%); border: 2px solid #0d6efd; border-radius: 12px; padding: 24px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2); cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 25px rgba(13, 110, 253, 0.4)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.boxShadow='0 4px 15px rgba(13, 110, 253, 0.2)'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fas fa-calendar-alt fa-3x text-primary" style="opacity: 0.9;"></i>
                                <div class="ms-3">
                                    <p class="mb-2" style="color: #b0b0b0; font-weight: 600; font-size: 13px; letter-spacing: 0.5px; text-transform: uppercase;">Upcoming Events</p>
                                    <h6 class="mb-0" style="color: #fff; font-weight: 800; font-size: 28px;">10</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-6 col-xl-3">
                        <div style="background: linear-gradient(135deg, white 0%, #2d2d2d 100%); border: 2px solid #0d6efd; border-radius: 12px; padding: 24px; transition: all 0.3s ease; box-shadow: 0 4px 15px rgba(13, 110, 253, 0.2); cursor: pointer;" onmouseover="this.style.boxShadow='0 8px 25px rgba(13, 110, 253, 0.4)'; this.style.transform='translateY(-5px)';" onmouseout="this.style.boxShadow='0 4px 15px rgba(13, 110, 253, 0.2)'; this.style.transform='translateY(0)';">
                            <div class="d-flex align-items-center justify-content-between">
                                <i class="fa fa-chart-pie fa-3x text-primary" style="opacity: 0.9;"></i>
                                <div class="ms-3">
                                    <p class="mb-2" style="color: #b0b0b0; font-weight: 600; font-size: 13px; letter-spacing: 0.5px; text-transform: uppercase;">Completed Project</p>
                                    <h6 class="mb-0" style="color: #fff; font-weight: 800; font-size: 28px;">32</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div style="background: linear-gradient(c); border: 2px solid #0d6efd; border-radius: 12px; padding: 24px; box-shadow: 0 4px 20px rgba(13, 110, 253, 0.15);">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0" style="color: black; font-weight: 800; font-size: 18px;">Recent Projects</h6>
                        <a href="" style="color: red; font-weight: 700; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.color='red'; this.style.textDecoration='underline';" onmouseout="this.style.color='red'; this.style.textDecoration='none';">Show All →</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-hover mb-0" style="border-collapse: collapse;">
                            <thead>
                                <tr style="background: linear-gradient(135deg, white 0%, #2d2d2d 100%); border-bottom: 3px solid #0d6efd;">
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Date</th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Invoice</th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Customer</th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Amount</th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Status</th>
                                    <th scope="col" style="color: black; font-weight: 700; padding: 16px; letter-spacing: 0.5px;">Action</th>
                                </tr>   
                            </thead>
                            <tbody>
                                <tr style="border-bottom: 1px solid #333; transition: all 0.2s ease; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(13, 110, 253, 0.1)';" onmouseout="this.style.backgroundColor='transparent';">
                                    <td style="padding: 16px; color: black;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">01 Jan 2045</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">INV-0123</td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">Jhon Doe</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">$123</td>
                                    <td style="padding: 16px;"><span style="background-color: rgba(40, 167, 69, 0.2); color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; border: 1px solid #28a745;">Paid</span></td>
                                    <td style="padding: 16px;"><a class="btn btn-sm" style="background: linear-gradient(135deg, red 0%, red 100%); color: #fff; border: none; border-radius: 6px; font-weight: 700; padding: 6px 14px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.boxShadow='none';" href="">Detail</a></td>
                                </tr>
                                <tr style="border-bottom: 1px solid #333; transition: all 0.2s ease; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(13, 110, 253, 0.1)';" onmouseout="this.style.backgroundColor='transparent';">
                                    <td style="padding: 16px; color: black;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">01 Jan 2045</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">INV-0123</td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">Jhon Doe</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">$123</td>
                                    <td style="padding: 16px;"><span style="background-color: rgba(40, 167, 69, 0.2); color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; border: 1px solid #28a745;">Paid</span></td>
                                    <td style="padding: 16px;"><a class="btn btn-sm" style="background: linear-gradient(135deg, red 0%, red 100%); color: #fff; border: none; border-radius: 6px; font-weight: 700; padding: 6px 14px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.boxShadow='none';" href="">Detail</a></td>
                                </tr>
                                <tr style="border-bottom: 1px solid #333; transition: all 0.2s ease; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(13, 110, 253, 0.1)';" onmouseout="this.style.backgroundColor='transparent';">
                                    <td style="padding: 16px; color: black;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">01 Jan 2045</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">INV-0123</td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">Jhon Doe</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">$123</td>
                                    <td style="padding: 16px;"><span style="background-color: rgba(40, 167, 69, 0.2); color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; border: 1px solid #28a745;">Paid</span></td>
                                    <td style="padding: 16px;"><a class="btn btn-sm" style="background: linear-gradient(135deg, red 0%, red 100%); color: #fff; border: none; border-radius: 6px; font-weight: 700; padding: 6px 14px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.boxShadow='none';" href="">Detail</a></td>
                                </tr>
                                <tr style="border-bottom: 1px solid #333; transition: all 0.2s ease; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(13, 110, 253, 0.1)';" onmouseout="this.style.backgroundColor='transparent';">
                                    <td style="padding: 16px; color: black;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">01 Jan 2045</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">INV-0123</td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">Jhon Doe</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">$123</td>
                                    <td style="padding: 16px;"><span style="background-color: rgba(40, 167, 69, 0.2); color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; border: 1px solid #28a745;">Paid</span></td>
                                    <td style="padding: 16px;"><a class="btn btn-sm" style="background: linear-gradient(135deg, red 0%, red 100%); color: #fff; border: none; border-radius: 6px; font-weight: 700; padding: 6px 14px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.boxShadow='none';" href="">Detail</a></td>
                                </tr>
                                <tr style="transition: all 0.2s ease; background-color: transparent;" onmouseover="this.style.backgroundColor='rgba(13, 110, 253, 0.1)';" onmouseout="this.style.backgroundColor='transparent';">
                                    <td style="padding: 16px; color: black;"><input class="form-check-input" type="checkbox" style="cursor: pointer; border-radius: 4px;"></td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">01 Jan 2045</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">INV-0123</td>
                                    <td style="padding: 16px; color: black; font-weight: 600;">Jhon Doe</td>
                                    <td style="padding: 16px; color: black; font-weight: 700;">$123</td>
                                    <td style="padding: 16px;"><span style="background-color: rgba(40, 167, 69, 0.2); color: #28a745; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; border: 1px solid #28a745;">Paid</span></td>
                                    <td style="padding: 16px;"><a class="btn btn-sm" style="background: linear-gradient(135deg, red 0%, red 100%); color: #fff; border: none; border-radius: 6px; font-weight: 700; padding: 6px 14px; text-decoration: none; transition: all 0.3s ease;" onmouseover="this.style.boxShadow='0 4px 12px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.boxShadow='none';" href="">Detail</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


                   


            
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top" style="border-radius: 10px; font-weight: 700; transition: all 0.3s ease;" onmouseover="this.style.transform='scale(1.1)'; this.style.boxShadow='0 8px 20px rgba(13, 110, 253, 0.4)';" onmouseout="this.style.transform='scale(1)'; this.style.boxShadow='0 4px 10px rgba(0,0,0,0.2)';"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?= import_packages("datatable", "tyrax", "loading", "ctr", "path", "twal") ?>

    <script>
        addEventListener("DOMContentLoaded", () => {
            LOADING.load(true);

            setTimeout(() => LOADING.load(false), 1000)

        })
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?=assets()?>/lib/chart/chart.min.js"></script>
    <script src="<?=assets()?>/lib/easing/easing.min.js"></script>
    <script src="<?=assets()?>/lib/waypoints/waypoints.min.js"></script>
    <script src="<?=assets()?>/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="<?=assets()?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?=assets()?>/js/main.js"></script>
</body>

</html>