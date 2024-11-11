<?php

    include_once "Controller/LivroController.php";

    $controller = new LivroController();
    $controller->index();

    if(isset($_POST['editar'])) {
        $id = $_POST['id'];
        $isbn = $_POST['isbn'];
        $titulo = $_POST['titulo'];
        $ap = $_POST['ap'];
        $pv = $_POST['pv'];
        $id_editora = $_POST['id_editora'];
        $controller->alterar($id, $isbn, $titulo, $ap, $pv, $id_editora);
        header("Location: ?pagina=livro");
    }

    if(isset($_GET['delete'])) {
        $controller->excluir($_GET['delete']);
        header("Location: ?pagina=livro");
    }
    $edit = null;
    if(isset($_GET['edit'])) {
        $edit = $_GET['edit'];
    }

?>
<body>
    <h1>Tabela de Livros</h1>
    <table id="livroTable" data-livros= '<?php var_dump($controller->listarTodos())?>'>
        <thead>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Título</th>
                <th>Ano de Publicação</th>
                <th>Preço de Venda</th>
                <th>ID Editora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $value = $controller->listarTodos();
                for ($i = 0; $i < 20; $i++) {
                    echo "<tr>";
                    echo "<td>".$value[$i]['id_livro']."</td>";
                    echo "<td>".$value[$i]['isbn']."</td>";
                    echo "<td>".$value[$i]['titulo']."</td>";
                    echo "<td>".$value[$i]['ano_publicacao']."</td>";
                    echo "<td>".$value[$i]['preco_venda']."</td>";
                    echo "<td>".$value[$i]['id_editora']."</td>";
                    echo "<td>
                            <a href='?pagina=livro&edit=$i'>
                                <button id='edit$i'>Editar</button>
                            </a>
                            <a href='?pagina=livro&delete=".$value[$i]['id_livro']."'>
                                <button id='delete$i'>Excluir</button>
                            </a>
                        </td>";
                }
                

            ?>
        </tbody>
    </table>

    <div class="form-container">
        <h3>Adicionar / Editar Livro</h3>
        <form id="livroForm" action="" method="post">
            <label for="id">ID: </label>
            <input type="number" name="id" id="id" required value="<?php echo ($edit != null ? $value[$edit]['id_livro']:null); ?>"><br><br>
            <label for="isbn">ISBN: </label>
            <input type="text" name="isbn" id="isbn" required value="<?php echo ($edit != null ? $value[$edit]['isbn']:null); ?>"><br><br>
            <label for="titulo">Título: </label>
            <input type="text" name="titulo" id="titulo" required value="<?php echo ($edit != null ? $value[$edit]['titulo']:null); ?>"><br><br>
            <label for="ano">Ano de Publicação: </label>
            <input type="number" name="ap" id="ano" required value="<?php echo ($edit != null ? $value[$edit]['ano_publicacao']:null); ?>"><br><br>
            <label for="preco">Preço de Venda: </label>
            <input type="text" name="pv" id="preco" required value="<?php echo ($edit != null ? $value[$edit]['preco_venda']:null); ?>"><br><br>
            <label for="editora">ID Editora: </label>
            <input type="number" name="id_editora" id="editora" required value="<?php echo ($edit != null ? $value[$edit]['id_editora']:null); ?>"><br><br>
            <button type="submit">Adicionar Livro</button>
            <button type="submit" name="editar">Editar Livro</button>
        </form>
    </div>

    <script>
        
    </script>
</body>
</html>
