
<!-- Stats -->
<div class="content bg-white border-b">
    <div class="row items-push text-uppercase">
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Academic Session</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> Current</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#"><?php echo $current_session; ?></a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">No of Schools</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> On the Portal</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#"><?php echo $schools; ?></a>
        </div>
        <div class="col-xs-6 col-sm-3">
            <div class="font-w700 text-gray-darker animated fadeIn">Total No of Students</div>
            <div class="text-muted animated fadeIn"><small><i class="si si-calendar"></i> On the Portal</small></div>
            <a class="h2 font-w300 text-primary animated flipInX" href="#"><?php echo $enrolments; ?></a>
        </div>
    </div>
</div>
<!-- END Stats -->

<!-- Page Content -->
<div class="content">
    <div class="row">
        <div class="col-lg-4">
            <!-- Main Dashboard Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Schools Enrolment Statistics</h3>
                </div>
                <div class="block-content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="row items-push">
                            <div class="col-xs-4">
                                <div class="text-muted"><small><i class="si si-calendar"></i> Current Session</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <div class="pull-t pull-r-l">
                        <!-- Slick slider (.js-slider class is initialized in App() -> uiHelperSlick()) -->
                        <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                        <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="2500">
                            <div>
                                <table class="table remove-margin-b font-s13">
                                    <tbody>
                                    <tr>
                                        <td>
                                            School Type
                                        </td>
                                        <td>
                                            Male
                                        </td>
                                        <td>
                                            Female
                                        </td>
                                        <td>
                                            Total Enrolments
                                        </td>
                                    </tr>
                                    <?php foreach($sch_types as $sch_type){ ?>
                                    <tr>
                                        <td class="font-w600">
                                            <a href="javascript:void(0)"><?php echo $sch_type['SchoolType']['name']; ?></a>
                                        </td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getSchoolEnrolmentsByTypeGender',$sch_type['SchoolType']['id'],'M')));?></td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getSchoolEnrolmentsByTypeGender',$sch_type['SchoolType']['id'],'F')));?></td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getSchoolEnrolmentsByType',$sch_type['SchoolType']['id'])));?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Slick slider -->
                    </div>
                </div>
            </div>
            <!-- END Main Dashboard Chart -->
        </div>
        <div class="col-lg-4">
            <!-- Latest Sales Widget -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Schools Statistics</h3>
                </div>
                <div class="block-content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="row items-push">
                            <div class="col-xs-4">
                                <div class="text-muted"><small><i class="si si-calendar"></i> Current Session</small></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <div class="pull-t pull-r-l">
                        <!-- Slick slider (.js-slider class is initialized in App() -> uiHelperSlick()) -->
                        <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                        <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="2500">
                            <div>
                                <table class="table remove-margin-b font-s13">
                                    <tbody>
                                    <tr>
                                        <td>
                                            School Type
                                        </td>
                                        <td>
                                            No of Schools
                                        </td>
                                    </tr>
                                    <?php foreach($sch_types as $sch_type){ ?>
                                    <tr>
                                        <td class="font-w600">
                                            <a href="javascript:void(0)"><?php echo $sch_type['SchoolType']['name']; ?></a>
                                        </td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getSchoolsByType',$sch_type['SchoolType']['id'])));?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Slick slider -->
                    </div>
                </div>
            </div>
            <!-- END Latest Sales Widget -->
        </div>
        <div class="col-lg-4">
            <!-- Main Dashboard Chart -->
            <div class="block">
                <div class="block-header">
                    <ul class="block-options">
                        <li>
                            <button type="button" data-toggle="block-option" data-action="refresh_toggle" data-action-mode="demo"><i class="si si-refresh"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title">Students Statistics</h3>
                </div>
                <div class="block-content bg-gray-lighter">
                    <div class="row items-push">
                        <div class="col-xs-4">
                            <div class="text-muted"><small><i class="si si-calendar"></i> Current Session</small></div>
                        </div>
                    </div>
                </div>
                <div class="block-content">
                    <div class="pull-t pull-r-l">
                        <!-- Slick slider (.js-slider class is initialized in App() -> uiHelperSlick()) -->
                        <!-- For more info and examples you can check out http://kenwheeler.github.io/slick/ -->
                        <div class="js-slider remove-margin-b" data-slider-autoplay="true" data-slider-autoplay-speed="2500">
                            <div>
                                <table class="table remove-margin-b font-s13">
                                    <tbody>
                                    <tr>
                                        <td>
                                            Class
                                        </td>
                                        <td>
                                            Male
                                        </td>
                                        <td>
                                            Female
                                        </td>
                                        <td>
                                            No of Students Enrolled
                                        </td>
                                    </tr>
                                    <?php foreach($classes as $class){ ?>
                                    <tr>
                                        <td class="font-w600">
                                            <a href="javascript:void(0)"><?php echo $class['SchClass']['name']?></a>
                                        </td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getEnrolmentByClassGender',$class['SchClass']['id'],'M')));?></td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getEnrolmentByClassGender',$class['SchClass']['id'],'F')));?></td>
                                        <td class="font-w600 text-success text-right" style="width: 70px;"><?php echo count($this->requestAction(array('controller' => 'Schools','action' => 'getEnrolmentByClass',$class['SchClass']['id'])));?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- END Slick slider -->
                    </div>
                </div>
            </div>
            <!-- END Main Dashboard Chart -->
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <!-- Content Grid -->
            <div class="content-grid">
                <div class="row">
                </div>
            </div>
            <!-- END Content Grid -->
        </div>
    </div>
</div>
<!-- END Page Content -->
</main>
