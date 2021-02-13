<?php include __DIR__ . '/../inicio-html.php'; ?>

<div class="container d-flex justify-content-center align-items-center boxLogin">

    <div class="card cardLogin" style="width:26rem;">
        <div class="card-body">
            <h5 class="card-title">LOGIN</h5>
            <h6 class="card-subtitle mb-2 text-muted">CRUD Produtos</h6>

            <p class="card-text">

            <form action="/realiza-login" method="post">
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>

                <div class="form-group mt-2">
                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" class="form-control" required>
                </div>

                <div class="d-grid gap-2 mt-3">
                    <button class="btn btn-primary" type="submit">Entrar</button>
                </div>
            </form>

            </p>

            <!-- mensagem de alerta -->
            <?php if (isset($_SESSION['mensagem'])) : ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensagem']; ?>">
                <?= $_SESSION['mensagem']; ?>
            </div>

            <?php 
                unset($_SESSION['mensagem']);
                unset($_SESSION['tipo_mensagem']);
                endif; 
            ?>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../fim-html.php'; ?>