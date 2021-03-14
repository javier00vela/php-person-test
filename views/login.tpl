<h1>Login</h1>

   <div class="alert alert-danger">
        <ul>
            {if isset($errorsLogin)}
                {foreach from=$errorsLogin item=$err }
                    <li>{$err['message']}</li>
                {/foreach}
            {/if}
        </ul>
    </div>


<form action="{$URL}/user/auth" method="post">
    <div class="form-control">
        <p>Documento</p>
        <input type="text" name="document" placeholder="documento">
    </div>

    <div class="form-control">
        <p>Contraseña</p>
        <input type="password" name="password" placeholder="Contraseña">
    </div>
    
    <div class="form-control">
        <button type="submit">Enviar</button>
    </div>
    
</form>