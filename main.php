<?php
	error_reporting(~E_ALL);//ta część skyptu powoduje , że php będzie wyświetlało wszystkie błędy jakie występują
	$baza = mysqli_connect('localhost', 'root', '', 'aplikacje2p'); //Mysqli_connect pozwala nam na połączenie bazy danej do podanej przez nas strony
	$good=false;
	if (isset($_POST['name'])) { 
		if (!empty($_POST['name'])) { //Ten kawałek skryptu php powoduje , że informacje wysłane przez formularz zostają dodane do bazy danych jako komenda Insert Into , jeżeli wystąpi błąd to wyskakuje komunikat błąd zapytania i informacje nie zostaną dodane"
			mysqli_query($baza,"INSERT INTO `kontakty` (`imie`,`nazwisko`,`plec`,`tresc`,`email`)   
			VALUES ('{$_POST['name']}','{$_POST['lastname']}','{$_POST['sex']}','{$_POST['content']}',  
			'{$_POST['email']}');") or die ("Błąd zapytania");
			echo '<p>Dodano informacje do bazy danych</p>'; //Ta część php powoduje , że zostaje wyświetlony komunikat o tym , że dane zostały dodane do bazy danych
			$good=true;
		}
	}
	if (!$good)
		echo '<p>Nastąpił nieoczekiwany błąd - dane nie zostały dodane do bazy.</p>'; //Ta część php powoduje , że zostaje wyświetlony komunikat , że dane przekazane przez nas nie zostały dodane do bazy danych 
	
	mysqli_close($baza);
	//echo 'Odpowiedź z PHP ' . $_POST['email'];
