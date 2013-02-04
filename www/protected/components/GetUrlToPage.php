<?php
/**
 * GetUrlToPage
 * 
 * Вернет полный url к странице
 * 
 * @version 1.0
 * @author egorik <egor.developer@gmail.com>
 */
class GetUrlToPage {
    public function getUrlToPageById($id)
    {
        $url = '';
        $pages=Pages::model()->findByPk($id);
        $descendants=$pages->ancestors()->findAll();
        //var_dump($descendants); die;
        foreach ($descendants as $value) {
            if ($value->level!=1) {
                $url .= '/'.$value->url;
            }
        }
        return $url.'/'.$pages->url;
    }
}

?>
