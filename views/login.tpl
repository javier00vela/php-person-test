<div class="container">
    <h1 class="text-center">Login</h1>

    {if !empty($errorsLogin)}
        <div class="alert alert-danger">
            <ul>
                {foreach from=$errorsLogin item=$err }
                    <li>{$err['message']}</li>
                {/foreach}
            </ul>
        </div>
    {/if}


    <form action="{$URL}/user/login" method="post">
        <div class="form-group">
            <p>Documento</p>
            <input type="text" class="form-control" name="document" placeholder="documento">
        </div>

        <div class="form-group">
            <p>Contraseña</p>
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Enviar</button>
        </div>

        <div class="text-center">
            <a class="text-center" href="{$URL}/user/register">Registrarme</a>
        </div>
    </form>
</div>