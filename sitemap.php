<?php 
    header("Content-Type: application/xml; charset=utf-8"); 
    echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL; 
    echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' .PHP_EOL; 
$con = mysqli_connect("localhost", "", "", "recyclepro_co_uk") or die("Error " . mysqli_error($con));
$sql="select * from url";
$date= date("Y-m-d").'T'. date("H:i:s").'+00:00';
$result=mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_assoc($result)) {
     echo '<url>'.PHP_EOL; 
        echo '<loc>'.str_replace('&','&amp;',$row['url']).'</loc>'. PHP_EOL; 
    echo '<lastmod>'.$date.'</lastmod>'.PHP_EOL; 
        echo '<priority>0.5</priority>'.PHP_EOL; 
        echo '</url>'.PHP_EOL;
    
   }
}
    echo '</urlset>'; 
?>