<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
		
        <title></title>
        <script language="javascript">
        function smile(code){
        smilex=document.getElementById("message").value;
        document.getElementById("message").value = smilex + code;
        
    }
        </script>
		<script language="javascript" src="js/jquery-3.2.1.js">
  </script>
	
		<script type="text/javascript">
var auto_refresh = setInterval(
  function ()
  {
    $('#container').load('index.php .donnees_id');
  }, 2000); // rafraichis toutes les 10000 millisecondes
 
</script>
	
    </head>
    <body >
        <div id="content" style="width:700px;padding:20px;background:#ccc;border:1px solid #020202;">
        <form action="postit.php" method="post" name="form1">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" value="<?php
            
                  if (isset($_COOKIE['mchat'])){
                $value=$_COOKIE['mchat'];
                $namefullfill=  htmlspecialchars($value);
            }
            else{
                $namefullfill="anonymous";
            }
            
            echo $namefullfill  ?>"/>
            <label for="message">Message :</label>
            <textarea name="message" id="message" rows="5" cols="44"></textarea><br/>
            <div style="text-align:right;width:640px;"><input type="submit" value="envoyer" name="envoyer"><input type="reset" value="effacer" ></div>
        </form>
        <div id="smileys" style="background:#333;color:#333;padding:18px;margin:3px;width:600px;" >
            
            <a href="#" onclick="javascript:smile(' :) ')" >
                <img src="img/01.png"/>
            </a>
             <a href="#" onclick="javascript:smile(' :D ')" >
                <img src="img/02.png"/>
            </a>
            <a href="#" onclick="javascript:smile(' :l ')" >
                <img src="img/03.png"/>
            </a>
            <a href="#" onclick="javascript:smile(' :z ')" >
                <img src="img/05.png"/>
            </a>
                <a href="#" onclick="javascript:smile(' :(')" >
                <img src="img/04.png"/>
            </a>
            </a>
                <a href="#" onclick="javascript:smile(' :--')" >
                <img src="img/06.png"/>
            </a>
               <a href="#" onclick="javascript:smile(' -p- ')" >
                <img src="img/07.png"/>
            </a>
               <a href="#" onclick="javascript:smile(' :-[] ')" >
                <img src="img/08.png"/>
            </a>
               <a href="#" onclick="javascript:smile(' :|| ')" >
                <img src="img/09.png"/>
            </a>
               <a href="#" onclick="javascript:smile(' :-*')" >
                <img src="img/010.png"/>
            </a>
               </a>
               <a href="#" onclick="javascript:smile(' -d-')" >
                <img src="img/011.png"/>
            </a>
                 <a href="#" onclick="javascript:smile(' -OO- ')" >
                <img src="img/012.png"/>
            </a>
                <a href="#" onclick="javascript:smile(' -SFl- ')" >
                <img src="img/013.png"/>
            </a>
                <a href="#" onclick="javascript:smile(' -$- ')" >
                <img src="img/014.png"/>
            </a>
                <a href="#" onclick="javascript:smile(' -¨- ')" >
                <img src="img/015.png"/>
            </a>
                <a href="#" onclick="javascript:smile(' -bounce- ')" >
                <img src="img/016.gif"/>
            </a>
            
        
            
        </div>
        <div id="container" style="background:#333;color:#fff;padding:20px;width:600px;">


        <?php
      
        $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8', 'root', '');

        $rep = $bdd->query("SELECT * FROM usersmsg ORDER BY id DESC LIMIT 7");
        
        while ($donnees = $rep->fetch()) {
            
            echo   '<div class="donnees_id">'.$donnees['nom'] . ' : ' . $donnees['msg'] .'</div>'; "<br/>";
            
       
            
        }
    
        ?>
            
        </div>
        </div>
    </body>
</html>
