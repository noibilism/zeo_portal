<div class="block">
<div class="block-content block-content-full block-content-narrow">
<!-- Introduction -->
<h2 class="h3 font-w600 push-30-t push">School Profile for <?php echo $basic['School']['name']; ?></h2>
<div id="faq1" class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q1">Basic Profile</a>
            </h3>
        </div>
        <div id="faq1_q1" class="panel-collapse collapse in">
            <?php if($role == 2){ ?>
            <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Update Basic School Profile'), array('plugin' => false, 'controller' => 'schools', 'action' => 'update_school_profile'), array('escape' => false)); ?>
            </button>
            <?php } ?>
            <div class="panel-body">
               <p>Name: <b><?php echo $basic['School']['name']; ?></b></p>
               <p>School Type: <b><?php echo $this->requestAction(array('controller' => 'Schools','action' => 'getSchoolTypeName',$basic['School']['school_type_id']));?></b></p>
               <p>Registration No: <b><?php echo $basic['School']['reg_no']; ?></b></p>
               <p>Recognition Status: <b><?php echo $property['SchoolProperty']['recognition_status']; ?></b></p>
               <p>Ownership Status: <b><?php echo $property['SchoolProperty']['ownership_status']; ?></b></p>
               <p>Portal Registration No: <b><?php echo $basic['School']['portal_reg_no']; ?></b></p>
               <p>Email Address: <b><?php echo $basic['School']['email']; ?></b></p>
               <p>Phone No: <b><?php echo $basic['School']['phone']; ?></b></p>
               <p>Year of Establishment: <b><?php echo $basic['School']['y_o_e']; ?></b></p>
               <p>History: <b><?php echo $basic['School']['history']; ?></b></p>
               <p>Last Inspection Date: <b><?php echo $property['SchoolProperty']['inspection_date']; ?></b></p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q2">School Facilities</a>
            </h3>
        </div>
        <div id="faq1_q2" class="panel-collapse collapse">
            <?php if($role == 2){ ?>
            <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Update School Facilities'), array('plugin' => false, 'controller' => 'schools', 'action' => 'update_school_facilities'), array('escape' => false)); ?>
            </button>
            <?php } ?>
            <div class="panel-body">
                <p>No of Classrooms: <b><?php echo $property['SchoolProperty']['classrooms']; ?></b></p>
                <p>No of Toilets: <b><?php echo $property['SchoolProperty']['toilets']; ?></b></p>
                <p>No of Laboratories: <b><?php echo $property['SchoolProperty']['labs']; ?></b></p>
                <p>No of Seats (per class): <b><?php echo $property['SchoolProperty']['seats']; ?></b></p>
                <p>No of Computers: <b><?php echo $property['SchoolProperty']['computers']; ?></b></p>
                <p>How Many Shifts Does The School Operate <b><?php echo $property['SchoolProperty']['shifts']; ?></b></p>
                <p>Does the School Share Facilities With Other Schools? <b><?php echo $property['SchoolProperty']['shared']; ?></b></p>
                <p>Type of School: <b><?php echo $property['SchoolProperty']['school_category']; ?></b></p>
                <p>Is the School A Member of An Association? <b><?php echo $property['SchoolProperty']['school_association']; ?></b></p>
                <p>School Category: <b><?php echo $property['SchoolProperty']['school_category']; ?></b></p>
                <p>Did the School Prepare SDP in the last school year? <b><?php echo $property['SchoolProperty']['s_d_p']; ?></b></p>
                <p>Does the school have an SBMC which met at-least once last year? <b><?php echo $property['SchoolProperty']['s_b_m_c']; ?></b></p>
                <p>Does the school have a PTA which met at-least once last year? <b><?php echo $property['SchoolProperty']['p_t_a']; ?></b></p>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#faq1" href="#faq1_q3">School Personnel</a>
            </h3>
        </div>
        <div id="faq1_q3" class="panel-collapse collapse">
            <div class="panel-body">
                <?php if($role == 2){ ?>
                <button class="btn btn-success push-5-r push-10" type="button">    <?php echo $this->Html->link(__('Add School Staff'), array('plugin' => false, 'controller' => 'schools', 'action' => 'add_staff'), array('escape' => false)); ?>
                </button>
                <?php } ?>
                <?php
                        echo $this->element('schools/schools_staff_list');
                ?>
            </div>
        </div>
    </div>
</div>
<!-- END Introduction -->

</div>
</div>