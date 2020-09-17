<?php 
if(isset($ajax_flag)){
    include_once '../../config/config.php';
}else{
    include_once 'config/config.php';
}

class Admin_m extends Connect
{

    public function __construct(){
                parent::__construct();//Gọi hàm __contruct bên config để luôn tồn tại $pdo để kết nối tới CSDL
            }

//Lấy ra danh sách sản phẩm - dành cho trang quản lý sản phẩm
            public function get_Product($ss_search){
                if($ss_search==false){
                    $sql="SELECT * FROM tbl_product ORDER BY id_product DESC";
                    $pre=$this->pdo->prepare($sql);
                }else{
                    $sql="SELECT * FROM tbl_product,tbl_brand,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND (tbl_product.name_product LIKE '$ss_search' OR tbl_product.id_product LIKE '$ss_search' OR tbl_brand.name_brand LIKE '$ss_search' OR tbl_type.name_type LIKE '$ss_search') ORDER BY tbl_product.id_product DESC";
                    $pre=$this->pdo->prepare($sql);
                    $pre->bindParam(':ss_search',$ss_search);
                }
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra danh sách sản phẩm,có phân trang - dành cho trang quản lý sản phẩm
            public function get_Product_limit($form,$row,$ss_search){
                if($ss_search==false){
                    $sql="SELECT * FROM tbl_product ORDER BY id_product DESC LIMIT $form,$row";
                }else{
                    $sql="SELECT * FROM tbl_product,tbl_brand,tbl_type WHERE (tbl_product.id_brand=tbl_brand.id_brand) AND (tbl_product.id_type=tbl_type.id_type) AND (tbl_product.name_product LIKE '$ss_search' OR tbl_product.id_product LIKE '$ss_search' OR tbl_brand.name_brand LIKE '$ss_search' OR tbl_type.name_type LIKE '$ss_search') ORDER BY tbl_product.id_product DESC LIMIT $form,$row";
                }

                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }   

//Lấy ra danh sách đơn hàng- dành cho trang quản lý đơn hàng
            public function get_Order($ss_search){
                if($ss_search==false){
                    $sql="SELECT tbl_order.*,tbl_detail_stt_order.name_stt FROM tbl_order,tbl_detail_stt_order WHERE (tbl_order.stt=tbl_detail_stt_order.id_stt) ORDER BY id_order DESC";
                    $pre=$this->pdo->prepare($sql);
                }else{
                    $sql="SELECT tbl_order.*,tbl_detail_stt_order.name_stt FROM tbl_order,tbl_detail_stt_order WHERE (tbl_order.stt=tbl_detail_stt_order.id_stt) AND (tbl_order.name LIKE '$ss_search' OR tbl_order.phone LIKE '$ss_search' OR tbl_order.id_order LIKE '$ss_search' OR tbl_order.total LIKE '$ss_search' OR tbl_detail_stt_order.name_stt LIKE '$ss_search' OR tbl_order.date_order LIKE '$ss_search') ORDER BY tbl_order.id_order DESC";
                    $pre=$this->pdo->prepare($sql);
                    $pre->bindParam(':ss_search',$ss_search);
                }
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra danh sách đơn hàng,có phân trang- dành cho trang quản lý đơn hàng
            public function get_Order_limit($form,$row,$ss_search){
                if($ss_search==false){
                    $sql="SELECT tbl_order.*,tbl_detail_stt_order.name_stt FROM tbl_order,tbl_detail_stt_order WHERE (tbl_order.stt=tbl_detail_stt_order.id_stt) ORDER BY id_order DESC LIMIT $form,$row";
                }else{
                    $sql="SELECT tbl_order.*,tbl_detail_stt_order.name_stt FROM tbl_order,tbl_detail_stt_order WHERE(tbl_order.stt=tbl_detail_stt_order.id_stt) AND (tbl_order.name LIKE '$ss_search' OR tbl_order.phone LIKE '$ss_search' OR tbl_order.id_order LIKE '$ss_search' OR tbl_order.total LIKE '$ss_search' OR tbl_detail_stt_order.name_stt LIKE '$ss_search' OR tbl_order.date_order LIKE '$ss_search') ORDER BY tbl_order.id_order DESC LIMIT $form,$row";
                }
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra danh sách khách hàng- dành cho trang quản lý khách hàng
            public function get_User($ss_search){
                if($ss_search==false){
                    $sql="SELECT * FROM tbl_user ORDER BY id_user DESC";
                    $pre=$this->pdo->prepare($sql);
                }else{
                    $sql="SELECT * FROM tbl_user WHERE (id_user LIKE '$ss_search' OR name_user LIKE '$ss_search' OR phone LIKE '$ss_search' OR email LIKE '$ss_search' OR address LIKE '$ss_search') ORDER BY id_user DESC";
                    $pre=$this->pdo->prepare($sql);
                    $pre->bindParam(':ss_search',$ss_search);
                }
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra danh sách khách hàng,có phân trang- dành cho trang quản lý khách hàng
            public function get_User_limit($form,$row,$ss_search){
                if($ss_search==false){
                    $sql="SELECT * FROM tbl_user ORDER BY id_user DESC LIMIT $form,$row";
                }else{
                    $sql="SELECT * FROM tbl_user WHERE (id_user LIKE '$ss_search' OR name_user LIKE '$ss_search' OR phone LIKE '$ss_search' OR email LIKE '$ss_search' OR address LIKE '$ss_search') ORDER BY id_user DESC LIMIT $form,$row";
                }
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Thêm trường giảm giá cho mảng
            public function add_discount($arr){
                foreach ($arr as $key => $value) {
                    if($value['discount']>0){
                        $arr[$key]['discount_price']=$value['price']-(($value['price']*$value['discount'])/100);
                    }
                }
                return $arr;
            }

//Lấy ra thông tin hãng
            public function getBrand(){
                $sql="SELECT * FROM tbl_brand";
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra thông tin loại
            public function getType(){
                $sql="SELECT * FROM tbl_type";
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Hàm xử lý dành cho mảng $_FILES có nhiều ảnh (Tham số $files truyền vào là 1 mảng rỗng)
            public function ChangeArrayFile($arr,$files){
                foreach ($arr as $key => $values) {
                    foreach ($values as $index => $value) {
                        $files[$index][$key]=$value;
                    }
                }
                return $files;
            }

//Thêm sản phẩm( chưa thêm img)
            public function addProduct($name_product,$id_brand,$id_type,$price,$discount,$quantity,$description){
                $sql="INSERT INTO tbl_product(name_product,id_brand,id_type,price,discount,quantity,description) VALUES (:name_product,:id_brand,:id_type,:price,:discount,:quantity,:description)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name_product',$name_product);
                $pre->bindParam(':id_brand',$id_brand);
                $pre->bindParam(':id_type',$id_type);
                $pre->bindParam(':price',$price);
                $pre->bindParam(':discount',$discount);
                $pre->bindParam(':quantity',$quantity);
                $pre->bindParam(':description',$description);
                $pre->execute();
                return $pre;
            }

//Update lại thông tin của 1 sản phẩm( chưa update trường img)
            public function Update_Product($id_product,$name_product,$id_brand,$id_type,$price,$discount,$quantity,$description){
                $sql="UPDATE tbl_product SET name_product=:name_product,id_brand=:id_brand,id_type=:id_type,price=:price,discount=:discount,quantity=:quantity,description=:description WHERE id_product=:id_product";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_product',$id_product);
                $pre->bindParam(':name_product',$name_product);
                $pre->bindParam(':id_brand',$id_brand);
                $pre->bindParam(':id_type',$id_type);
                $pre->bindParam(':price',$price);
                $pre->bindParam(':discount',$discount);
                $pre->bindParam(':quantity',$quantity);
                $pre->bindParam(':description',$description);
                $pre->execute();
                return $pre;

            }


//Update trường img cho sản phẩm tại bảng Product
            public function addImg_Product($img,$id_product){
                $sql="UPDATE tbl_product SET img=:img WHERE id_product=:id_product";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':img',$img);
                $pre->bindParam(':id_product',$id_product);
                $pre->execute();
                return $pre;

            }

//Update lại số lượng của 1 sản phẩm dựa theo id
            public function EditQuantity_Product($id_product,$quantity){
                $sql="UPDATE tbl_product SET quantity=quantity+:quantity WHERE id_product=:id_product";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':quantity',$quantity);
                $pre->bindParam(':id_product',$id_product);
                $pre->execute();
                return $pre;

            }

//Hàm lấy ra trường ID cuối cùng vừa insert vào database
            public function lastInsertId(){
                return $id_insert=$this->pdo->lastInsertId();
            }

//Hàm thêm list ảnh vào tbl_detail_image
            public function add_List_img($id_product,$path){
                $sql="INSERT INTO tbl_detail_image(id_product,path) VALUES (:id_product,:path)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_product',$id_product);
                $pre->bindParam(':path',$path);
                return $pre->execute();
            }

//Hàm xóa sản phẩm
            public function del_Product($id_product){
                $sql="DELETE FROM tbl_product WHERE id_product=:id_product";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_product',$id_product);
                $pre->execute();
                return $pre;
            }

//Hàm lấy ra tất cả thông tin 1 sản phẩm trong bảng tbl_detail_image 
            public function get_listImg($id){
                $sql="SELECT * FROM tbl_detail_image WHERE id_product=:id";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id',$id);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Hàm lấy 1 sản phẩm bảng tbl_product
            public function getProduct_ID($id){
                $sql="SELECT * FROM tbl_product WHERE id_product=:id";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id',$id);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra ID lớn nhất trong bảng tbl_product
            public function getMaxId_Product(){
                $sql="SELECT MAX(id_product) FROM tbl_product";
                $pre=$this->pdo->query($sql);
                return $pre->fetch(PDO::FETCH_ASSOC);
            }

//Lấy ra ID lớn nhất trong bảng tbl_user
            public function getMaxId_User(){
                $sql="SELECT MAX(id_user) FROM tbl_user";
                $pre=$this->pdo->query($sql);
                return $pre->fetch(PDO::FETCH_ASSOC);
            }

//Hàm lấy ra thông tin bảng tbl_payment
            public function getPayment(){
                $sql="SELECT * FROM tbl_payment";
                $pre=$this->pdo->query($sql);           
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Hàm lấy ra thông tin bảng tbl_detail_stt_order
            public function getSttOrder(){
                $sql="SELECT * FROM tbl_detail_stt_order";
                $pre=$this->pdo->query($sql);           
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy ra ID lớn nhất trong bảo tbl_order
            public function getMaxId_Order(){
                $sql="SELECT MAX(id_order) FROM tbl_order";
                $pre=$this->pdo->query($sql);
                return $pre->fetch(PDO::FETCH_ASSOC);
            }   

//Lấy ra thông tin đơn hàng dựa theo ID
            public function getOrder_ID($id){
                $sql="SELECT tbl_order.* FROM tbl_order WHERE id_order=:id";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id',$id);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Hàm cập nhật lại thông tin 1 đơn hàng tại bảng tbl_order
            public function Update_Order($name,$id_payment,$total,$phone,$email,$address,$note,$id_order){
                $sql="UPDATE tbl_order SET name=:name,id_payment=:id_payment,total=:total,phone=:phone,email=:email,address=:address,note=:note WHERE id_order=:id_order";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name',$name);
                $pre->bindParam(':id_payment',$id_payment);
                $pre->bindParam(':total',$total);
                $pre->bindParam(':phone',$phone);
                $pre->bindParam(':email',$email);
                $pre->bindParam(':address',$address);
                $pre->bindParam(':note',$note);
                $pre->bindParam(':id_order',$id_order);
                $pre->execute();
                return $pre;

            }
// Hàm cập nhật lại trạng thái đơn hàng bảng tbl_order
            public function Update_STT_Order($id_order,$stt){
                $sql="UPDATE tbl_order SET stt=:stt WHERE id_order=:id_order";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':stt',$stt);
                $pre->bindParam(':id_order',$id_order);
                $pre->execute();
                return $pre;            
            }

//Xoá 1 đơn hàng
            public function Del_Order($id_order){
                $sql="DELETE FROM tbl_order WHERE id_order=:id_order";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_order',$id_order);
                $pre->execute();
                return $pre;            
            }

//Xóa 1 ảnh trong bảng tbl_detail_image
            public function del_Img_inList($id,$src){
                $sql="DELETE FROM tbl_detail_image WHERE id_product=:id AND path=:src";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id',$id);
                $pre->bindParam(':src',$src);
                $pre->execute();
                return $pre;

            }
//Lấy thông tin 1 admin khi đăng nhập( dựa vào email,pass)
            public function getAdmin_email($email,$pass){
                $sql="SELECT * FROM tbl_admin WHERE email=:email AND password=:pass";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':email',$email);
                $pre->bindParam(':pass',$pass);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy chi tiết đơn hàng dựa theo id_order,kèm theo tên sản phẩm -bảng tbl_detail_order
            public function getDetail_Order_Name($id_order){
                $sql="SELECT tbl_detail_order.*,tbl_product.name_product FROM tbl_detail_order,tbl_product WHERE (tbl_detail_order.id_product=tbl_product.id_product) AND id_order=:id_order";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_order',$id_order);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }
//Lấy ra 1 user dựa theo ID trong bảng tbl_user
            public function getUser_ID($id_user){
                $sql="SELECT * FROM tbl_user WHERE id_user=:id_user";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_user',$id_user);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy bản ghi dựa theo email bảng tbl_user
            public function getInfo_user_as_email($email){
                $sql="SELECT * FROM tbl_user WHERE email=:email";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':email',$email);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy bản ghi dựa theo phone bảng tbl_user
            public function getInfo_user_as_phone($phone){
                $sql="SELECT * FROM tbl_user WHERE phone=:phone";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':phone',$phone);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Thêm mới 1 user
            public function add_User($name_user,$email,$pass,$phone,$address){
                $sql="INSERT INTO tbl_user (name_user,email,pass,phone,address) VALUES (:name_user,:email,:pass,:phone,:address)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name_user',$name_user);
                $pre->bindParam(':email',$email);
                $pre->bindParam(':pass',$pass);
                $pre->bindParam(':phone',$phone);
                $pre->bindParam(':address',$address);
                $pre->execute();
                return $pre;
            }

//Sửa 1 user Full (dành cho admin toàn quyền)
            public function edit_user($name_user,$email,$phone,$address,$id_user){
                $sql="UPDATE tbl_user SET name_user=:name_user,phone=:phone,email=:email,address=:address WHERE id_user=:id_user";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name_user',$name_user);
                $pre->bindParam(':phone',$phone);
                $pre->bindParam(':email',$email);
                $pre->bindParam(':address',$address);
                $pre->bindParam(':id_user',$id_user);
                $pre->execute();
                return $pre;
            }

//Sửa 1 user chỉ dành cho cộng tác viên
            public function edit_user_2($name_user,$phone,$address,$id_user){
                $sql="UPDATE tbl_user SET name_user=:name_user,phone=:phone,address=:address WHERE id_user=:id_user";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name_user',$name_user);
                $pre->bindParam(':phone',$phone);
                $pre->bindParam(':address',$address);
                $pre->bindParam(':id_user',$id_user);
                $pre->execute();
                return $pre;
            }

//Xoá 1 user
            public function Del_User($id_user){
                $sql="DELETE FROM tbl_user WHERE id_user=:id_user";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_user',$id_user);
                $pre->execute();
                return $pre;
            }

//lấy thông tin 1 admin dựa theo ID
            protected function Get_Admin_ID($id_admin){
                $sql="SELECT * FROM tbl_admin WHERE id_admin=:id_admin";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_admin',$id_admin);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);

            }

//Đổi mật khẩu cho admin
            protected function ChangePass_Admin($id_admin,$password){
                $sql="UPDATE tbl_admin SET password=:password WHERE id_admin=:id_admin";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':password',$password);
                $pre->bindParam(':id_admin',$id_admin);
                $pre->execute();
                return $pre;
            }

//Lấy danh sách tất cả voucher trong bảng tbl_voucher_order
            public function Get_voucher(){
                $sql="SELECT * FROM tbl_voucher_order ORDER BY id_voucher DESC";
                $pre=$this->pdo->prepare($sql);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy 1 mã voucher theo trường code_voucher bảng tbl_voucher_order
            public function Get_voucher_Code($code_voucher){
                $sql="SELECT * FROM tbl_voucher_order WHERE code_voucher=:code_voucher";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':code_voucher',$code_voucher);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy 1 mã voucher theo trường id_voucher bảng tbl_voucher_order
            public function Get_voucher_ID($id_voucher){
                $sql="SELECT * FROM tbl_voucher_order WHERE id_voucher=:id_voucher";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_voucher',$id_voucher);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Thêm 1 voucher vào bảng tbl_voucher_order
            public function add_Voucher($code_voucher,$apply_for,$time_apply,$discount){
                $sql="INSERT INTO tbl_voucher_order (code_voucher,apply_for,time_apply,discount) VALUES (:code_voucher,:apply_for,:time_apply,:discount)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':code_voucher',$code_voucher);
                $pre->bindParam(':apply_for',$apply_for);
                $pre->bindParam(':time_apply',$time_apply);
                $pre->bindParam(':discount',$discount);
                $pre->execute();
                return $pre;
            }

//Lấy ra ID lớn nhất trong bảng tbl_voucher_order
            public function getMaxId_Voucher(){
                $sql="SELECT MAX(id_voucher) FROM tbl_voucher_order";
                $pre=$this->pdo->query($sql);
                return $pre->fetch(PDO::FETCH_ASSOC);
            }

//Update lại 1 voucher
            public function Update_Voucher($id_voucher,$code_voucher,$apply_for,$time_apply,$discount){
                $sql="UPDATE tbl_voucher_order SET code_voucher=:code_voucher,apply_for=:apply_for,time_apply=:time_apply,discount=:discount WHERE id_voucher=:id_voucher";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('id_voucher',$id_voucher);
                $pre->bindParam('code_voucher',$code_voucher);
                $pre->bindParam('apply_for',$apply_for);
                $pre->bindParam('time_apply',$time_apply);
                $pre->bindParam('discount',$discount);
                $pre->execute();
                return $pre;
            }

//Xoá 1 voucher
            public function Del_Voucher($id_voucher){
                $sql="DELETE FROM tbl_voucher_order WHERE id_voucher=:id_voucher";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('id_voucher',$id_voucher);
                return $pre->execute();
            }

//Lấy danh sách tất cả quản trị viên bảng tbl_admin ngoại trừ tài khoản ADMIN đang đăng nhập, sở hữu. Kèm theo tên quyền hạn
            protected function get_Admin($id_admin){
                $sql="SELECT tbl_admin.*,tbl_detail_stt_admin.name_stt FROM tbl_admin,tbl_detail_stt_admin WHERE (tbl_admin.stt_admin=tbl_detail_stt_admin.id_stt) AND id_admin!=:id_admin";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('id_admin',$id_admin);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Lấy danh sách tất cả bản ghi bảng tbl_detail_stt_admin
            protected function get_detail_stt_admin(){
                $sql="SELECT * FROM tbl_detail_stt_admin";
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }   

//Tìm quản trị viên thông quá SĐT bảng tbl_admin
            protected function get_Admin_phone($phone){
                $sql="SELECT * FROM tbl_admin WHERE phone=:phone";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('phone',$phone);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Tìm quản trị viên thông qua email bảng tbl_admin
            protected function get_Admin_email($email){
                $sql="SELECT * FROM tbl_admin WHERE email=:email";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('email',$email);
                $pre->execute();
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }

//Thêm mới 1 quản trị viên bảng tbl_admin
            protected function add_Admin($name_admin,$phone,$email,$stt_admin){
                $sql="INSERT INTO tbl_admin (name_admin,phone,email,stt_admin) VALUES (:name_admin,:phone,:email,:stt_admin)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam('name_admin',$name_admin);
                $pre->bindParam('phone',$phone);
                $pre->bindParam('email',$email);
                $pre->bindParam('stt_admin',$stt_admin);
                return $pre->execute();
            }

//Lấy ra ID lớn nhất trong bảng tbl_admin
            public function getMaxId_Admin(){
                $sql="SELECT MAX(id_admin) FROM tbl_admin";
                $pre=$this->pdo->query($sql);
                return $pre->fetch(PDO::FETCH_ASSOC);
            }

//Sửa 1 quản trị viên bảng tbl_admin
            protected function edit_Admin($name_admin,$phone,$email,$stt_admin,$id_admin){
                $sql="UPDATE tbl_admin SET name_admin=:name_admin,phone=:phone,email=:email,stt_admin=:stt_admin WHERE id_admin=:id_admin";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':name_admin',$name_admin);
                $pre->bindParam(':phone',$phone);
                $pre->bindParam(':email',$email);
                $pre->bindParam(':stt_admin',$stt_admin);
                $pre->bindParam(':id_admin',$id_admin);
                return $pre->execute();
            }

//Xoá 1 tài khoản quản trị viên bảng tbl_admin
            protected function Del_Admin($id_admin){
                $sql="DELETE FROM tbl_admin WHERE id_admin=:id_admin";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_admin',$id_admin);
                return $pre->execute();
            }

//Insert 1 thông báo vào bảng tbl_noti_order
            public function add_noti_order($id_order,$content_noti,$action){
                $sql="INSERT INTO tbl_noti_order (id_order,content_noti,action) VALUES (:id_order,:content_noti,:action)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_order',$id_order);
                $pre->bindParam(':content_noti',$content_noti);
                $pre->bindParam(':action',$action);
                return $pre->execute();
            }

//Hàm xóa bớt bản ghi thông báo lịch sử trong các bảng noti
//Kết hợp bởi nhiều hàm
//Hàm lấy thông báo của 1 bảng -1 hành động
// ----------START---------------
            public function get_history_noti($tbl,$i){
                $sql="SELECT * FROM $tbl WHERE action=$i";
                $pre=$this->pdo->query($sql);
                return $pre->fetchAll(PDO::FETCH_ASSOC);
            }
//Hàm xóa 1 bản ghi cũ nhất của 1 bảng của 1 hành động
            public function del_history_noti_in_table($tbl,$i){
                $sql="DELETE FROM $tbl WHERE action=$i AND id_noti=(
                SELECT MIN(id_noti) FROM $tbl
            )";
            return $pre=$this->pdo->query($sql);
        }
//Hàm xử lý xóa nếu đủ điều kiện xóa
        public function del_history_noti($tbl){
            for($i=1;$i<=3;$i++){
                $a=self::get_history_noti($tbl,$i);
                    // echo "<pre>";
                    // print_r($a);
                    // echo "SO phan tu cua a la:".count($a);
                    // echo "</pre><hr>";
                if(count($a)>20){
                    self::del_history_noti_in_table($tbl,$i);
                }
            }

        }
// ---------END-----------


//Hiển thị bản ghi của bảng tbl_noti_order giới hạn limit
        public function get_noti_order($from){
            $sql="SELECT * FROM tbl_noti_order ORDER BY id_noti DESC LIMIT $from,5";
            $pre=$this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra noti của 1  đơn hàng bảng tbl_noti_order theo ID
        public function get_noti_order_ID($id_order){
            $sql="SELECT * FROM tbl_noti_order WHERE id_order=:id_order ORDER BY id_noti DESC LIMIT 0,20";
            $pre=$this->pdo->prepare($sql);
            $pre->bindParam(':id_order',$id_order);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }



//Insert 1 thông báo vào bảng tbl_noti_product
            public function add_noti_product($id_product,$content_noti,$action){
                $sql="INSERT INTO tbl_noti_product(id_product,content_noti,action) VALUES (:id_product,:content_noti,:action)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_product',$id_product);
                $pre->bindParam(':content_noti',$content_noti);
                $pre->bindParam(':action',$action);
                return $pre->execute();
            }

//Hiển thị  bản ghi của bảng tbl_noti_product giới hạn limit
        public function get_noti_product($from){
            $sql="SELECT * FROM tbl_noti_product ORDER BY id_noti DESC LIMIT $from,5";
            $pre=$this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra noti của 1  sản phầm bảng tbl_noti_product theo ID
        public function get_noti_product_ID($id_product){
            $sql="SELECT * FROM tbl_noti_product WHERE id_product=:id_product ORDER BY id_noti DESC LIMIT 0,20";
            $pre=$this->pdo->prepare($sql);
            $pre->bindParam(':id_product',$id_product);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

        //thêm ảnh banner
        public function add_banner($name_banner, $path){
            $sql = "INSERT INTO tbl_banner(name_banner, path) VALUES (:name_banner, :path)";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':name_banner', $name_banner);
            $pre->bindParam(':path', $path);
            return $pre->execute();

        }
        //get info at tbl_banner
        public function get_banner(){
            $sql = "SELECT * FROM tbl_banner";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //get banner at id_banner
        public function get_banner_id($id){
            $sql = "SELECT * FROM tbl_banner WHERE id_banner = :id";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':id', $id);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        // delete banner
        public function del_banner($id){
            $sql = "DELETE FROM tbl_banner WHERE id_banner = :id";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':id', $id);
            return $pre->execute();
        }
        //add tbl_news

        public function add_news($title, $content, $img){
            $sql = "INSERT INTO tbl_news(title, content, img) VALUES (:title, :content, :img)";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':title', $title);
            $pre->bindParam(':content', $content);
            $pre->bindParam(':img', $img);
            return $pre->execute();
        } 
        // lấy thông tin từ bảng tbl_news
        public function get_new(){
            $sql = "SELECT * FROM tbl_news";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //chỉnh sửa bảng tbl_news
        public function edit_news($content, $id){
            $sql = "UPDATE tbl_news SET content = :content WHERE id_news = :id";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':id', $id);
            $pre->bindParam(':content', $content);

            return $pre->execute();
        }
        //Hàm lấy tất cả thông tin tại bảng tbl_review
        public function get_review(){
            $sql = "SELECT * FROM tbl_review";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //Lấy ra tất cả thông tin tại bảng tbl_user
        public function get_all_user(){
            $sql = "SELECT * FROM tbl_user";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //lấy ra tất cả thông tin tại bảng tbl_order
        public function get_all_order(){
            $sql = "SELECT * FROM tbl_order";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //láy ra tất cả sản phẩm
        public function get_all_pro(){
            $sql = "SELECT * FROM tbl_product";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //Lấy ra những đơn hàng mới tại bảng tbl_order
        public function get_new_order(){
            $sql = "SELECT * FROM tbl_order WHERE stt = 1 ORDER BY id_order DESC";
            $pre = $this->pdo->prepare($sql);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //limit đơn hàng mới được đặt
        public function get_new_order_limit($form, $row){
            $sql = "SELECT * FROM tbl_order WHERE stt = 1 ORDER BY id_order DESC LIMIT $form, $row";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //hiển thị đơn hàng đã thanh toán theo ngày được lựa chọn
        public function get_order_as_date($start, $end){
            $sql = "SELECT * FROM tbl_order WHERE last_update BETWEEN :start AND :end AND stt = 4";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':start', $start);
            $pre->bindParam(':end', $end);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //limit đơn hàng thanh toán theo ngày được lựa chọn
        // public function get_order_as_date_limit($form, $row, $start, $end){
        //  $sql = "SELECT * FROM tbl_order WHERE last_update BETWEEN :start AND :end AND stt = 4 LIMIT $form, $row";
        //  $pre = $this->pdo->prepare($sql);
        //  $pre->bindParam(':start', $start);
        //  $pre->bindParam(':end', $end);
        //  $pre->execute();
        //  return $pre->fetchAll(PDO::FETCH_ASSOC);
        // }


        //Add lịch sử chỉnh sửa user vào bảng tbl_noti_user
            public function add_noti_user($id_user,$content_noti,$action){
                $sql="INSERT INTO tbl_noti_user (id_user,content_noti,action) VALUES (:id_user,:content_noti,:action)";
                $pre=$this->pdo->prepare($sql);
                $pre->bindParam(':id_user',$id_user);
                $pre->bindParam(':content_noti',$content_noti);
                $pre->bindParam(':action',$action);
                return $pre->execute();
            }
        //lấy noti từ bảng tbl_noti_user có giới hạn limit
        public function get_noti_user($from){
            $sql = "SELECT * FROM tbl_noti_user ORDER BY id_noti DESC LIMIT $from,5";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }
        //Lấy noti của 1 user từ bảng tbl_noti_user bằng id
        public function get_noti_user_id($id){
            $sql = "SELECT * FROM tbl_noti_user WHERE id_user = :id ORDER BY id_noti DESC";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':id', $id);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra 3 đơn hàng thời điểm gần nhất dựa theo stt
       public function get_3order($stt){
            $sql = "SELECT * FROM tbl_order WHERE stt=1 ORDER BY id_order DESC LIMIT 0,3";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':stt', $stt);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Cập nhật thời gian đơn hàng thành công
        public function update_Orderdone($id_order,$order_done){
            $sql="UPDATE tbl_order SET order_done=:order_done WHERE id_order=:id_order";
            $pre=$this->pdo->prepare($sql);
            $pre->bindParam(':id_order', $id_order);
            $pre->bindParam(':order_done', $order_done);
            return $pre->execute();
        }

//Lấy ra ngày order_done cũ nhất của bảng tbl_order
        public function get_Oldtime_orderdone(){
            $sql="SELECT MIN(order_done) FROM tbl_order";
            $pre=$this->pdo->query($sql);
            return $pre->fetch(PDO::FETCH_ASSOC);
        }


//Lấy ra số đơn chốt thành công và doanh thu trong 1 khoảng thời gian đó
        public function orderdone_revenue_date_all($start_time,$end_time){
            if($start_time==false && $end_time == false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));//mặc định lấy ra thời gian cũ nhất,nếu k có session cho tìm kiếm
                $end_time=date("Y-m-d",time()).' 23:59:59';// lấy thời gian hiện tại cho đên cuối ngày (23:59:59).Giải thích ở duới
            }
            else{
                //Note Ví dụ: Nếu để BETWEEN giữa 2020/10/12 và 2020/10/14,thì mặc định sql sẽ lấy khoảng từ 2020/10/12 00:00:00 đến 14/10/2020 00:00:00. Nên sẽ không thể lấy được bản ghi sau 0h ngày 2020/10/14.Xử lý thêm time end 23:59:59

                $end_time=$end_time.' 23:59:59';
            }
            $sql="SELECT count(id_order) as sodonchot,sum(total) as doanhthu FROM tbl_order WHERE stt=4 AND (order_done BETWEEN :start_time AND :end_time)";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':start_time', $start_time);
            $pre->bindParam(':end_time', $end_time);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra tất cả số đơn chốt thành công và doanh thu cho từng ngày      
        public function orderdone_revenue_date_detail($start_time,$end_time){
            if($start_time==false && $end_time == false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));
                $end_time=date("Y-m-d",time()).' 23:59:59';
            }else{
                $end_time=$end_time.' 23:59:59';
            }               
            $sql="SELECT order_done,count(id_order) as sodonchot,sum(total) as doanhthu FROM tbl_order WHERE stt=4 AND (order_done BETWEEN '$start_time' AND '$end_time') GROUP BY order_done";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra số đơn chốt thành công và doanh thu cho từng ngày, có limit phân trang      
        public function orderdone_revenue_date_detail_limit($start_time,$end_time,$from,$row){
            if($start_time==false && $end_time == false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));
                $end_time=date("Y-m-d",time()).' 23:59:59';
                // echo $start_time;
                // echo $end_time;
            }else{
                $end_time=$end_time.' 23:59:59';
            }

            if(!isset($_SESSION['sort_date']) || (isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='date_ASC')){
                $sort='ORDER BY tbl_order.order_done ASC';
            }else if(isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='date_DESC'){
                $sort='ORDER BY tbl_order.order_done DESC';
            }else if(isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='revenua_ASC'){
                $sort='ORDER BY doanhthu ASC';
            }else if(isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='revenua_DESC'){
                $sort='ORDER BY doanhthu DESC';
            }else if(isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='quantity_ASC'){
                $sort='ORDER BY sodonchot ASC';
            }else if(isset($_SESSION['sort_date'])&&$_SESSION['sort_date']=='quantity_DESC'){
                $sort='ORDER BY sodonchot DESC';
            }

            $sql="SELECT order_done,count(id_order) as sodonchot,sum(total) as doanhthu FROM tbl_order WHERE stt=4 AND (order_done BETWEEN '$start_time' AND '$end_time') GROUP BY order_done ".$sort." LIMIT $from,$row";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra tổng số lượng đã bán,tổng doanh thua của tổng tất cả sản phẩm trong 1 khoảng thời gian đó
        public function orderdone_revenue_product_all($start_time,$end_time,$key_search){
            if($start_time==false && $end_time == false && $key_search==false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));//mặc định lấy ra thời gian cũ nhất,nếu k có session cho tìm kiếm
                $end_time=date("Y-m-d",time()).' 23:59:59';// lấy thời gian hiện tại cho đên cuối ngày (23:59:59).Giải thích ở duới
                $key_search='%%';
            }
            else{
                //Note Ví dụ: Nếu để BETWEEN giữa 2020/10/12 và 2020/10/14,thì mặc định sql sẽ lấy khoảng từ 2020/10/12 00:00:00 đến 14/10/2020 00:00:00. Nên sẽ không thể lấy được bản ghi sau 0h ngày 2020/10/14.Xử lý thêm time end 23:59:59

                $end_time=$end_time.' 23:59:59';
            }
            $sql="SELECT SUM(tbl_detail_order.quantity) as SLdaban,SUM(tbl_detail_order.total) as doanhthu FROM tbl_order,tbl_product,tbl_detail_order WHERE (tbl_product.id_product=tbl_detail_order.id_product) AND (tbl_order.id_order=tbl_detail_order.id_order) AND (tbl_order.stt=4) AND (tbl_order.order_done BETWEEN :start_time AND :end_time) AND (tbl_product.name_product LIKE :key_search OR tbl_product.id_product LIKE :key_search)";
            $pre = $this->pdo->prepare($sql);
            $pre->bindParam(':start_time', $start_time);
            $pre->bindParam(':end_time', $end_time);
            $pre->bindParam(':key_search', $key_search);
            $pre->execute();
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra tổng sl đã bán và doanh thu cho từng sản phẩm     
        public function orderdone_revenue_product_detail($start_time,$end_time,$key_search){
            if($start_time==false && $end_time == false && $key_search==false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));
                $end_time=date("Y-m-d",time()).' 23:59:59';
                $key_search='%%';
            }else{
                $end_time=$end_time.' 23:59:59';
            }               
            $sql="SELECT tbl_detail_order.id_product,tbl_product.img,tbl_product.name_product,SUM(tbl_detail_order.quantity) as SLdaban,SUM(tbl_detail_order.total) as doanhthu FROM tbl_order,tbl_product,tbl_detail_order WHERE (tbl_product.id_product=tbl_detail_order.id_product) AND (tbl_order.id_order=tbl_detail_order.id_order) AND (tbl_order.stt=4) AND (tbl_order.order_done BETWEEN '$start_time' AND '$end_time') AND (tbl_product.name_product LIKE '$key_search' OR tbl_product.id_product LIKE '$key_search') GROUP BY tbl_detail_order.id_product";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }

//Lấy ra tổng sl đã bán và doanh thu cho từng sản phẩm  , có limit phân trang      
        public function orderdone_revenue_product_detail_limit($start_time,$end_time,$key_search,$from,$row){
            if($start_time==false && $end_time == false && $key_search == false){
                $get_oldtime=self::get_Oldtime_orderdone();
                $get_oldtime=$get_oldtime['MIN(order_done)'];
                $start_time=date("Y-m-d",strtotime($get_oldtime));
                $end_time=date("Y-m-d",time()).' 23:59:59';
                $key_search='%%';
            }else{
                $end_time=$end_time.' 23:59:59';
            }

            if(!isset($_SESSION['sort_product']) || (isset($_SESSION['sort_product'])&&$_SESSION['sort_product']=='revenua_ASC')){
                $sort='ORDER BY doanhthu ASC';
            }else if(isset($_SESSION['sort_product'])&&$_SESSION['sort_product']=='revenua_DESC'){
                $sort='ORDER BY doanhthu DESC';
            }else if(isset($_SESSION['sort_product'])&&$_SESSION['sort_product']=='quantity_ASC'){
                $sort='ORDER BY SLdaban ASC';
            }else if(isset($_SESSION['sort_product'])&&$_SESSION['sort_product']=='quantity_DESC'){
                $sort='ORDER BY SLdaban DESC';
            }

            $sql="SELECT tbl_detail_order.id_product,tbl_product.img,tbl_product.name_product,SUM(tbl_detail_order.quantity) as SLdaban,SUM(tbl_detail_order.total) as doanhthu FROM tbl_order,tbl_product,tbl_detail_order WHERE (tbl_product.id_product=tbl_detail_order.id_product) AND (tbl_order.id_order=tbl_detail_order.id_order) AND (tbl_order.stt=4) AND (tbl_order.order_done BETWEEN '$start_time' AND '$end_time') AND (tbl_product.name_product LIKE '$key_search' OR tbl_product.id_product LIKE '$key_search') GROUP BY tbl_detail_order.id_product ".$sort." LIMIT $from,$row";
            $pre = $this->pdo->query($sql);
            return $pre->fetchAll(PDO::FETCH_ASSOC);
        }


    }
 ?>
