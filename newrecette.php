<?php include 'includes/server.php' ?>
<?php include 'includes/functions.php' ?>

<!DOCTYPE HTML>
<html>
<head>

	<title>Nouvelle recette</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="assets/js/ingredients.js"></script>
</head>
<body class="is-preload">

	<div id="wrapper">
		<div id="main">
			<div class="inner">
				<?php include 'includes/header.php';?>

				<section>
					<header class="major">
						<h2>Créer nouvelle recette </h2>
					</header>

					<form method="post" action="newrecette.php" enctype="multipart/form-data">
                        <input type="hidden" value="dummy" name="sel_subj[]"/>
                        <input type="hidden" value="ECE" name="sel_subj[]"/>
                        <input type = "hidden" name="diffname" id="diffid"/>
                        <input type = "hidden" name="coutname" id="coutid"/>
                        <input type = "hidden" name="ingname"  id="ing"/>
                        <input type = "hidden" name="utname"   id="ut"/>
                        <input type = "hidden" name="etname1"   id="et1"/>
                        <?php include 'includes/errors.php'; ?>
                        <div class="row gtr-uniform">
                         <div class="col-12">
                            <h3>Titre</h3>
                            <input type="text" name="titre" id="demo-name"  placeholder="Titre" required >
                        </div>
                        <div class="col-12">
                            <h3>Duree cuisson</h3>
                            <input type="text" name="dureecuisson" id="demo-dureecuisson" v placeholder="Duree Cuisson" required>
                        </div>
                        <div class="col-12">
                            <h3>Duree Répos</h3>
                            <input type="text" name="dureerepos" id="demo-dureerepos"  placeholder="Duree Répos" required>
                        </div>
                        <div class="col-12">
                            <h3>Duree Préparation</h3>
                            <input type="text" name="dureeprepa" id="demo-dureeprepa"  placeholder="Duree Préparation" required>
                        </div>

                        <div class="col-12">
                            <h3>Difficulté</h3>
                            <input type="radio" id="stardiff5" name="diff" value="5" /><label for="stardiff5" >Très difficile</label>
                            <input type="radio" id="stardiff4" name="diff" value="4" /><label for="stardiff4" >Difficile</label>
                            <input type="radio" id="stardiff3" name="diff" value="3" /><label for="stardiff3" >moyen</label>
                            <input type="radio" id="stardiff2" name="diff" value="2" /><label for="stardiff2" >Facile</label>
                            <input type="radio" id="stardiff1" name="diff" value="1" /><label for="stardiff1" >Très facile</label>
                        </div >
                        <div class="col-12">
                            <h3>Coût</h3>
                            <input type="radio" id="star3" name="cout" value="3" /><label for="star3" >Élevé</label>
                            <input type="radio" id="star2" name="cout" value="2" /><label for="star2" >Moyen</label>
                            <input type="radio" id="star1" name="cout" value="1" /><label for="star1" >Faible</label>
                        </div >
                        <div class="col-12">
                            <h3>Categorie</h3>
                            <input type="text" name="categorie" id="demo-categorie" value="<?php echo $categorie; ?>" placeholder="Categorie" required>
                        </div>

                        <div class="col-12">
                            <h3>Ingredients</h3>
                            <input type="hidden" name="countIng" value="1" />

                            <form class="input-append">
                                <div id="fieldIng" class="col-12">

                                    <input autocomplete="off" class="inputI" id="fieldIng1" name="profIng[]" type="text" placeholder="Ingredient 1" data-items="8"/>
                                    <button id="b1" class="btn add-more-ing" type="button">+</button>

                                </div>
                            </form>
                            <br>


                        </div> 
                        <div class="col-12">
                            <h3>Utensilles</h3>
                            <input type="hidden" name="countUt" value="1" />

                            <form class="input-append">
                                <div id="fieldUt" class="col-12">

                                    <input autocomplete="off" class="inputU" id="fieldUt1" name="profUt[]" type="text" placeholder="Utensille 1" data-items="8"/>
                                    <button id="b1" class="btn add-more-ut" type="button">+</button>

                                </div>
                            </form>
                            <br>


                        </div> 
                        <div class="col-12">
                            <h3>Etapes</h3>
                            <input type="hidden" name="count" value="1" />

                            <form class="input-append">
                                <div id="field" class="col-12">
                                    <p style="text-align:center">Étape 1</p>
                                    <textarea rows="8" cols="50" autocomplete="off" class="inputE" id="field1" name="profEt[]" type="text" placeholder="Etape" ></textarea>
                                    <button id="b1" class="btn add-more" type="button">+</button>
                                    <!-- <input autocomplete="off" class="input" id="fieldEt1" name="prof1" type="text" placeholder="Etape" data-items="8"/><button id="b1" class="btn add-more-et" type="button">+</button> -->

                                </div>
                            </form>
                            <br>


                        </div>
                        <div class="col-12"> <!-- class="primary" -->
                            <ul class="actions">
                                <li><input class="btn" type="file" name="imagen" maxlength="150" value="Joindre Photo"/><li>
                                </ul>
                            </div>
                            <div class="col-12">
                                <ul class="actions">
                                   <li><input class="btn register" type="submit" value="Register" name="reg_recette"/></li>

                               </ul>
                           </div>
                           <div class="col-12"> 


                           </div>
                       </form>
                   </section>

               </div>
           </div>

           <?php include 'includes/sidebar.php';
           ?>

       </div>
       <script src="assets/js/jquery.min.js"></script>
       <script src="assets/js/browser.min.js"></script>
       <script src="assets/js/breakpoints.min.js"></script>
       <script src="assets/js/util.js"></script>
       <script src="assets/js/main.js"></script>

   </body>

   </html>


