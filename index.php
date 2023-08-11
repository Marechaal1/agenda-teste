<?php
    include_once("./templates/header.php");
?>
 
<div class="container">
    <?php if(isset($printMsg) && $printMsg != ''): ?>
        <p id="msg"> <?= $printMsg ?></p>
        <?php endif; ?>
        <h1 id="main-title">Agenda da massa regueira </h1>
        <?php if(count($contacts) > 0): ?>
            <table class="table" id="contacts-table">
                <thead>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Telefone</th>
                    <th scope="col"></th>
                </thead>
                <tbody>
                    <?php foreach($contacts as $contact): ?>
                        <tr>
                            <td scope="row" class="col-id" ><?=$contact["id"] ?></td>
                            <td scope="row" ><?=$contact["nameContact"] ?></td>
                            <td scope="row" ><?=$contact["phoneContact"] ?></td>
                            <td class="actions">
                                <a href="<?=$BASE_URL?>show.php?id=<?=$contact["id"] ?>"><i class="fas fa-eye check-icon"></i></a>
                                <a href="<?=$BASE_URL?>edit.php?id=<?=$contact["id"] ?>"><i class="far fa-edit edit-icon"></i></a>
                                <form action="">
                                    <input type="hidden" name="type" value="delete">
                                    <input type="hidden" name="id" value="<?=$contact?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                                    
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else : ?>
            <p id="empty-list-text">Ainda não há contatos na sua agenda, <a href="<?=$BASE_URL?>create.php">clique aqui para adicionar contatos</a>.</p>
        <?php endif; ?>
</div>

<?php
    include_once("./templates/footer.php");
?>
