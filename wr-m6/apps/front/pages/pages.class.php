<?php 
// About Class contains all functions to Show About page content on front website. 
class PagesClass{
function __construct(){
	$this->db = new database(DATABASE_HOST,DATABASE_PORT,DATABASE_USER,DATABASE_PASSWORD,DATABASE_NAME);
}

function getPageData($col,$pgurl){
	$sql = "select ".$col." from ".WR_PAGE." where id='".$pgurl."' ";
	$record = $this->db->row($sql,$this->db->pdo_open());
	return $record[$col];
}

function getPage($pgurl){
	$sql = "select * from ".WR_PAGE." where id='".$pgurl."' ";
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
					
					<?php echo $record['content']; ?>
				</div>
			</article>
		</div>
<?php 
}



} // end of Class
?>	