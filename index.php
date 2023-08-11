<?php
include_once("./templates/header.php");
?>

<div class="container">
    <?php if (isset($printMsg) && $printMsg != '') : ?>
        <p id="msg"> <?= $printMsg ?></p>
    <?php endif; ?>
    <h1 id="main-title" class="text-center" >Agenda da massa regueira </h1>
    <?php if (count($contacts) > 0) : ?>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <?php foreach ($contacts as $contact) : ?>
                <tbody>
                    <tr>
                        <th scope="row"><?= $contact["id"] ?></th>
                        <td scope="row"><?= $contact["nameContact"] ?></td>
                        <td scope="row"><?= $contact["phoneContact"] ?></td>
                        <td class="actions">
                            <a href="<?= $BASE_URL ?>show.php?id=<?= $contact["id"] ?>"><i class="fas fa-eye check-icon" style="color: #1E7E34;"></i></a>
                            <a href="<?= $BASE_URL ?>edit.php?id=<?= $contact["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                            <button type="submit" class="delete-btn"> <i class="fa-solid fa-trash" style="color: #31df01"></i></button>
                        </td>
                    </tr>
                </tbody>
            <?php endforeach; ?>
        </table>
    <?php else : ?>
        <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?= $BASE_URL ?>create.php">clique aqui para adicionar contatos</a>.</p>
    <?php endif; ?>
</div>

<?php
include_once("./templates/footer.php");
?>
