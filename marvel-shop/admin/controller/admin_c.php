<?php 
if(isset($ajax_flag)){
	include_once '../../model/admin_m.php';
}else{
	include_once 'model/admin_m.php';
}

/**
 * 
 */
class Admin_c extends Admin_m
{
	private $ad;

	public function __construct()
	{
		$this->ad=new Admin_m();
	}

//Gọi hàm getAdmin_email($email) cho trang login 
	public function getAdmin_email($email,$pass){
		return $this->ad->getAdmin_email($email,$pass);
	}
//Gọi hàm getDetail_Order_Name($id_order) cho trang print
	public function getDetail_Order_Name($id_order){
		return $this->ad->getDetail_Order_Name($id_order);
	}


//Các hàm cho Ajax
//Lấy hàm xóa sản phẩm dùng cho Ajax
	public function del_Product($id){
		return $this->ad->del_Product($id);
	}
//Lấy hàm get_listImg() cho Ajax
	public function get_listImg($id){
		return $this->ad->get_listImg($id);
	}

//Lấy hàm getProduct_ID($id) cho Ajax
	public function getProduct_ID($id){
		return $this->ad->getProduct_ID($id);
	}
//Lấy hàm getBrand(), và getType() cho Ajax
	public function getBrand(){
		return $this->ad->getBrand();
	}
	public function getType(){
		return $this->ad->getType();
	}
//lấy hàm ChangeArrayFile($arr,$files) cho ajax
	public function ChangeArrayFile($arr,$files){
		return $this->ad->ChangeArrayFile($arr,$files);
	}
//Lấy hàm del_Img_inList($id,$src) cho ajax
	public function del_Img_inList($id,$src){
		return $this->ad->del_Img_inList($id,$src);
	}
//Lấy hàm getOrder_ID($id) cho ajax và trang Print bên ngoài
	public function getOrder_ID($id){
		return $this->ad->getOrder_ID($id);
	}
//Lấy hàm Update_STT_Order($id_order,$stt) cho ajax
	public function Update_STT_Order($id_order,$stt){
		return $this->ad->Update_STT_Order($id_order,$stt);
	}
//Lấy hàm Del_Order($id_order) cho ajax
	public function Del_Order($id_order){
		return $this->ad->Del_Order($id_order);
	}
//Lấy hàm Del_User($id_user) cho ajax
	public function Del_User($id_user){
		return $this->ad->Del_User($id_user);
	}
//Lấy hàm Del_Voucher($id_voucher) cho ajax
	public function Del_Voucher($id_voucher){
		return $this->ad->Del_Voucher($id_voucher);
	}
//Lấy hàm Del_Admin($id_admin) cho ajax
    public function Del_Admin($id_admin){
        return $this->ad->Del_Admin($id_admin);
    }
//Lấy hàm add_noti_order($id_order,$content_noti,$action)
    public function add_noti_order($id_order,$content_noti,$action){
        return $this->ad->add_noti_order($id_order,$content_noti,$action);
    }
//Lấy hàm get_noti_STT_order() cho ajax
    public function get_noti_order_ID($id_order){
        return $this->ad->get_noti_order_ID($id_order);
    }
    //hàm lấy banner quan id_banner
    public function get_banner_id($id){
        return $this->ad->get_banner_id($id);
    }
    //xóa banner
    public function del_banner($id){
        return $this->ad->del_banner($id);
    }
    //hàm add noti_user
    public function add_noti_user($id_user,$content_noti,$action){
        return $this->ad->add_noti_user($id_user,$content_noti,$action);
    }
//Lấy hàm EditQuantity_Product($id_product,$quantity) cho ajax
    public function EditQuantity_Product($id_product,$quantity){
        return $this->ad->EditQuantity_Product($id_product,$quantity);
    }
//Lấy hàm add_noti_product($id_product,$content_noti,$action)
    public function add_noti_product($id_product,$content_noti,$action){
        return $this->ad->add_noti_product($id_product,$content_noti,$action);
    }
//Lấy hàm get_noti_user($from) cho ajax
    public function get_noti_user($from){
        return $this->ad->get_noti_user($from);
    }
//Lấy hàm get_noti_product($from) cho ajax
    public function get_noti_product($from){
        return $this->ad->get_noti_product($from);
    }
//Lấy hàm get_noti_order($from) cho ajax
    public function get_noti_order($from){
        return $this->ad->get_noti_order($from);
    }
//Lấy hàm update_Orderdone($id_order,$order_done) cho ajax
    public function update_Orderdone($id_order,$order_done){
        return $this->ad->update_Orderdone($id_order,$order_done);
    }

    public function create_page(){
      if(!isset($_SESSION['id_admin']) && empty($_SESSION['id_admin'])){
         header("Location:login.php");
     }
     $get_3order=$this->ad->get_3order(1);
    //  echo '<pre>';
    // print_r($get_3order);
    // echo '</pre>';
     include_once"views/noti_top.php";
     if(isset($_GET['views'])){
         $views=$_GET['views'];
     }else{
         $views='status';
     }

     switch ($views) {

			case 'status'://Thống kê trang web
            if(isset($_GET['action'])){
                $action=$_GET['action'];
            }else{
                $action='normal';
            }

            switch ($action) {
                case 'normal':
                $reviews = $this->ad->get_review();//thống kê tất cả review
                $count_review = count($reviews);

                $user = $this->ad->get_all_user();//thống kê tất cả user
                $count_user = count($user);

                $order = $this->ad->get_all_order();//thống kê tất cả order
                $count_order = count($order);

                $product = $this->ad->get_all_pro();//thống kê tất cả sản phẩm
                $count_pro = count($product);

                $new_order = $this->ad->get_new_order();  //Lấy ra tất cả những đơn hàng    mới được đặt
                $count_new = count($new_order);
                $row=5;
                $number=count($new_order); 
                $pagination=ceil($number/$row);
                if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                    $pages=(int)$_GET['pages'];
                }else{
                 $pages=1;
                 $_GET['pages']=1;
             }
             $current = $_GET['pages'];
             $form=($pages-1)*$row;
             $new_order = $this->ad->get_new_order_limit($form,$row);

             if (isset($_POST['submit'])) {   
                $start = $_POST['start'];
                $end = $_POST['end'];
                    // echo  $start."<br>";
                    // echo  $end;
                $get_order_done = $this->ad->get_order_as_date($start, $end);
                $count = count($get_order_done);

            //     $row=5;
            //     $number=count($get_order_done); 
            //     $pagination=ceil($number/$row);
            //     if(isset($_GET['page']) && $_GET['page'] <= $pagination && $_GET['page']>=1){
            //         $page=(int)$_GET['page'];
            //     }else{
            //         $page = 1;
            //         $_GET['page'] = 1;
            //     }
            //     $current = $_GET['page'];
            //     $form=($page-1)*$row;
            //    $get_order_done = $this->ad->get_order_as_date_limit($form, $row, $start, $end);
             } //lấy ra đơn hàng đã hoàn thành theo ngày tháng

            // echo '<pre>';
            // print_r($get_order_done);
            // echo '</pre>';
             include_once "views/status.php";
             break;


             //Thống kê doanh thu theo ngày tháng
             case 'report-date':
             if(isset($_POST['submit_report_date'])){
                $start=$_POST['start'];
                $end=$_POST['end'];
                    // echo $start;
                    // echo $end;
                $_SESSION['start_reportdate']=$start;
                $_SESSION['end_reportdate']=$end;
            }

            if(isset($_SESSION['start_reportdate']) && isset($_SESSION['end_reportdate'])){
                // echo  $_SESSION['start_reportdate']."<br>";
                //     echo $_SESSION['end_reportdate'];
                $rs_all=$this->ad->orderdone_revenue_date_all($_SESSION['start_reportdate'],$_SESSION['end_reportdate']);
                $rs_detail=$this->ad->orderdone_revenue_date_detail($_SESSION['start_reportdate'],$_SESSION['end_reportdate']);
                $row=3;
                $number=count($rs_detail);
                $pagination=ceil($number/$row);
                if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                   $pages=(int)$_GET['pages'];
               }else{
                   $pages=1;
                   $_GET['pages']=1;
               }
               $from=($pages-1)*$row;
               $rs_detail_limit=$this->ad->orderdone_revenue_date_detail_limit($_SESSION['start_reportdate'],$_SESSION['end_reportdate'],$from,$row);
           }else{
            $rs_all=$this->ad->orderdone_revenue_date_all(false,false);
            $rs_detail=$this->ad->orderdone_revenue_date_detail(false,false);
            $row=3;
            $number=count($rs_detail);
            $pagination=ceil($number/$row);
            if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
               $pages=(int)$_GET['pages'];
           }else{
               $pages=1;
               $_GET['pages']=1;
           }
           $from=($pages-1)*$row;
           $rs_detail_limit=$this->ad->orderdone_revenue_date_detail_limit(false,false,$from,$row);
       }
       $current = $_GET['pages'];

       include_once"views/status/report-date.php";
       break;


     //Thống kê doanh thu theo sản phẩm
       case 'report-product':
       if(isset($_POST['submit_report_date'])){
        $start=$_POST['start'];
        $end=$_POST['end'];
        $key_search=trim($_POST['key_search']);
        $_SESSION['start_date_product']=$start;
        $_SESSION['end_date_product']=$end;
        $_SESSION['report_product_name']='%'.$key_search.'%';        
    }
    if(isset($_SESSION['start_date_product']) && isset($_SESSION['end_date_product']) && isset( $_SESSION['report_product_name'])){
        $rs_all=$this->ad->orderdone_revenue_product_all($_SESSION['start_date_product'],$_SESSION['end_date_product'],$_SESSION['report_product_name']);
        $rs_detail=$this->ad->orderdone_revenue_product_detail($_SESSION['start_date_product'],$_SESSION['end_date_product'],$_SESSION['report_product_name']);
        $row=3;
        $number=count($rs_detail);
        $pagination=ceil($number/$row);
        if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
           $pages=(int)$_GET['pages'];
       }else{
           $pages=1;
           $_GET['pages']=1;
       }
       $from=($pages-1)*$row;
       $rs_detail_limit=$this->ad->orderdone_revenue_product_detail_limit($_SESSION['start_date_product'],$_SESSION['end_date_product'],$_SESSION['report_product_name'],$from,$row);
   }else{
    $rs_all=$this->ad->orderdone_revenue_product_all(false,false,false);
    $rs_detail=$this->ad->orderdone_revenue_product_detail(false,false,false);
    $row=3;
    $number=count($rs_detail);
    $pagination=ceil($number/$row);
    if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
       $pages=(int)$_GET['pages'];
   }else{
       $pages=1;
       $_GET['pages']=1;
   }
   $from=($pages-1)*$row;
   $rs_detail_limit=$this->ad->orderdone_revenue_product_detail_limit(false,false,false,$from,$row);
         // echo "<pre>";
         // print_r($rs_detail_limit);
         // echo "</pre>";
}
$current = $_GET['pages'];
include_once "views/status/report-product.php";
break;

default:
header("Location:index.php");
break;
}
break;




			case 'product' : // Danh sách sản phẩm
             $del_noti=$this->ad->del_history_noti('tbl_noti_product');//Xóa bớt noti đã cũ
             if(isset($_POST['search_product'])){
                $_SESSION['key_product']='%'.$_POST['key_product'].'%';
            }

            if(!isset($_SESSION['key_product'])){
                $rs=$this->ad->get_Product(false);
                $row=10;
                $number=count($rs);
                $pagination=ceil($number/$row);
                if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                   $pages=(int)$_GET['pages'];
               }else{
                   $pages=1;
                   $_GET['pages']=1;
               }
               $form=($pages-1)*$row;
               $rs=$this->ad->get_Product_limit($form,$row,false);
               $rs=$this->ad->add_discount($rs);
           }
           else{
            $rs=$this->ad->get_Product($_SESSION['key_product']);
            $row=5;
            $number=count($rs);	
            $pagination=ceil($number/$row);
            if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
               $pages=(int)$_GET['pages'];
           }else{
               $pages=1;
               $_GET['pages']=1;
           }
           $form=($pages-1)*$row;
           $rs=$this->ad->get_Product_limit($form,$row,$_SESSION['key_product']);
           $rs=$this->ad->add_discount($rs);
       }
       $current = $_GET['pages'];
       $rs_noti=$this->ad->get_noti_product(0);
       $rs_noti_next=$this->ad->get_noti_product(5);
        // echo '<pre>';
        //     print_r($rs_noti);
        //     echo '</pre>';



//Thêm mới sản phẩm
       $rs_brand=$this->ad->getBrand();
       $rs_type=$this->ad->getType();
       if(isset($_POST['add_product'])){
        $img=$_FILES['img'];
        $list_img=$_FILES['list_img'];
        $name_product=$_POST['name_product'];
        $id_brand=$_POST['brand'];
        $id_type=$_POST['type'];
        $price=$_POST['price'];
        $discount=$_POST['discount'];
        $quantity=$_POST['quantity'];
        $description=$_POST['description'];

        $files=array();
        $files=$this->ad->ChangeArrayFile($list_img,$files);

        $add_pro=$this->ad->addProduct($name_product,$id_brand,$id_type,$price,$discount,$quantity,$description);
        if($add_pro){
           $id_last=$this->ad->lastInsertId();
           $uploadPath = "../images/product/".$id_last;
					if (!is_dir($uploadPath)) { // Nếu k tồn tại thư mục này thì tạo thư mục
						mkdir($uploadPath, 0777, true);
					}
    				//Thêm ảnh avatar
					move_uploaded_file($img['tmp_name'],$memmory_path=$uploadPath.'/'.time().'_avatar_'.$img['name']);

    				$uploadPath_real=substr($memmory_path,3);//Đường dẫn thực để insert vào trường img bảng tbl_product
    				$add_img=$this->ad->addImg_Product($uploadPath_real,$id_last);
    				//Thêm list ảnh
    				foreach ($files as $key => $value) {
    					move_uploaded_file($value['tmp_name'],$memmory_path=$uploadPath.'/'.time().'_'.$value['name']);
    					$uploadPath_real=substr($memmory_path,3);
    					$add_list=$this->ad->add_List_img($id_last,$uploadPath_real);
    				}

                     //Add thêm thông báo vào bảng noti_product
                   $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin'].") đã thêm mới sản phẩm có ID là: ".$id_last." vào lúc ".date('Y/m/d-H:i:s',time());
                   $add_noti=$this->ad->add_noti_product($id_last,$content_noti,1);


                   $_SESSION['noti_addPro']=1;

               }else{
                $_SESSION['noti_addPro']=2;
            }



        }




        include_once "views/product/product.php";
        break;

    		case 'edit-product':// Sửa sản phẩm
    		$id_max=$this->ad->getMaxId_Product();
			// 		echo "<pre>";
			// print_r($id_max);
			// echo "</pre><hr>";
			// $id_max['MAX(id_product)']; là giá trị ID lớn nhất trong bảng product
    		if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id'] <= $id_max['MAX(id_product)']){
    			$id=(int)$_GET['id'];
    		}
    		else{
    			header("Location:index.php");
    		}
    		$rs=$this->ad->getProduct_ID($id);
    		$rs=$this->ad->add_discount($rs);
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";
    		$rs_brand=$this->ad->getBrand();
    		$rs_type=$this->ad->getType();
    		$rs_listimg=$this->ad->get_listImg($id);
            $get_info_noti_product=$this->ad->get_noti_product_ID($id);


            if(isset($_POST['edit_product'])){
               $img=$_FILES['imgR'];
               $list_img=$_FILES['list_imgR'];
               $name_product=$_POST['name_productR'];
               $id_brand=$_POST['brand'];
               $id_type=$_POST['type'];
               $price=$_POST['priceR'];
               $discount=$_POST['discountR'];
               $quantity=$_POST['quantityR'];
               $description=$_POST['descriptionR'];

               $files=array();
               $files=$this->ad->ChangeArrayFile($list_img,$files);

               $update=$this->ad->Update_Product($id,$name_product,$id_brand,$id_type,$price,$discount,$quantity,$description);
               if($update){

                if(!empty($img['name']) && !empty($img['type']) && !empty($img['size']) && !empty($img['tmp_name'])){
                 $create_path="images/product/".$id."/".time().'_avatar_'.$img['name'];
                 move_uploaded_file($img['tmp_name'],"../".$create_path);
                 if(file_exists($_SESSION['memory_avt'])){
                  unlink($_SESSION['memory_avt']);
              }

              $update_img=$this->ad->addImg_Product($create_path,$id);

          }
          if(!empty($files[0]['name']) && !empty($files[0]['type']) && !empty($files[0]['size'])){
             foreach ($files as $key => $value) {
              $create_path="images/product/".$id."/".time().'_'.$value['name'];
              move_uploaded_file($value['tmp_name'],"../".$create_path);
              $add_list=$this->ad->add_List_img($id,$create_path);
          }
      }

                      foreach ($rs as $key => $value) {//Add thêm thông báo vào bảng noti_product
                       $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin'].") đã cập nhật lại thông tin sản phẩm có ID là: ".$value['id_product']." vào lúc ".date('Y/m/d-H:i:s',time());
                       $add_noti=$this->ad->add_noti_product($id,$content_noti,2);
                   }

                   echo "<script>alert(' Sửa thành công !');
                   window.location.href = 'index.php?page=home&views=edit-product&id=".$id."';</script>";

               }else{
                echo "<script>alert(' Có lỗi trong quá trình sửa!');</script>";	
            }	
        }

        include_once "views/product/edit-product.php";
        break;
    		case 'order': //Danh sách đơn hàng
            $del_noti=$this->ad->del_history_noti('tbl_noti_order');//Xóa bớt noti đã cũ

            if(isset($_POST['search_order'])){
             $_SESSION['key_order']='%'.$_POST['key_order'].'%';
         }
         if(!isset($_SESSION['key_order'])){
             $rs=$this->ad->get_Order(false);
             $row=5;
             $number=count($rs);
             $pagination=ceil($number/$row);
             if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                $pages=(int)$_GET['pages'];
            }else{
                $pages=1;
                $_GET['pages']=1;
            }
            $form=($pages-1)*$row;
            $rs=$this->ad->get_Order_limit($form,$row,false);
        }
        else{
         $rs=$this->ad->get_Order($_SESSION['key_order']);
         $row=5;
         $number=count($rs);	
         $pagination=ceil($number/$row);
         if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
            $pages=(int)$_GET['pages'];
        }else{
            $pages=1;
            $_GET['pages']=1;
        }
        $form=($pages-1)*$row;
        $rs=$this->ad->get_Order_limit($form,$row,$_SESSION['key_order']);
    }
    $current = $_GET['pages'];
    $rs_stt=$this->ad->getSttOrder();
    $rs_noti=$this->ad->get_noti_order(0);
    $rs_noti_next=$this->ad->get_noti_order(5);
            // echo "<pre>";
            // print_r($rs_stt);
            // echo "</pre><hr>";
    include_once "views/order/order.php";
    break;

    		case 'edit-order';//Sửa đơn hàng
    		$id_max=$this->ad->getMaxId_Order();
  			 // echo "<pre>";
			// print_r($id_max);
			// echo "</pre><hr>";

    		if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=$id_max['MAX(id_order)']){
    			$id=(int)$_GET['id'];
    		}else{
    			header("Location:index.php?page=home&views=order");
    		}
    		$rs=$this->ad->getOrder_ID($id);
    		$rs_payment=$this->ad->getPayment();
    		$rs_stt=$this->ad->getSttOrder();
            $rs_noti=$this->ad->get_noti_order_ID($id);
   //  		echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";

            if(isset($_POST['edit_order'])){
             $name=$_POST['name'];
             $id_payment=$_POST['payment'];
             $total=$_POST['total'];
             $phone=$_POST['phone'];
             $email=$_POST['email'];
             $address=$_POST['address'];
             $note=$_POST['note'];

             $edit=$this->ad->Update_Order($name,$id_payment,$total,$phone,$email,$address,$note,$id);
             if($edit){
                     foreach ($rs as $key => $value) {//Add thêm thông báo vào bảng noti_order
                       $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin'].") đã cập nhật lại thông tin đơn hàng có ID là: ".$value['id_order']." vào lúc ".date('Y/m/d-H:i:s',time());
                       $add_noti=$this->ad->add_noti_order($id,$content_noti,2);
                   }
                   echo "<script>alert('Sửa thành công');
                   window.location.href='index.php?page=home&views=edit-order&id=".$id."';</script>";


               }else{
                echo "<script>alert('Thất bại! Có lỗi trong quá trình sửa !');</script>";
            }
        }		
        include_once "views/order/edit-order.php";
        break;


    		case 'customer'://Danh sách khách hàng
             $del_noti=$this->ad->del_history_noti('tbl_noti_user');//Xóa bớt noti đã cũ
             if(isset($_POST['search_user'])){
                 $_SESSION['key_user']='%'.$_POST['key_user'].'%';
             }

             if(!isset($_SESSION['key_user'])){
                 $rs=$this->ad->get_User(false);
                 $row=10;
                 $number=count($rs);
                 $pagination=ceil($number/$row);
                 if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                    $pages=(int)$_GET['pages'];
                }else{
                    $pages=1;
                    $_GET['pages']=1;
                }
                $form=($pages-1)*$row;
                $rs=$this->ad->get_User_limit($form,$row,false);
            }
            else{
             $rs=$this->ad->get_User($_SESSION['key_user']);
             $row=5;
             $number=count($rs);	
             $pagination=ceil($number/$row);
             if(isset($_GET['pages']) && $_GET['pages']<=$pagination && $_GET['pages']>=1){
                $pages=(int)$_GET['pages'];
            }else{
                $pages=1;
                $_GET['pages']=1;
            }
            $form=($pages-1)*$row;
            $rs=$this->ad->get_User_limit($form,$row,$_SESSION['key_user']);
        }
        $current = $_GET['pages'];

			// Thêm mới khách hàng
        if(isset($_POST['add_user'])){
         $name_user=$_POST['name_user'];
         $phone=$_POST['phone'];
         $email=$_POST['email'];
         $address=$_POST['address'];
         $pass=md5(base64_encode($_POST['pass']));
         $count_email=count($this->ad->getInfo_user_as_email($email));
         $count_phone=count($this->ad->getInfo_user_as_phone($phone));
         if($count_email!=0){
            $_SESSION['noti_addUser']=1;
        }else if($count_phone!=0){
            $_SESSION['noti_addUser']=2;
        }else{
            $add_user=$this->ad->add_User($name_user,$email,$pass,$phone,$address);
            if($add_user){
               $_SESSION['noti_addUser']=3;
               $id_last_user = $this->ad->lastInsertId();
               $id_user = $id_last_user;
               $content_noti = 'Quản trị viên '.$_SESSION['name_admin']."(".$_SESSION['email_admin'].') đã thêm thành viên có id user là '.$id_last_user.' và email là '.$email.' vào lúc '.date('Y/m/d-H:i:s',time());
               $add_noti = $this->ad->add_noti_user($id_user,$content_noti,1);
           }else{
               $_SESSION['noti_addUser']=4;
           }
       }
   }
   $get_noti_user = $this->ad->get_noti_user(0);
   $get_noti_user_next = $this->ad->get_noti_user(5);
            // echo '<pre>';
            // print_r($get_noti_user);
   include_once"views/customer/customer.php";
   break;

    		case 'edit-customer'://Sửa thông tin khách hàng
    		$id_max=$this->ad->getMaxId_User();
    		if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id'] <= $id_max['MAX(id_user)']){
    			$id=(int)$_GET['id'];
    		}
    		else{
    			header("Location:index.php");
    		}

    		$rs=$this->ad->getUser_ID($id);
			// echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";

    		if(isset($_POST['edit_user'])){//Khi bấm submit sửa khách hàng
    			$name_user=$_POST['name'];
    			$phone=$_POST['phone'];
    			if(isset($_SESSION['id_admin']) && $_SESSION['stt_admin']==1){//Nếu là admin toàn quyền thì đc phép sửa email
    				$email=$_POST['email'];
                    $check_email=count($this->ad->getInfo_user_as_email($email));
                }
                $address=$_POST['address'];
                $check_phone=count($this->ad->getInfo_user_as_phone($phone));


                if(isset($_SESSION['stt_admin']) && $_SESSION['stt_admin']==1){
                    if($check_email!=0 && $email!=$_SESSION['mail_user']){
                     echo "<script>alert('Email đã tồn tại, không sửa được !');</script>";
                 }else if($check_phone!=0 && $phone!=$_SESSION['phone_user']){
                     echo "<script>alert('Số điện thoại đã tồn tại, không sửa được !');</script>";
                 }else{
                     $edit=$this->ad->edit_user($name_user,$email,$phone,$address,$id);
                     if($edit){
                              foreach ($rs as $key => $value) {//Add thêm thông báo vào bảng noti_user
                               $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin'].") đã cập nhật lại thông tin khách hàng có ID là: ".$value['id_user']." vào lúc ".date('Y/m/d-H:i:s',time());
                               $add_noti=$this->ad->add_noti_user($value['id_user'],$content_noti,2);
                           }
                           echo "<script>alert('Sửa thành công !');
                           window.location.href='index.php?page=home&views=edit-customer&id=".$id."';</script>";

                       }else{
                          echo "<script>alert('Thất bại! Có lỗi trong quá trình sửa.');
                          window.location.href='index.php?page=home&views=edit-customer&id=".$id."';</script>";
                      }
                  }

              }else{
                if($check_email!=0 && $email!=$_SESSION['mail_user']){
                   echo "<script>alert('Email đã tồn tại, không sửa được !');</script>";
               }else if($check_phone!=0 && $phone!=$_SESSION['phone_user']){
                 echo "<script>alert('Số điện thoại đã tồn tại, không sửa được !');</script>";
             }else{
               $edit=$this->ad->edit_user_2($name_user,$phone,$address,$id);
               if($edit){
                              foreach ($rs as $key => $value) {//Add thêm thông báo vào bảng noti_user
                               $content_noti="Quản trị viên ".$_SESSION['name_admin']."(".$_SESSION['email_admin'].") đã cập nhật lại thông tin khách hàng có ID là: ".$value['id_user']." vào lúc ".date('Y/m/d-H:i:s',time());
                               $add_noti=$this->ad->add_noti_user($value['id_user'],$content_noti,2);
                           }
                           echo "<script>alert('Sửa thành công !');
                           window.location.href='index.php?page=home&views=edit-customer&id=".$id."';</script>";
                       }else{
                          echo "<script>alert('Thất bại! Có lỗi trong quá trình sửa.');
                          window.location.href='index.php?page=home&views=edit-customer&id=".$id."';</script>";
                      }
                  }
              }





          }

          if (isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $get__info_noti_user = $this->ad->get_noti_user_id($id);
        }


        include_once "views/customer/edit-customer.php";
        break;

        case 'print':
        $id_max=$this->ad->getMaxId_Order();
        if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id']<=$id_max['MAX(id_order)']){
         $_SESSION['id_print']=(int)$_GET['id'];

     }else{
         header("Location:index.php?page=home&views=order");
     }

     header("Location:print_order.php");
     break;

    	case 'profile'://Profile - thông tin tài khoản hiện tại
    	$rs=$this->ad->Get_Admin_ID($_SESSION['id_admin']);
    	if(isset($_POST['submit_changepass'])){
    		$pass=$_POST['pass'];
    		$newpass=$_POST['newpass'];
    		$re_newpass=$_POST['re_newpass'];

    		foreach ($rs as $key => $admin) {
    			if($pass!=$admin['password']){
    				$_SESSION['noti_changepass']=1;
    			}else{
    				$change=$this->ad->ChangePass_Admin($_SESSION['id_admin'],$newpass);
    				if($change){
    					$_SESSION['noti_changepass']=2;
    				}else{
    					$_SESSION['noti_changepass']=3;
    				}
    			}
    		}
    	}


    	include_once "views/profile.php";
    	break;

    	case 'voucher':
    	$rs=$this->ad->Get_voucher();
   			// echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";

    	if(isset($_POST['add_voucher'])){
    		$code_voucher=$_POST['code_voucher'];
    		$apply_for=$_POST['apply_for'];
    		$time_apply=$_POST['time_apply'];
    		$discount=$_POST['discount'];

    		$count=count($this->ad->Get_voucher_Code($code_voucher));
    		if($count==1){
    			$_SESSION['noti_voucher']=1;
    		}else{
    			$add=$this->ad->add_Voucher($code_voucher,$apply_for,$time_apply,$discount);
    			if($add){
    				$_SESSION['noti_voucher']=2;
    			}else{
    				$_SESSION['noti_voucher']=3;
    			}
    		}
    	}
    	include_once"views/voucher/voucher.php";
    	break;

    	case 'edit-voucher':
        if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
            header("Location:index.php");
        }
        $id_max=$this->ad->getMaxId_Voucher();
        if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id'] <= $id_max['MAX(id_voucher)']){
          $id=(int)$_GET['id'];
      }
      else{
          header("Location:index.php");
      }
      $rs=$this->ad->Get_voucher_ID($id);
   //  		echo "<pre>";
			// print_r($rs);
			// echo "</pre><hr>";
      if(isset($_POST['edit_voucher'])){
          $code_voucher=$_POST['code_voucher'];
          $apply_for=$_POST['apply_for'];
          $time_apply=$_POST['time_apply'];
          $discount=$_POST['discount'];

          $check_code=count($this->ad->Get_voucher_Code($code_voucher));
          if($check_code!=0 && $code_voucher!=$_SESSION['OLD_code_voucher']){
             echo "<script>alert('CODE này đã tồn tại, không sửa được !');</script>";
         }else{
             $edit=$this->ad->Update_Voucher($id,$code_voucher,$apply_for,$time_apply,$discount);
             if($edit){
                echo "<script>alert('Sửa thành công !');
                window.location.href='index.php?page=home&views=edit-voucher&id=".$id."';</script>";
            }else{
                echo "<script>alert('Thất bại! Có lỗi trong quá trình sửa !');
                window.location.href='index.php?page=home&views=edit-voucher&id=".$id."';</script>";
            }
        }

    }

    include_once "views/voucher/edit-voucher.php";
    break;

        case 'admin-member': //Quản lý thành viên admin
        if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
         header("Location:index.php");
         exit();
     }
     $rs=$this->ad->Get_Admin($_SESSION['id_admin']);
     $rs_stt=$this->ad->get_detail_stt_admin();
            // echo "<pre>";
            // print_r($rs_stt);
            // echo "</pre><hr>";

     if(isset($_POST['add_admin'])){
        $name_admin=$_POST['name'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $stt_admin=$_POST['stt_admin'];

        $check_phone=count($this->ad->get_Admin_phone($phone));
        $check_email=count($this->ad->get_Admin_email($email));

        if($check_phone!=0){
            $_SESSION['noti_addAdmin']=1;
        }else if($check_email!=0){
            $_SESSION['noti_addAdmin']=2;
        }else{
            $add=$this->ad->add_Admin($name_admin,$phone,$email,$stt_admin);
            if($add){
                $_SESSION['noti_addAdmin']=3;
            }else{
                $_SESSION['noti_addAdmin']=4;
            }
        }
    }


    include_once "views/adminmember/adminmember.php";
    break;

    case 'edit-adminmember'://Sửa quản trị viên
    if(!isset($_SESSION['stt_admin']) || $_SESSION['stt_admin']!=1){
        header("Location:index.php");
        exit();
    }
    $rs_stt=$this->ad->get_detail_stt_admin();
    $id_max=$this->ad->getMaxId_Admin();

    if(isset($_GET['id']) && $_GET['id']>0 && $_GET['id'] <= $id_max['MAX(id_admin)']){
        $id=(int)$_GET['id'];
    }
    else{
        header("Location:index.php");
    }
    $rs=$this->ad->Get_Admin_ID($id);
         // echo "<pre>";
         //    print_r($rs);
         //    echo "</pre><hr>";


    if(isset($_POST['edit_admin'])){//Nhấn sửa admin
        $name_admin=$_POST['name_admin'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $stt_admin=$_POST['stt_admin'];
        echo $name_admin;
        echo $phone;
        echo $email;
        echo $stt_admin;

        $check_phone=count($this->ad->get_Admin_phone($phone));
        $check_email=count($this->ad->get_Admin_email($email));

        if($check_phone!=0 && $phone!=$_SESSION['OLD_phone_admin']){
            echo "<script>alert('Số điện thoại bạn nhập đã tồn tại, vui lòng chọn số khác!');</script>";
        }else if($check_email!=0 && $email!=$_SESSION['OLD_email_admin']){
           echo "<script>alert('Email bạn nhập đã tồn tại, vui lòng chọn email khác!');</script>";
       }
       else{
        $edit=$this->ad->edit_Admin($name_admin,$phone,$email,$stt_admin,$id);
        if($edit){
            echo "<script>alert('Sửa thành công !');
            window.location.href='index.php?page=home&views=edit-adminmember&id=".$id."';</script>";
        }else{
            echo "<script>alert('Thất bại! Có lỗi trong quá trình sửa !');
            window.location.href='index.php?page=home&views=edit-adminmember&id=".$id."';</script>";
        }
    }

}
include_once "views/adminmember/edit-adminmember.php";
break;
case 'banner':
if (isset($_POST['add_banner'])) {
    $name = $_POST['name_banner'];
    $img = $_FILES['img'];
            // echo '<pre>';
            // print_r($img);
            // echo '</pre>';

    $upload_path = "../images/banner/";
    if (!is_dir($upload_path)) {

        mkdir($uploadPath, 0777, true);
    }
            //thêm ảnh banner 
    move_uploaded_file($img['tmp_name'], $path = $upload_path.time().$img['name']);
    $real_path = substr($path,3);
    $add_banner = $this->ad->add_banner($name, $real_path);
    if ($add_banner) {
        $_SESSION['noti_banner'] = 1;
    }else{
        $_SESSION['noti_banner'] = 2;
    }
}
$get_banner = $this->ad->get_banner();
include_once'views//banner/add-banner.php';
break;
case 'news':
if (isset($_POST['add_new'])) {
    $title = $_POST['name_new'];
    $content = $_POST['content'];
    $img = $_FILES['img_news'];

    $upload_path = "../images/news_img";
    if (!is_dir($upload_path )) {
        mkdir($upload_path, 0777, true);
    }
    move_uploaded_file($img['tmp_name'], $path = $upload_path.'/'.time().$img['name']);
    $real_path = substr($path, 3);
    $add_new = $this->ad->add_news($title, $content,$real_path);
    if ($add_new) {
        $_SESSION['news'] = 1;
    }else{
        $_SESSION['news'] = 2;
    }

}
$get_new = $this->ad->get_new();
if (isset($_POST['edit_news'])) {
    foreach ($get_new as $key => $value) {

    }
    $id = $value['id_news'];
    $content = $_POST['content'];
    $edit_news = $this->ad->edit_news($content, $id);
    if ($edit_news) {
        $_SESSION['news'] = 3; 
    }else{
        $_SESSION['news'] = 4; 
    }
}
include_once 'views/news/news.php';
break;

    	case 'logout'://Đăng xuất
    	unset($_SESSION['id_admin']);
    	unset($_SESSION['name_admin']);
    	unset($_SESSION['stt_admin']);
    	header("Location:login.php");
    	break;

    	default:
    	header("Location:index.php");
    	break;
    }
}


}



?>