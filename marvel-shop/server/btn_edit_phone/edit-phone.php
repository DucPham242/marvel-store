<?php 
$ajax_flag=1;
?>
<label for="" style="color: #0A277E">Vui lòng nhập lại SĐT:</label>
<textarea style="resize: none;" name="" id="txtphone" cols="35" rows="2" onkeypress="return event.charCode>=48 && event.charCode<=57" ></textarea>
<button type="button" class="btn btn-default" id="submit_editphone" value="<?php echo $_COOKIE['id_user']; ?>">Sửa</button>
<button type="button" class="cancel_edit btn btn-default">Hủy</button>
<?php


 ?>