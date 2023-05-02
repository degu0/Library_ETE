<title>Library - Tabelas pessoas</title>
<?php require __DIR__ . "/../share/head.php"; ?>
<link rel="stylesheet" href="/librares/css/table.css">

<main>
    <h1>Tabela de funcionários</h1>
    <div id="classification_people">
        <a href="/tabela/aluno">Alunos</a>
        <a href="/tabela/funcionario">Funcionários</a>
    </div>
    <div id="containerTable">
        <table>
            <thead>
                <td scope="col">Nome</td>
                <td scope="col">Oficio</td>
                <td scope="col">Configurações</td>
            </thead>
            <tbody>
                <?php foreach ($listPeople as $people) { ?>
                    <tr>
                        <td><?php echo $people->getName(); ?></td>
                        <td><?php echo $people->getTrade(); ?></td>
                        <td>
                            <?php echo "<a href='/tabela/funcionario/edit?id=" . $people->getId() . "'>EDIT</a>"; ?>
                            <?php echo "<a href='/tabela/funcionario/delete?id=" . $people->getId() . "'>DELETE</a>"; ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</main>
<?php require __DIR__ . "/../share/footer.php"; ?>