<?php 

	
if ($pictureIds) {
    foreach($pictureIds as $pictureId) {
        $pictures->set_photo($pictureId,$conn);
        echo ' <span><img class="kepek" src="'.$pictures->get_picture_name().'"></span>';
    }
}
	
    ?>