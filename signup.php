 <?php
   /*
   ** 1. Creati o functie de validare care sa poate valida trei tipuri de date (email, password and name)
   **    a. schimbati regexul de email astfel incat domeniul adresei sa se termine in ".com"
   **    b. creati un regex pt parola care sa verifice daca exista cel putin o cifra in parola
   **    c. creati un regex pt name care sa verifice ca lungimea minima a fie de 4 caractere
   **
   ** 2. Adaugati doua inputuri in formular first_name si last_name care sa le validati cu tipul name de mai sus.
   ** 3. In cazul in care formularul nu se valideaza precompletati campurile cu valorile introduse de utilizator si aratati erorile cu rosu ca in exemplu.
   ** 4. Dupa validare adaugati userul in baza de date si incercati loginul cu el.
   ** 5. BONUS Validati parola astfel incat sa aiba cel putin 10 caractere si o cifra si un caracter special (#$%^&*)
   **
   ** SUCESS!!!
   **
   */
   
   require_once('utils.php');
   
   if (isset($_POST["submit"])) {
      
      $form["email"] = isset($_POST["email"]) ? $_POST["email"] : null;
      $form["password"] = isset($_POST["password"]) ? $_POST["password"] : null;
      $form["repassword"] = isset($_POST["repassword"]) ? $_POST["repassword"] : null;
      
      // check if email is valid
      if (!emailValidator($form["email"])) {
        $error["email"] = 'Invalid email';
      }
     
	  // check if password is valid 	
      if(!passwordValidator($form["password"])) {
      	if ($form["password"] !== $form["repassword"]) {
      		//Validate pass contain at least one digit
      		$error["password"] = "passwords don't match";
      	}
      } else {
      	$error["password"] = 'Invalid password';
      }
      
      if (count($error) == 0) {
      	//TODO insert user and pass into db
      	
      	//redirect to login
      	header("Location: http://188.166.119.187/workspace/Resurse_comune/curs6/login.php");
      }
   }
   
   
 ?>
 
 <style>
   div {
       margin-bottom: 10px;
   }
   span {
   	color: red;
   }
 </style>
 
 <h1>Sign Up</h1>
 
 <form method="POST" novalidate>
   <div>
   	<input type="email" name="email" value="<?php echo isset($form["email"] ) ? $form["email"]  : ''; ?>"> Email
   </div>
   <span><?php echo isset($error["email"]) ? $error["email"] : ""; ?></span>
   <div>
   	<input type="password" name="password"> Password
   </div>
   <div>
   	<input type="password" name="repassword"> Re password
   	</div>
   <span><?php echo isset($error["password"]) ? $error["password"] : ""; ?></span>
   <div>
	<input type="submit" name="submit">
   </div>	
 </form>
