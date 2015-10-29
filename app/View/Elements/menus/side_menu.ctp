<?php
        if($role == 1){
            echo $this->element('menus/admin_menu');
        }elseif($role == 2){
            echo $this->element('menus/schools_menu');
        }
?>