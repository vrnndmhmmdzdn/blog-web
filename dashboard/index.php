<?php
require_once __DIR__ . "/../Model/Model.php";
require_once __DIR__ . "/../Model/Home.php";
include "component/session.php";
$homes = new Home();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<!-- Favicon icon-->
	<link rel="shortcut icon" type="image/png" href="./../dist/assets/images/logos/favicon.png" />
	<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
	<!-- Core Css -->
	<link rel="stylesheet" href="./../dist/assets/css/theme.css" />
	<title>Modernize TailwindCSS HTML Admin Template</title>
</head>

<body class=" bg-white">
	<main>
		<!--start the project-->
		<div id="main-wrapper" class=" flex">
			<?php include "component/sidebar.php";
			?>
			<div class=" w-full page-wrapper overflow-hidden">

				<!--  Header Start -->
				<?php include "component/header.php"; ?>
				<!--  Header End -->

				<!-- Main Content -->
				<main class="h-full overflow-y-auto  max-w-full  pt-4">
					<div class="container full-container py-5 flex flex-col gap-6">
						<div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
							<div class="col-span-2">
								<div class="card">
									<div class="card-body">
										<div class="sm:flex block justify-between mb-5">
											<h4 class="text-gray-600 text-lg font-semibold sm:mb-0 mb-2">Sales Overview</h4>
											<select name="cars" id="cars" class=" border-gray-400 text-gray-500 rounded-md text-sm border-[1px] focus:ring-0 sm:w-auto w-full">
												<option value="volvo">March2023</option>
												<option value="saab">April2023</option>
												<option value="mercedes">May2023</option>
												<option value="audi">June2023</option>
											</select>
										</div>
										<div id="chart"></div>
									</div>
								</div>
							</div>

							<div class="flex flex-col gap-6">
								<div class="card">
									<div class="card-body">
										<h4 class="text-gray-600 text-lg font-semibold mb-5">Articles Total</h4>
										<div class="flex gap-6 items-center justify-between">
											<div class="flex flex-col gap-4">
												<h3 class="text-[21px] font-semibold text-gray-600"><?= count($homes->Select('posts')) ?> <span class="text-gray-500 font-normal">articles</span></h3>
												<div class="flex items-center gap-1">
													<span class="flex items-center justify-center w-5 h-5 rounded-full bg-teal-400">
														<i class="ti ti-arrow-up-left text-teal-500"></i>
													</span>
													<p class="text-gray-600 text-sm font-normal ">+<?= count($homes->LastWeek('posts', 'post_created_at')) ?></p>
													<p class="text-gray-500 text-sm font-normal text-nowrap">last week</p>
												</div>
												<div class="flex flex-col">
													<div class="flex gap-2 items-center">
														<span class="w-2 h-2 rounded-full bg-blue-600"></span>
														<p class="text-gray-500 font-normal text-xs"><?= date("d-m-Y", strtotime("-1 week")) ?></p>
													</div>
													<div class="flex gap-2 items-center">
														<span class="w-2 h-2 rounded-full bg-blue-600"></span>
														<p class="text-gray-500 font-normal text-xs"><?= date('d-m-Y') ?></p>
													</div>
												</div>
											</div>
											<div class="flex  items-center">
												<div id="breakup"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="card">
									<div class="card-body">
										<div class="flex gap-6 items-center justify-between">
											<div class="flex flex-col gap-5">
												<h4 class="text-gray-600 text-lg font-semibold">Viewers Total</h4>
												<div class="flex flex-col gap-[18px]">
													<h3 class="text-[21px] font-semibold text-gray-600">
														<?php $watch = $homes->WatchTotal('posts', 'post_watched');
														echo $watch ?> <span class="text-gray-500 font-normal">viewer</span>
													</h3>
													<div class="flex items-center gap-1">
														<span class="flex items-center justify-center w-5 h-5 rounded-full bg-teal-400">
															<i class="ti ti-arrow-up-left text-teal-500"></i>
														</span>
														<p class="text-gray-600 text-sm font-normal ">+<?= $homes->WatchTotal('posts', 'post_watched', true) ?></p>
														<p class="text-gray-500 text-sm font-normal">last week</p>
													</div>
												</div>
											</div>

											<div class="w-11 h-11 flex justify-center items-center rounded-full bg-cyan-500 text-white self-start">
												<i class="ti ti-currency-dollar text-xl"></i>
											</div>

										</div>
									</div>
									<div id="earning"></div>
								</div>
							</div>


						</div>
						<div class="grid grid-cols-1 lg:grid-cols-3 lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
							<div class="card">
								<div class="card-body">
									<h4 class="text-gray-600 text-lg font-semibold mb-6">Top articles</h4>
									<ul class="timeline-widget relative">
										<?php $i = 1 ?>
										<?php foreach ($homes->HotNews() as $hot): ?>
											<li class="timeline-item flex relative overflow-hidden min-h-[70px]">
												<div class="timeline-time text-gray-600 text-sm min-w-[90px] py-[6px] pr-4 text-end">
													No. <?= $i ?>
												</div>
												<div class="timeline-badge-wrap flex flex-col items-center ">
													<div class="timeline-badge w-3 h-3 rounded-full shrink-0 bg-transparent border-2 border-blue-600 my-[10px]">
													</div>
													<div class="timeline-badge-border block h-full w-[1px] bg-gray-100"></div>
												</div>
												<div class="timeline-desc py-[6px] px-4">
													<p class="text-gray-600 text-sm font-normal mb-1"><?= $hot['post_title'] ?></p>
													<p class="text-blue-300 text-sm font-bold mb-1"><?= $hot['category_name'] ?></p>
													<p class="text-red-500 text-sm font-bold"><i class="ti ti-eye"></i> <?= $hot['post_watched'] ?>x</p>
												</div>
											</li>
											<?php $i++ ?>
										<?php endforeach ?>
									</ul>
								</div>
							</div>
							<div class="col-span-2">
								<div class="card h-full">
									<div class="card-body">
										<h4 class="text-gray-600 text-lg font-semibold mb-6">Recent Article</h4>
										<div class="relative overflow-x-auto">
											<!-- table -->
											<table class="text-left w-full whitespace-nowrap text-sm">
												<thead class="text-gray-700">
													<tr class="font-semibold text-gray-600">
														<th scope="col" class="p-4">No</th>
														<th scope="col" class="p-4">Title</th>
														<th scope="col" class="p-4">Author</th>
														<th scope="col" class="p-4">Viewers</th>
														<th scope="col" class="p-4">Likes</th>
													</tr>
												</thead>
												<tbody>
													<?php $i = 1 ?>
													<?php foreach ($homes->RecentNews() as $recent): ?>
														<tr>
															<td class="p-4 font-semibold text-gray-600 "><?= $i ?></td>
															<td class="p-4">
																<div class="flex flex-col gap-1">
																	<h3 class=" font-semibold text-gray-600"><?= $recent['post_title'] ?></h3>
																	<span class="font-normal text-gray-500"><?= $recent['category_name'] ?></span>
																</div>
															</td>
															<td class="p-4">
																<span class="inline-flex items-center py-[3px] px-[10px] rounded-2xl font-semibold bg-blue-600 text-white"><?= $recent['user_name'] ?></< /span>
															</td>
															<td class="p-4">
																<span class="font-normal  text-gray-500"><?= $recent['post_watched'] ?></span>
															</td>
															<td class="p-4">
																<span class="font-semibold text-base text-gray-600"><?= $recent['post_like'] ?></span>
															</td>
														</tr>
														<?php $i++ ?>
													<?php endforeach ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="grid grid-cols-1 xl:grid-cols-4 lg:grid-cols-2 gap-6">
							<?php foreach ($homes->RecentNews() as $recent): ?>
								<div class="card overflow-hidden">
									<div class="relative">
										<a href="javascript:void(0)">
											<img src="../public/img/<?= $recent['img_1'] ?>" alt="product_img" class="w-full">
										</a>
										<a href="../section/detail-blog.php?id=<?= $recent['post_id'] ?>" class="bg-blue-600 w-8 h-8 flex justify-center items-center text-white rounded-full absolute bottom-0 right-0 mr-4 -mb-3">
											<i class="ti ti-basket text-base"></i>
										</a>
									</div>
									<div class="card-body">
										<h6 class="text-base font-semibold text-gray-600 mb-1"><?= $recent['post_title'] ?></h6>
										<div class="flex justify-between">
											<div class="flex gap-2 items-center">
												<h6 class="text-xs text-gray-600 font-normal"><?= $homes->TimeAgo($recent['post_created_at']) ?></h6>

											</div>
											<div class="flex gap-2 items-center">
												<span class="text-gray-500 text-sm">
													<del><?= $recent['user_name'] ?></del>
												</span>
											</div>
											<!-- <ul class="list-none flex gap-1">
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-yellow-500 text-sm"></i>
													</a>
												</li>
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-yellow-500 text-sm"></i>
													</a>
												</li>
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-yellow-500 text-sm"></i>
													</a>
												</li>
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-yellow-500 text-sm"></i>
													</a>
												</li>
												<li>
													<a href="javascript:void(0)">
														<i class="ti ti-star text-yellow-500 text-sm"></i>
													</a>
												</li>
											</ul> -->
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
						<footer>
							<p class="text-base text-gray-500 font-normal p-3 text-center">
								Design and Developed by <a href="https://adminmart.com/" target="_blank" class="text-blue-600 underline hover:text-blue-700">AdminMart.com</a>
							</p>
						</footer>
					</div>


				</main>
				<!-- Main Content End -->

			</div>
		</div>
		<!--end of project-->
	</main>



	<script src="./../dist/assets/libs/jquery/dist/jquery.min.js"></script>
	<script src="./../dist/assets/libs/simplebar/dist/simplebar.min.js"></script>
	<script src="./../dist/assets/libs/iconify-icon/dist/iconify-icon.min.js"></script>
	<script src="./../dist/assets/libs/@preline/dropdown/index.js"></script>
	<script src="./../dist/assets/libs/@preline/overlay/index.js"></script>
	<script src="./../dist/assets/js/sidebarmenu.js"></script>



	<script src="./../dist/assets/libs/apexcharts/dist/apexcharts.min.js"></script>
	<script src="./../dist/assets/js/dashboard.js"></script>
</body>

</html>