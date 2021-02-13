<?php include __DIR__ . '/../inicio-html.php'; ?>

<div class="container mt-4">
    <h4>Produtos</h4>

    <form class="row row-cols-lg-auto g-3 align-items-center d-flex justify-content-between"
          action="/salvar-curso" method="post">
        <div class="col-12">
            <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome do produto" required>
        </div>

        <div class="col-12">
            <input type="text" class="form-control" id="inputCodigo" name="codigo" placeholder="Código de Barras" required>
        </div>

        <div class="col-12">
            <input type="number" step="0.01" min="0.01" class="form-control" id="inputPrecoCompra" name="precoCompra" placeholder="Preço de Compra" required>
        </div>

        <div class="col-12">
            <select class="form-select" id="inlineFormSelectCat" name="categoria" required>
                <option selected>Categoria...</option>
                <?php foreach ($listaCategoria as list($i, $categoria)): ?>
                    <option value="<?php echo $i; ?>"><?php echo $categoria; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="reset" class="btn btn-secondary">Cancelar</button>
        </div>
    </form>

    <hr>
</div>

<div class="container mt-5">

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Código de Barras</th>
                    <th scope="col">Preço de Compra</th>
                    <th scope="col">Preço de Venda</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; foreach ($cursos as $curso): ?>
    
                <tr>
                    <th scope="row"><?= $i++; ?></th>
                    <td><?= $curso->getDescricao(); ?></td>
                    <td><?= $curso->getCodigoBarras(); ?></td>
                    <td><?= $curso->getPrecoCompra(); ?></td>
                    <td><?= $curso->getPrecoVenda(); ?></td>
                    <td><?= $curso->selecionaCategoria($curso->getCategoria()); ?></td>
                    <td>
                        <a href="/alterar-curso?id=<?= $curso->getId(); ?>" class="btn btn-sm" title="Editar">
                            <span class="badge bg-primary">
                                <i class="bi bi-pencil-fill"></i>
                            </span>
                        </a>
                    </td>
                    <td>
                        <a href="/excluir-curso?id=<?= $curso->getId(); ?>" class="btn btn-sm" title="Excluir">
                            <span class="badge bg-danger">
                                <i class="bi bi-x-circle-fill"></i>
                            </span>
                        </a>
                    </td>
                </tr>

            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../fim-html.php'; ?>