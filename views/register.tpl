<h1>Registro Usuario</h1>

<form action="{$URL}/user/register" method="post">

    <div class="form-control">
        <ul>
            {if isset($errorsRegister)}
                {foreach from=$errorsRegister item=$err }
                    <li>{$err['message']}</li>
                {/foreach}
            {/if}
        </ul>
    </div>

    <div class="form-control">
        <p>Nombre</p>
        <input type="text" name="name" placeholder="Nombre">
    </div>

    <div class="form-control">
        <p>Apellido</p>
        <input type="text" name="last_name" placeholder="Apellido">
    </div>

    <div class="form-control">
        <p>Teléfono</p>
        <input type="text" name="phone_number" placeholder="Teléfono">
    </div>

    <div class="form-control">
        <p>Email</p>
        <input type="email" name="email" placeholder="Email">
    </div>

    <div class="form-control">
        <p>Puesto</p>
        <input type="text" name="job_title" placeholder="Puesto">
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
        <p>Estado</p>
        <input type="text" name="state" placeholder="Estado">
    </div>

    <div class="form-control">
        <p>Ciudad</p>
        <input type="text" name="city" placeholder="Ciudad">
    </div>

    <div class="form-control">
        <p>Documento</p>
        <input type="text" name="document" placeholder="Documento">
    </div>

    <div class="form-control">
        <p>Contraseña</p>
        <input type="password" name="password" placeholder="Contraseña">
    </div>

    <div class="form-control">
        <button type="submit">Enviar</button>
    </div>

</form>