	<?php 
		include('Connect.php');
		class Datphong
		{
			//Them email, pass
			public function adduser($email,$pass)
			{
				global $conn;
				$sql="insert into t_dk(Email,Pass) values('$email','$pass')";
				$run=mysqli_query($conn,$sql);
				return $run;
			}
			
			//Doi mat khau
			public function Update_pass($email,$pass)
			{
				global $conn;
				$sql="update t_dk set Pass ='$pass' where Email = '$email'";	
				$run=mysqli_query($conn,$sql);
				return $run;
			}
						
			//Lay email tu bang t_dk
			public function login_user($email)
			{
				global $conn;
				$sql = "select * from t_dk where Email = '$email'";
				$run = mysqli_query($conn,$sql);
				$num = mysqli_num_rows($run);
				return $num;
			}
			
			//Lay pass tu bang t_dk
			public function login_pass($email)
			{
				global $conn;
				$sql = "select * from t_dk where Email='$email'";
				$run = mysqli_query($conn,$sql);
				$data=array();
				if($run){
					while($rows=mysqli_fetch_array($run))
					{$data[]=$rows;}
				}
				return $data;
			}

			//Lay thong tin Email tu ca 2 bang de so sanh, neu da co thi bao da ton tai, khong thi cho phep dang ky email
			public function Select_email($email)
			{
				global $conn;
				$sql = "select * from t_dk inner join t_thongtin on t_dk.Email = t_thongtin.Email where Email = '$email' ";	
				$run = mysqli_query($conn,$sql);
				$num = mysqli_num_rows($run);
				return $num;
			}
			
			//Insert bang t_thongtin
			public function Insert_t_thongtin($f_name,$l_name,$email,$number,$checkin,$checkout,$number_adults,$children,$infants,$more,$tong_tien)
			{
				global $conn;
				$sql="insert into t_thongtin(
FirstName,LastName,Email,Number,CheckIn,CheckOut,Number_of_adults,Children,Infants,More_details,Tong_tien) values('$f_name','$l_name','$email','$number','$checkin','$checkout','$number_adults','$children','$infants','$more','$tong_tien')";
				$run=mysqli_query($conn,$sql);
				return $run;
			}
			
			//Update bang t_thong tin
			public function Update_t_thongtin($f_name,$l_name,$email,$number,$checkin,$checkout,$number_adults,$children,$infants,$more,$tong_tien)
			{
				global $conn;
				$sql="update t_thongtin set FirstName='$f_name', LastName='$l_name', Number='$number', CheckIn='$checkin', CheckOut='$checkout', Number_of_adults='$number_adults', Children='$children', Infants='$infants', More_details='$more', Tong_tien='$tong_tien' where Email = '$email'";	
				$run=mysqli_query($conn,$sql);
				return $run;
			}
			
			//Delete bang t_thong tin
			public function Delete_t_thongtin($email)
			{
				global $conn;
				$sql="delete from t_thongtin where Email = '$email'";	
				$run=mysqli_query($conn,$sql);
				return $run;
			}
			
			//Lay thong tin ra form theo email
			public function Select_t_thongtin($session)
			{
				global $conn;
				$sql = "select * from t_thongtin where Email = '$session'";
				$run = mysqli_query($conn,$sql);
				$data = array();
				if($run)
				{
					while($rows = mysqli_fetch_array($run))	
					{$data[] = $rows;}
				}
				return $data;
			}

			//Lay All thong tin email
			public function select_all()
			{
				global $conn;
				$sql = "select * from t_thongtin";
				$run = mysqli_query($conn,$sql);
				$data = array();
				if($run)
				{
					while($rows = mysqli_fetch_array($run))
					{$data[] = $rows;}
				}
				return $data;
			}	
			
		}
	?>
