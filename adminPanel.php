<?php

session_start();

require "connection.php";

if (([""])) {

?>

	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Boxicons -->
		<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
		<!-- My CSS -->
		<link rel="stylesheet" href="adminpanel.css">
		<link rel="stylesheet" href="bootstrap.css" />
		<link rel="icon" href="resourses/zarad.svg">
		<title>AdminHub | zarad</title>
	</head>

	<body>


		<!-- SIDEBAR -->
		<section id="sidebar">
			<a href="#" class="brand">
				<i class='bx bxs-smile'></i>
				<span class="text">AdminHub</span>
			</a>
			<ul class="side-menu top">
				<li class="active">
					<a href="#">
						<i class='bx bxs-dashboard'></i>
						<span class="text">Dashboard</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-shopping-bag-alt'></i>
						<span class="text">My Store</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-doughnut-chart'></i>
						<span class="text">Analytics</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-message-dots'></i>
						<span class="text">Message</span>
					</a>
				</li>
				<li>
					<a href="#">
						<i class='bx bxs-group'></i>
						<span class="text">Team</span>
					</a>
				</li>
			</ul>
			<ul class="side-menu">
				<li>
					<a href="#">
						<i class='bx bxs-cog'></i>
						<span class="text">Settings</span>
					</a>
				</li>
				<li>
					<a href="index.php" class="logout">
						<i class='bx bxs-log-out-circle'></i>
						<span class="text">Logout</span>
					</a>
				</li>
			</ul>
		</section>
		<!-- SIDEBAR -->



		<!-- CONTENT -->
		<section id="content">
			<!-- NAVBAR -->
			<nav>
				<i class='bx bx-menu'></i>
				<a href="#" class="nav-link">Categories</a>
				<form action="#">
					<div class="form-input">
						<input type="search" placeholder="Search...">
						<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
					</div>
				</form>
				<input type="checkbox" id="switch-mode" hidden>
				<label for="switch-mode" class="switch-mode"></label>
				<a href="#" class="notification">
					<i class='bx bxs-bell'></i>
					<span class="num">8</span>
				</a>
				<a href="#" class="profile">
				<?php

if (empty($image_data["path"])) {
?>
	<img src="resourses/user.svg" class="rounded" style="width:40px;" />
<?php
} else {
?>
	<img src="<?php echo $image_data["path"]; ?>" class="" style="height: 30px;width: 30px;flex-shrink: 0;border-radius: 200px;" />
<?php
}

?>
				</a>
			</nav>
			<!-- NAVBAR -->

			<!-- MAIN -->
			<main>
				<div class="head-title">
					<div class="left">
						<h1>Dashboard</h1>
						<ul class="breadcrumb">
							<li>
								<a href="#">Dashboard</a>
							</li>
							<li><i class='bx bx-chevron-right'></i></li>
							<li>
								<a class="active" href="home.php">Home</a>
							</li>
						</ul>
					</div>
					<a href="#" class="btn-download">
						<i class='bx bxs-cloud-download'></i>
						<span class="text">Download PDF</span>
					</a>
				</div>

				<ul class="box-info">
					<li>
						<i class='bx bxs-calendar-check'></i>
						<span class="text">
							<h3>1020</h3>
							<p>New Order</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-group'></i>
						<span class="text">
							<h4> <?php
									$user_rs = Database::search("SELECT * FROM `users`");
									$user_num = $user_rs->num_rows;
									?>
								<span class="fs-5"><?php echo $user_num; ?> Members</span>
							</h4>

							<p>Total Users</p>
						</span>
					</li>
					<li>
						<i class='bx bxs-dollar-circle'></i>
						<span class="text">
							<h3>$2543</h3>
							<p>Total Sales</p>
						</span>
					</li>
				</ul>


				<div class="table-data">
					<div class="order">
						<div class="head">
							<h3>All Users</h3>
							<i class='bx bx-search'></i>
							<i class='bx bx-filter'></i>
						</div>

						<div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1  py-2 text-end">
                        <span class="fs-4 fw-bold ">Number</span>
                    </div>
                    <div class="col-2 d-none d-lg-block py-2">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-4 col-lg-2  py-2">
                        <span class="fs-4 fw-bold ">User Name</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block  py-2">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-2 d-none d-lg-block  py-2" style="text-align: center;">
                        <span class="fs-4 fw-bold ">Mobile</span>
                    </div>
                    <div class="col-2 d-none d-lg-block py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-1 "></div>
                </div>
            </div>

            <?php

            $query = "SELECT * FROM `users`";
            $pageno;

            if (isset($_GET["page"])) {
                $pageno = $_GET["page"];
            } else {
                $pageno = 1;
            }

            $user_rs = Database::search($query);
            $user_num = $user_rs->num_rows;

            $results_per_page = 20;
            $number_of_pages = ceil($user_num / $results_per_page);

            $page_results = ($pageno - 1) * $results_per_page;
            $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

            $selected_num = $selected_rs->num_rows;

            for ($x = 0; $x < $selected_num; $x++) {
                $selected_data = $selected_rs->fetch_assoc();

            ?>
                <div class="col-12 mt-3 mb-3">
                    <div class="row">
                        <div class="col-2 col-lg-1  py-2 text-end">
                            <span class=" text-dark"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block  py-2" onclick="viewMsgModal('<?php echo $selected_data['email']; ?>');">
                            <img src="resourses/user.svg" style="height: 40px;margin-left: 80px;" />
                        </div>
                        <div class="col-4 col-lg-2  py-2">
                            <span class=" text-dark"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block  py-2">
                            <span class=""><?php echo $selected_data['email']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block  py-2" style="text-align: center;">
                            <span class=" text-dark" ><?php echo $selected_data['mobile']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block  py-2">
                            <span class=""><?php echo $selected_data['joined_date']; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-white py-2 d-grid">
                            <?php

                            if ($selected_data["status"] == 1) {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-danger" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="ub<?php echo $selected_data['email']; ?>" class="btn btn-success" onclick="blockUser('<?php echo $selected_data['email']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>

                        </div>
                    </div>
                </div>
                <!-- msg modal -->
                <div class="modal" tabindex="-1" id="userMsgModal<?php echo $selected_data["email"]; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body overflow-scroll">
                                <!-- received -->
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="col-8 rounded bg-success">
                                            <div class="row">
                                                <div class="col-12 pt-2">
                                                    <span class="text-white fw-bold fs-4">Hello there!!!</span>
                                                </div>
                                                <div class="col-12 text-end pb-2">
                                                <span class="text-white fs-6">2022-11-9 00:00:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- received -->
                                <!-- sent -->
                                <div class="col-12 mt-2">
                                    <div class="row">
                                        <div class="offset-4 col-8 rounded bg-primary">
                                            <div class="row">
                                                <div class="col-12 pt-2">
                                                    <span class="text-white fw-bold fs-4">Hello there!!!</span>
                                                </div>
                                                <div class="col-12 text-end pb-2">
                                                <span class="text-white fs-6">2022-11-9 00:00:00</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- sent -->

                            </div>
                            <div class="modal-footer">

                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-9">
                                            <input type="text" class="form-control" id="msgtxt"/>
                                        </div>
                                        <div class="col-3 d-grid">
                                            <button type="button" class="btn btn-primary" onclick="sendAdminMsg('<?php echo $selected_data['email']; ?>');">Send</button>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- msg modal -->
            <?php

            }

            ?>

					</div>
					
				</div>
			</main>
			<!-- MAIN -->
		</section>
		<!-- CONTENT -->


		<script src="adminpanel.js"></script>
	</body>

	</html>

<?php

} else {
	echo ("You are Not a valid user");
}

?>