<?php 
$ajax_flag=1;
include_once "../../controller/admin_c.php";
$show = new Admin_c();
if(isset($_GET['from']) && $_GET['from']>0){
	$from=$_GET['from'];
	$rs_noti=$show->get_noti_user($from);
	$rs_noti_next=$show->get_noti_user($from+5);
	// echo "<pre>";
	// print_r($rs_noti_next);
	// echo "</pre>";

	?>
	<table class="table table-hover">
	<div from="<?php echo $from; ?>" class="div_from">
		<?php
		$stt=$from;
		foreach ($rs_noti as $key => $noti) {
			$stt+=1;
			?>
			<tr>
				<td class="td_noti"><?php echo $stt.'. '.$noti['content_noti']; ?></td>
			</tr>

			<?php
		}
		if(count($rs_noti_next)>=1){
			?>
			<td class="more_user"><a href="#">Xem thêm</a></td>
			<?php
		}
		?>
	</div>
	</table>
	<?php
}

?>