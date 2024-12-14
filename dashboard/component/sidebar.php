<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical h-screen z-[999] flex-shrink-0 border-r-[1px] w-[270px] border-gray-400  bg-white left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-5">

        <a href="../" class="text-nowrap">
            <img
                src="./../dist/assets/images/logos/dark-logo.svg"
                alt="Logo-Dark" />
        </a>


    </div>
    <div class="<?= $author ?> scroll-sidebar" data-simplebar="">
        <div class="px-6 mt-8">
            <nav class=" w-full flex flex-col sidebar-nav">
                <ul id="sidebarnav" class="text-gray-600 text-sm">
                    <li class="text-xs font-bold pb-4">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>HOME</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md  w-full flex items-center hover:text-blue-600 hover:bg-blue-500" href="./index.php">
                            <i class="ti ti-layout-dashboard  text-xl"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="text-xs font-bold mb-4 mt-8">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span>COMPONENTS</span>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500" href="category-index.php">
                            <i class="ti ti-article  text-xl"></i> <span>Category</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500" href="tag-index.php">
                            <i class="ti ti-alert-circle  text-xl"></i> <span>Tags</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a class="sidebar-link gap-3 py-2 px-3  rounded-md w-full flex items-center hover:text-blue-600 hover:bg-blue-500" href="post-index.php">
                            <i class="ti ti-cards  text-xl"></i> <span>Post</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Bottom Upgrade Option -->
    <div class="m-6  relative">
        <div class="bg-blue-500 p-5 rounded-md flex items-center justify-between">
            <div>
                <h5 class="text-base font-semibold text-gray-700 mb-3">Post</h5>
                <a href="post-create.php" class="text-xs font-semibold hover:bg-blue-700 text-white bg-blue-600 rounded-md  px-4 py-2">Create</a>
            </div>
            <div class="-mt-12 -mr-2">
                <img src="./../dist/assets/images/profile/rocket.png" class="max-w-fit" alt="profile" />
            </div>
        </div>
    </div>
    <!-- </aside> -->
</aside>