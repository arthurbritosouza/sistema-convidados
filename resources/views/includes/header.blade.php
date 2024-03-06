@php
use App\Models\Reserva_cliente;

$reserva_cliente = App\Models\Reserva_cliente::all();

@endphp


<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    /* Estilo do menu lateral */
    .sidebar {
        height: 100%;
        width: 250px;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #333;
        padding-top: 20px;
    }
    
    /* Estilo dos itens do menu */
    .sidebar a {
        padding: 10px 15px;
        text-decoration: none;
        font-size: 18px;
        color: #fff;
        display: block;
    }
    
    /* Estilo dos itens do menu quando hover */
    .sidebar a:hover {
        background-color: #555;
    }
    
    /* Estilo do conteúdo principal */
    .content {
        margin-left: 250px;
        padding: 20px;
    }
    
    /* Estilo para item selecionado */
    .selected {
        background-color: #555;
    }

    /* Estilo do modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0,0,0,0.5);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 15% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    .close-btn {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close-btn:hover,
    .close-btn:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }
</style>
</head>
<body>

<!-- Menu lateral -->
<div class="sidebar">
    <a href="#" class="modal-btn"><i class="fas fa-plus" title="Cadastrar Reserva Cliente"></i></a>
    @foreach($reserva_cliente as $reserva)
    <a href="#" class="menu-item">{{$reserva->nome_reserva}}</a>
    @endforeach
</div>

<!-- Conteúdo principal -->
<div class="content">
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close-btn">&times;</a>
            <form method="POST" action="/reserva_form">
                @csrf
                <!-- Campos do formulário -->
                <button class="btn bg-gradient-dark btn-sm float-start me-3" type="submit">Enviar</button>
            </form>
        </div>
    </div>
</div>


<script>
    // JavaScript para adicionar classe 'selected' ao item do menu selecionado
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuItems.forEach(item => {
                item.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });

    // JavaScript para abrir e fechar o modal
    const modal = document.getElementById('modal');
    const modalBtn = document.querySelector('.modal-btn');
    const closeBtn = document.querySelector('.close-btn');

    modalBtn.addEventListener('click', openModal);
    closeBtn.addEventListener('click', closeModal);

    function openModal() {
        modal.style.display = 'block';
    }

    function closeModal() {
        modal.style.display = 'none';
    }
</script>

</body>
</html>
