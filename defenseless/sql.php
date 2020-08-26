<?php
			$connect = mysqli_connect("localhost","root","","testapp");
              if(isset($_POST["submit"])){

                if($_FILES['file']['name']){
                    $filename = explode(".",$_FILES['file']['name']);
                    if($filename[1] == 'csv'){

                        $handle = fopen($_FILES['file']['tmp_name'], "r");
                        while($data = fgetcsv($handle)){

                        	$item1 = mysqli($connect,$data[0]);
                        	$item2 = mysqli($connect,$data[1]);
                        	$item3 = mysqli($connect,$data[2]);
                        	$item4 = mysqli($connect,$data[4]);
                        	$sql="INSERT into clients(name,person,mobile,address) values ('$item1', '$item2', '$item3', '$item4')";
                        	mysqli_query($connect, $sql);
                        }

                        fclose($handle);
                        print "done";
                    }

                }
              }


            ?>

