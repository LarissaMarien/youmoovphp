<?php
return "
				<p id='plogin'>ben je al lid van youmoov? log dan hier in.</p>
				<form class='login' method='post' action='admin.php'>
				  <h3>Inloggen</h3>
				  <label for='email'>e-mail: </label>
					<input type='email' name='email' id='email' required />
				  <label for='paswoord'>paswoord: </label>
				  <input type='password' name='paswoord' id='paswoord' required />
				  <input type='submit' value='inloggen' name='login-gebruiker' />
				</form>
				<p id='plogin'>nog geen lid van youmoov? wordt dan hier lid.</p>
				<form class='new' method='post' action='admin.php'>
	        <h3>Lid worden</h3>
	        <label for='email'>e-mail: </label>
	        <input type='text' name='email' id='email' required/>
	        <label for='gebruikersnaam'>gebruikersnaam: </label>
	        <input type='text' name='gebruikersnaam' id='gebruikersnaam' required/>
	        <label for='paswoord'>paswoord: </label>
	        <input type='password' name='paswoord' id='paswoord' required/>
	        <input type='submit' value='maak aan' name='nieuwe-gebruiker'/>
				</form>
				";
