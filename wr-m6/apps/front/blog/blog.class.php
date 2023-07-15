<?php 
class BlogClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function BlogTitle($pgurl){
$sql = "select * from ".WR_BLOG." where id='".$pgurl."' ";
$row = $this->db->row($sql,$this->db->pdo_open());
?>
<title><?php echo $row['title']; ?></title>
<meta name="description" content="<?php echo $row['keywords']; ?>">
<meta name="keywords" content="<?php echo $row['metadescription']; ?>">
<style>
	    ol{
    list-style-type: circle!important;
}
li{
    list-style-type: circle!important;
}
.blog-details .blogitem2-image {
    position: relative;
    overflow: hidden;
    width: 50%;
    height: auto;
    float: right;
    margin: 40px 0 0 0;
    padding: 0px 0px 0px 30px;
}	</style>
<?php 
}

function getBlogData($pgurl,$col){
	$sql = "select ".$col." from ".WR_BLOG." where id='".$pgurl."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	return $record[$col];
}

function getBlog($pgurl){
	$sql = "select * from ".WR_BLOG." where id='".$pgurl."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	
	$imgpath = 'uploads/'.$record['page_img'];
?>
					<div class="blog-details">
                        <article class="blogitem2">
							<?php 
							if(file_exists($imgpath) && $record['page_img']!=''){
							?>
                            <div class="blogitem2-image">
                                <img src="<?php echo $imgpath; ?>" alt="<?php echo $record['img_alt']; ?>" title="<?php echo $record['img_title']; ?>">
                            </div>
							<?php } ?>
                            <div class="blogitem2-content">
                                <h2><?php echo $record['heading']; ?></h2>
                                <div class="blogitem2-meta">
                                    <span>Posted By Admin</span>
                                    <span><?php echo date('d/m/Y',strtotime($record['sorting'])); ?></span>
                                </div>
                                <?php echo $record['content']; ?>
                            </div>
                        </article>
                        <div class="blog-details-footer">
                            <div class="blog-details-tags">
                                <h5>Share: </h5>
                                <ul>
                                    <li><a href="#"><i class="ion ion-logo-facebook"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-youtube"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-google"></i></a></li>
                                    <li><a href="#"><i class="ion ion-logo-instagram"></i></a></li>
                                </ul>
                            </div>
                            <div class="blog-details-share">
                                <a class="btn-text btn btn-sm btn-primary text-white" href="blog.php"> &laquo; Back to all Blog </a>
                            </div>
                        </div>
                        
                    </div>	
<?php 
}

function getAllBlog(){
?>
<div class="blogs-wrapper">
<div class="row rowsame">
	<?php 
	$x=1;
	$sql = "select * from ".WR_BLOG." order by sorting desc ";
	$record = $this->db->fetch_query($sql,$this->db->pdo_open());
	foreach ($record as $row)
	{
	$imgpath = 'uploads/'.$row['page_img'];
	if(file_exists($imgpath) && $row['page_img']!='')
		$finalimg=$imgpath;
	else
		$finalimg='uploads/lbsblog1549176662.png';
	?>
		<div class="col-lg-4 col-md-4 col-12">
			<article class="blogitem2">
				<div class="blogitem2-image">
					<a href="<?php echo 'blog-detail.php?h='.$this->clean($row['heading']).'&b='.$row['id']; ?>">
						<img src="<?php echo $finalimg; ?>" alt="<?php echo $row['img_alt']; ?>" title="<?php echo $row['img_title']; ?>">
					</a>
				</div>
				<div class="blogitem2-content">
					<h4><a href="<?php echo 'blog-detail.php?h='.$this->clean($row['heading']).'&b='.$row['id']; ?>"><?php echo $row['heading']; ?></a></h4>
					<div class="blogitem2-meta">
						<span>Posted By <a href="<?php echo 'blog-detail.php?h='.$this->clean($row['heading']).'&b='.$row['id']; ?>">Admin</a></span>
						<span><?php echo date('d/m/Y',strtotime($row['sorting'])); ?></span>
					</div>
					<p><?php echo substr(strip_tags($row['content']),0,200); ?>...</p>
					<a href="<?php echo 'blog-detail.php?h='.$this->clean($row['heading']).'&b='.$row['id']; ?>" class="ho-readmore">Continue Reading...</a>
				</div>
			</article>
		</div>
	<?php 
	} 
	?>	
	
</div>
</div>
<?php 
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}



} // end of Class
?>	