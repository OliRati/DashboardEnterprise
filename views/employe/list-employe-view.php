<?php
require PHP_ROOT . "/views/partials/head.php"; ?>

<h1>Liste des employés</h1>

<div style="margin: 1rem">
    <a href="<?= WEB_ROOT . "/employe/add-employe.php" ?>" role="button" class="outline">
        Ajouter un employe
    </a>

    <?php if (!empty($employes)) { ?>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Service</th>
                    <th>Date d'embauche</th>
                    <th>Salaire mensuel</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($employes as $employe): ?>
                    <tr id="<?= "id".$employe['id_employes'] ?>">
                        <td><?= $employe['id_employes'] ?></td>
                        <td><?= $employe['prenom'] ?></td>
                        <td><?= $employe['nom'] ?></td>
                        <td><?= $employe['sexe'] ?></td>
                        <td><?= $employe['service'] ?></td>
                        <td><?= $employe['date_embauche'] ?></td>
                        <td><?= $employe['salaire'] ?> &euro;</td>
                        <td><a href="<?= WEB_ROOT . "/employe/edit-employe.php" . "?id=" . $employe['id_employes'] ?>"
                                role="button" class="secondary">Editer</a>
                            <a href="<?= WEB_ROOT . "/employe/del-employe.php" . "?id=" . $employe['id_employes'] ?>"
                                role="button"
                                onclick="return confirm('Etes vous certain de vouloir supprimer cet employé ?');">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p class="empty">Aucun employé est enregistré.</p>
    <?php } ?>

</div>

<?php require PHP_ROOT . "/views/partials/tail.php"; ?>