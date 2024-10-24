<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Product</title>
</head>
<body
    style="
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
    "
>
    <h1>New Product</h1>

    <form action="{{ route('store.product') }}" method="POST"
        style="
            display:flex;
            flex-direction:column;
            width:200px;
        "
    >
        @csrf
        <label for="product_name_id">Nome do Porduto</label>
        <input type="text" id="product_name_id" name="product_name" required>

        <label for="product_code_id">Código do produto</label>
        <input type="text" id="product_code_id" name="product_code" required>

        <label for="product_quantity_id">Quantidade do produto</label>
        <small class="text-muted">Padrao: 0</small>
        <input type="text" id="product_quantity_id" name="product_quantity">

        <label for="product_obs_id">Obcervação sobre o produto</label>
        <input type="text" id="product_obs_id" name="product_obs">

        <button type="submit" >Enviar</button>

    </form>
</body>
</html>
