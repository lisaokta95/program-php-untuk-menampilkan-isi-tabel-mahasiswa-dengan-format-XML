<?php
include 'connect.php';
    if( !$xml = simplexml_load_file('record.xml') ) //using simplexml_load_file function to load xml file
    {
        echo 'load XML failed ! ';
    }
    else
    {
        echo '<h1>This is the Data</h1>';
		foreach( $xml as $record ) //parse the xml file into object
        {
			$nim = $record->Nim; //get the childnode title
			$nama = $record->Nama; //get the child node author
			$alamat = $record->Alamat; //get the child node publisher
			$progdi = $record->Progdi; //get the child node publisher


            echo 'Nim : '.$nim.'<br />';
            echo 'Nama : '.$nama.'<br />';
			echo 'Alamat : '.$alamat.'<br />';
			echo 'Progdi : '.$progdi.'<br />';

//save to database
			$q = "INSERT INTO mahasiswa VALUES('','$nama','$nim','$alamat','$progdi')";
			$result = mysql_query($q);
        }
			if ($result) {
			echo '<h2>Success Save to Database </h2>';
			}
			else echo '<h2>Failed Save to Databaase</h2>';
    }
?> 