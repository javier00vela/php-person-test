<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{$URL}/src/css/_general.css" rel="stylesheet" type="text/css">
    <title>Aplicación de persona</title>
</head>
<header>
    <div>
        <h1>Aplicación de personas </h1>
        <div>
            {if isset($SESSION["userAuth"])}
                <form action="{$URL}/user/logout">
                    <div class="logout">
                        <button type="submit">Salir</button>
                    </div>
                </form>
            {/if}
</header>