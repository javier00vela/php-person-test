<div class="container">
    <h1>Registro Usuario</h1>

    <form action="{$URL}/user/register" method="post">
        {if !empty($errorsRegister) && $sended}
            <div class="alert alert-danger">
                <h3 class="text-center">Errores:</h3>
                <ul>
                    {foreach from=$errorsRegister item=$err }
                        <li>{$err['message']}</li>
                    {/foreach}
                </ul>
            </div>
        {/if}

        <div class="form-group">
            <p>Nombres</p>
            <input type="text" class="form-control" name="first_name" placeholder="Nombre">
        </div>

        <div class="form-group">
            <p>Apellidos</p>
            <input type="text" class="form-control" name="last_name" placeholder="Apellido">
        </div>

        <div class="form-group">
            <p>Teléfono</p>
            <input type="text" class="form-control" name="phone_number" placeholder="Teléfono">
        </div>

        <div class="form-group">
            <p>Email</p>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>

        <div class="form-group">
            <p>Puesto</p>
            <input type="text" class="form-control" name="job_title" placeholder="Puesto">
        </div>

        <div class="form-group">
            <p>País</p>
            <select class="form-control" name="country">
                {foreach from=$countries item=$country }
                    <option value="{$country->name}">{$country->name}</option>
                {/foreach}}
            </select>
        </div>

        <div class="form-group">
            <p>Estado</p>
            <input type="text" class="form-control" name="state" placeholder="Estado">
        </div>

        <div class="form-group">
            <p>Ciudad</p>
            <input type="text" class="form-control" name="city" placeholder="Ciudad">
        </div>

        <div class="form-group">
            <p>Documento</p>
            <input type="text" class="form-control" name="document" placeholder="Documento">
        </div>

        <div class="form-group">
            <p>Contraseña</p>
            <input type="password" class="form-control" name="password" placeholder="Contraseña">
        </div>

        <div class="form-group">
            <button class="btn btn-success" type="submit">Enviar</button>
        </div>

        <div class="text-center">
            <a class="text-center" href="{$URL}/user/login">Ir al login</a>
        </div>
    </form>
</div>