<link rel="stylesheet" type="text/css" href="/css/altadmin/sort/style.css" media="all" />	
<script type="text/javascript" src="/js/altadmin/sort/jquery.json-2.2.min.js"></script>
<script type="text/javascript" src="/js/altadmin/sort/init.js"></script>
<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Список отзывов',
);
?>

<?php
if (Yii::app()->user->hasFlash('success')):
    echo '<h4 class="alert_success">' . Yii::app()->user->getFlash('success') . '</h4>';
endif;
?>
<p><a href="/altadmin/works/add/">Добавить работу</a></p>


<article class="module width_full">
    <header><h3 class="tabs_involved">Наши работы</h3>

    </header>

    <div class="tab_container">
        <div class="tab_content" id="tab1" style="display: block;">



<?php
echo '<ul id="sortable">';
foreach ($model as $value) {
    echo '<li id="note_' . $value->works_id . '" class="editable">
                    <span class="note">' . $value->works_id . ' ' . $value->menu_name . '</span>
                    <a href="/altadmin/works/edit/' . $value->works_id . '"><input type="image" title="Edit" src="/images/altadmin/icn_edit.png"></a>
                    ' . CHtml::link('<input type="image" title="Удалить" src="/images/altadmin/icn_trash.png">', array('/altadmin/works/delete/' . $value->works_id . ''), array('confirm' => 'Точно удалить?')) . '
        </li>';
}
echo '</ul>';
?>



        </div>
        <footer>
            <div class="submit_link">
                <form id="changeOrder" method="post" action="/altadmin/works/changeOrder">
                    <input type="submit" value="Сохранить сортировку" class="alt_btn" />
                </form>
            </div>
        </footer>
</article>
<h4 class="alert_info"><p>Для изменения порядка вывода, наведите на отзыв зажмите левую кнопку мыши и перетяните отзыв в нужное место. После того как вы выстроили отзывы в нужном порядке нажмите кнопку "Сохранить сортировку"</p></h4>
