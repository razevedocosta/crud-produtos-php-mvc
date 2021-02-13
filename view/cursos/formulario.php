<?php require __DIR__ . '/../inicio-html.php'; ?>

<div class="container mt-4">

    <h4><?= $titulo; ?></h4>
    <hr>
    
    <form action="/salvar-curso<?= isset($curso) ? '?id= ' . $curso->getId() : ''; ?>" method="post">
        <div class="row mb-3">
            <label for="inputNome" class="col-sm-2 col-form-label">Nome do Curso</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputNome" name="nome"
                    value="<?= isset($curso) ? $curso->getDescricao() : ''; ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputCodigo" class="col-sm-2 col-form-label">Código de Barras</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputCodigo" name="codigo"
                       value="<?= $curso->getCodigoBarras(); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPrecoCompra" class="col-sm-2 col-form-label">Preço de Compra</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPrecoCompra" name="precoCompra"
                       value="<?= $curso->getPrecoCompra(); ?>">
            </div>
        </div>

        <div class="row mb-3">
            <label for="selectCategoria" class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
                <select class="form-select" id="selectCategoria" name="categoria" required>
                    <?php foreach ($listaCategoria as list($i, $categoria)): ?>
                        
                        <option value="<?php echo $i; ?>"
                            <?php if ($curso->getCategoria() == $i) { ?> 
                                selected 
                            <?php } ?>>
                            <?php echo $categoria; ?>
                        </option>

                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="/listar-cursos"><button type="button" class="btn btn-secondary">Cancelar</button></a>
            </div>
        </div>
    </form>

</div>

<?php require __DIR__ . '/../fim-html.php'; ?>