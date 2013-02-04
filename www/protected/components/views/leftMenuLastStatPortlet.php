<?php
/*
    $this->widget('zii.widgets.CMenu',
            array('items'=>$items, 
                'id'=>'leftMenuList',                 
                )
            );  */
if (1==1){
    echo '<ul class="left-menu-last-stat">';
        $count = 0;
           foreach ($items as $value) {
                $count++;
                echo '<li><a href="'.GetUrlToPage::getUrlToPageById($value->pages_id).'"><span>'.date('d.m.Y', $value->date).' /</span> '.$value->menu_name.'</a></li>';
            }
    echo '</ul>';
}
?>