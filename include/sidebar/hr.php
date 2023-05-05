<ul class="side-nav">

    <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a data-bs-toggle="collapse" href="#sidebarLayouts" aria-expanded="false" aria-controls="sidebarLayouts" //class="side-nav-link""">
                <i class="uil-user"></i>
                <span> HI <?php echo $call_name_fetch['fldName'];?> </span>
                <span class="menu-arrow"></span>
            </a>
            <div class="collapse" id="sidebarLayouts">
                <ul class="side-nav-second-level">
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="side-nav-item">
            <a href="dashboard.php" //class="side-nav-link"">
                <i class="uil-dashboard"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="stakeholder-hr.php" //class="side-nav-link"">
                <i class="uil-user-circle"></i>
                <span> Stakeholder Profiling </span>
            </a>
    </li>
</ul>