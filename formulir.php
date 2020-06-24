<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$namaErr = $alamatErr = $teleponErr = $jkErr="";
$nama = $alamat = $jenis_kelamin = $telepon = $Prestasi="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["nama"])) {
    $namaErr = "Nama harap diisi";
  } else {
    $nama = test_input($_POST["nama"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$nama)) {
      $namaErr = "Hanya huruf yang dapat diterima";
    }
  }
  
  if (empty($_POST["alamat"])) {
    $alamatErr = "Alamat harap diisi";
  }else {
    $nama = test_input($_POST["alamat"]);
  }  
  if (empty($_POST["jenis_kelamin"])) {
    $jkErr = "Jenis kelamin harap diisi";
  } else {
    $jenis_kelamin = test_input($_POST["jenis_kelamin"]);
  }

  if (empty($_POST["telepon"])) {
    $teleponErr = "Nomor telepon harap diisi";
  } else {
    $telepon = test_input($_POST["telepon"]);
    // check if name only contains letters and whitespace
    if (!is_numeric($telepon)) {
      $teleponErr = "Hanya angka yang dapat diterima";
    }
  }
 
  if (empty($_POST["Prestasi"])) {
    $Prestasi = "";
  } else {
    $Prestasi = test_input($_POST["Prestasi"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

<table align="center" border="1" cellpadding="10" cellspacing="0" bgcolor="yellow">
<td>
<pre>
<label>Nama                         :</label> <input type="text" name="nama" value="<?php echo $nama;?>">
<span class="error"> <?php echo $namaErr;?></span>
</pre>
<pre>
<label>Alamat                       :</label> <input type="text" name="alamat" value="<?php echo $alamat;?>">
<span class="error"> <?php echo $alamatErr;?></span>
</pre>
<pre>
<label>Telpon                       :</label> <input type="text" name="telepon" value="<?php echo $telepon;?>">
<span class="error"> <?php echo $teleponErr;?></span>
</pre>
<pre>
<label>Jenis kelamin                :</label> <label><input type="radio" name="jenis_kelamin" <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Laki-laki") echo "checked";?> value="Laki-laki"> Laki-laki</label> <label><input type="radio" name="jenis_kelamin" <?php if (isset($jenis_kelamin) && $jenis_kelamin=="Perempuan") echo "checked";?> value="Perempuan"> Perempuan</label>
<span class="error"> <?php echo $jkErr;?></span>
</pre>
<pre>
<label>Agama                        :</label> <select>
                <option>Islam</option>
                <option>Protestan</option>
                <option>Katolik</option>
                <option>Hindu</option>
                <option>Buddha</option>
            </select>
     </pre>
            <pre>
<label>Prestasi yang pernah di raih :</label> <textarea name="Prestasi"><?php echo $Prestasi;?></textarea>
</pre>
            <input type="submit"name="submit" value="Submit">
        </td>
    </table>
    </form>

<?php
echo "<h2>Output :</h2>";
echo $nama;
echo "<br>";
echo $alamat;
echo "<br>";
echo $telepon;
echo "<br>";
echo $jenis_kelamin;
echo "<br>";
echo $Prestasi;
?>

</body>
</html>