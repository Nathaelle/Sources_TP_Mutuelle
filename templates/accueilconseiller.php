<section id="espace">
    <p><a href="index.php?route=deconnect">Me déconnecter</a></p>
    <h2>Mon espace conseiller</h2>
    <ul>
        <li>Informations personnelles</li>
        <li>Gérer mon compte</li>
        <li>Gérer mes ayants-droits</li>
    </ul>
</section>

<h2>Ajouter une formule</h2>
<form action="index.php?route=insertformule" method="POST" enctype="multipart/form-data">

    <input type="file" name="image">
    <input type="text" placeholder="Nom de la formule" name="nom">
    <input type="text" placeholder="Tarif forfait base" name="tarif">
    <input type="submit" value="Ajouter la nouvelle formule">

</form>

<!-- Affichage des formules -->
<?php
$formules = $tab["formules"];
?>

<table>
    <tr>
        <th>Illustration</th>
        <th>Nom</th>
        <th>Tarif forfaitaire</th>
        <th>Action</th>
    </tr>

    <?php foreach($formules as $formule): ?>
        <tr>
            <td><img width="40" src="upload/<?= $formule["image"] ?>" alt=""></td>
            <td><?= $formule["nom"] ?></td>
            <td><?= $formule["tarif_base"] ?></td>
            <td>Modifier | <a href="index.php?route=suppformule&id=<?= $formule["id_formule"] ?>">Supprimer</a></td>
        </tr>
    <?php endforeach ?>
</table>