<form action="{$URL}/user/register" method="post">

    <div class="form-control">
        <p>Nombre</p>
        <input type="text" name="names" placeholder="Nombre">
    </div>

    <div class="form-control">
        <p>Email</p>
        <input type="mail" name="email" placeholder="Email">
    </div>

    <div class="form-control">
        <p>País</p>
        <select name="country">
            {foreach from=$countries item=$country }
                <option value="{$country->name}">{$country->name}</option>
            {/foreach}}
        </select>
    </div>

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