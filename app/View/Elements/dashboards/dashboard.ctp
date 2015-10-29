<?php
        if($role == 1){
            echo $this->element('dashboards/admin_dashboard');
        }elseif($role == 2){
            echo $this->element('dashboards/schools_dashboard');
        }
?>