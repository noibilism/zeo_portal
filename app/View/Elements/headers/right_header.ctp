<header id="header-navbar" class="content-mini content-mini-full">
    <!-- Header Navigation Right -->
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <span>Exit</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a tabindex="-1" href="/zeo_portal/change_password">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right"></span>Change Password
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li class="dropdown-header">Actions</li>
                    <li>
                        <a tabindex="-1" href="/zeo_portal/logout">
                            <i class="si si-logout pull-right"></i>Log out
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
    </ul>
    <?php if($role == 1){ ?>
    <ul class="nav-header pull-right">
        <li>
            <div class="btn-group">
                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                    <span>Messaging</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li>
                        <a tabindex="-1" href="base_pages_profile.html">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right"></span>SMS
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="base_pages_profile.html">
                            <i class="si si-user pull-right"></i>
                            <span class="badge badge-success pull-right"></span>E-Mail
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="/zeo_portal/notice_board">
                            <i class="si si-logout pull-right"></i>Notice Board
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li>
            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                <i class="fa fa-tasks"></i>
            </button>
        </li>
    </ul>
    <?php } ?>
    <!-- END Header Navigation Right -->

    <!-- Header Navigation Left -->

    <!-- END Header Navigation Left -->
</header>
