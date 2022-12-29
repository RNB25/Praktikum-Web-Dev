<?php
        //koneksi ke database
        $conn = mysqli_connect("localhost", "root", "", "praktikum11");

        //fungsi untuk mengambil data dari database
        function query($query){
            global $conn;
            $data = mysqli_query($conn, $query);
            $karyawans = [];
            while( $karyawan = mysqli_fetch_assoc($data) ) {
                $karyawans[] = $karyawan;
            }
            if($karyawans != NULL){
                return $karyawans;
            }
        }

        function tambah($data){
            global $conn;

            $name = $data["name"];
            $email = $data["email"];
            $address = $data["address"];
            $gender = $data["gender"];
            $position = $data["pos"];
            $status = $data["status"];

            
            $result = query("SELECT * FROM karyawan");

            $query = "INSERT INTO karyawan (nama, email, `address`, position, gender, `status`)
                    VALUES
                    ('$name', '$email', '$address', '$position', '$gender', '$status')
                ";
            
            
            if($result != NULL){
                foreach($result as $row){
                    if($row['email'] == $email){
                        echo "
                            <script>
                            alert('GAGAL!, data email sudah terdaftar!');
                            document.location.href = 'index.php';
                            </script>
                            ";
                            return mysqli_affected_rows($conn);
                        }
                    }
                }
            $data = mysqli_query($conn, $query); 
            //menggunakan query untuk menambah data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }

        function hapus($id){
            global $conn;
            mysqli_query($conn, "DELETE FROM karyawan WHERE id = $id");
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }

        function edit($id, $data){
            global $conn;   

            $name = $data["name"];
            $address = $data["address"];
            $gender = $data["gender"];
            $position = $data["pos"];
            $status = $data["status"];

            $query = "UPDATE karyawan SET nama='$name', `address`='$address', position = '$position', gender = '$gender', `status` = '$status'
                    WHERE id = '$id'
                ";
            
            $data = mysqli_query($conn, $query); 
            //menggunakan query untuk edit data yaitu memerlukan parameter penghubung database dan query sql
            mysqli_query($conn, $query);
            //mengembalikan jumlah pada database,
            //contoh: jika id = 3 terdapat pada database maka akan mereturn nilai 1, jika tidak ada maka return 0
            return mysqli_affected_rows($conn);
        }
?>