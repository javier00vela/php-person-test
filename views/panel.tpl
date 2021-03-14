<h1 class="text-center">Tabla de personas</h1>
<div class="table-responsive">
    <div class="form-group">
        <form action="{$URL}/person/panel" method="POST">
            <input type="text" name="_param" class="form-control" placeholder="buscar">
            <button class="btn btn-success">Buscar</button>
            <div class="text-center">
                <a href="{$URL}/person/panel" class="btn">Retornar Busqueda</a>
            </div>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>Email</td>
                    <td>Teléfono</td>
                    <td>Documento</td>
                    <td>Puesto</td>
                    <td>País</td>
                    <td>Estado</td>
                    <td>Ciudad</td>
                </tr>
            </thead>
            <tbody>
                {foreach from=$listPerson item=$person}
                    <tr>
                        <td>{$person->first_name}</td>
                        <td>{$person->last_name}</td>
                        <td>{$person->email}</td>
                        <td>{$person->phone_number}</td>
                        <td>{$person->document}</td>
                        <td>{$person->job_title}</td>
                        <td>{$person->country}</td>
                        <td>{$person->state}</td>
                        <td>{$person->city}</td>
                    </tr>
                {/foreach}
            </tbody>
        </table>
    </div>
</div>