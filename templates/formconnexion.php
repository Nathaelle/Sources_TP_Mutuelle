<div id="formcon">
    <h2>Connectez-vous !</h2>
    <form id="connexion" action="index.php?route=connect" method="POST">
        <div><input type="text" placeholder="Adresse Email" id="" name="email"></div>
        <div><input type="password" placeholder="Mot de passe" id="" name="passwd"></div>
        <div><input type="submit" value="Connexion"></div>
    </form>

    <p>Pas encore membre ? <a class="switchbutt" href="#">Inscrivez-vous</a></p>
</div>

<div id="formins">
    <h2>Inscrivez-vous !</h2>
    <form id="inscription" action="index.php?route=insertuser" method="POST">
        <div><input type="text" placeholder="Adresse Email" id="" name="email"></div>
        <div><input type="password" placeholder="Mot de passe" id="" name="passwd"></div>
        <select name="role" id="">
            <option value="Conseiller">Conseiller</option>
            <option value="Assure">Assuré</option>
        </select>
        <div><input type="submit" value="Inscription"></div>
    </form>

    <p>Déjà membre ? <a class="switchbutt" href="#">Connectez-vous</a></p>
</div>







<script src="js/showforms.js"></script>