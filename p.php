
<?php
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);
    if($currect_page == $url){
        echo 'active'; //class name in css
    }
}
?>
<ul>
    <li><a class="<?php active('p.php');?>" href="http://localhost/picab/p.php">page1</a></li>
    <li><a class="<?php active('page2.php');?>" href="http://localhost/page2.php">page2</a></li>
    <li><a class="<?php active('page3.php');?>" href="http://localhost/page3.php">page3</a></li>
    <li><a class="<?php active('page4.php');?>" href="http://localhost/page4.php">page4</a></li>
</ul>