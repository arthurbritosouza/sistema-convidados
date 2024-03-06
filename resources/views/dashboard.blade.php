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
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">

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

    /* Estilo da tabela */
    table {
        margin-left: 270px; /* Largura do menu lateral + 20px de margem */
        width: calc(100% - 270px); /* Largura da tabela ajustada para ocupar o espaço restante */
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>

<!-- Menu lateral -->
<div class="sidebar">
    <a href="#" class="modal-btn"><i class="fas fa-plus" title="Cadastrar Reserva Cliente"></i></a>
    @foreach($reserva_cliente as $reserva)
    <div style="display: flex; align-items: center;">
    <a href="/lista_convidados/{{$reserva->id}}" class="menu-item">{{$reserva->nome_reserva}}</a>
    <a id="copyButton" style="color: white; cursor: pointer;" value="http://127.0.0.1:8000/convite/{{$reserva->id}}" onclick="copyValue()" title="Compartilhar convite">
    <i class="bi bi-link-45deg"></i>
    <a href="/apagar_reserva/{{$reserva->id}}" style="color: white; cursor: pointer;" title="Deletar">
    <i class="bi bi-trash"></i></a>
</a>
    </div>
    @endforeach
</div>


<script>
    function copyValue() {
        // Seleciona o elemento com id "copyButton"
        var copyText = document.getElementById("copyButton");
        
        // Copia o valor do atributo "value" do elemento
        var valueToCopy = copyText.getAttribute("value");

        // Cria um input auxiliar para copiar o texto
        var tempInput = document.createElement("input");
        tempInput.setAttribute("value", valueToCopy);
        document.body.appendChild(tempInput);

        // Seleciona e copia o texto do input auxiliar
        tempInput.select();
        document.execCommand("copy");

        // Remove o input auxiliar
        document.body.removeChild(tempInput);

        // Feedback opcional (pode ser removido se não for necessário)
        alert("Valor copiado para a área de transferência: " + valueToCopy);
    }
</script>

<!-- Conteúdo principal -->
<div class="content">
    <!-- Tabela -->
    <!-- Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <a href="#" class="close-btn">&times;</a>
            <form method="POST" action="/reserva_form">
      @csrf
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nome-local" class="form-control-label">Nome do Local:</label>
            <input id="nome-local" class="form-control" type="text" placeholder="Nome do Local" name="nome_local">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="local" class="form-control-label">Local:</label>
            <input id="local" class="form-control" type="text" placeholder="Local" name="local">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="nome-reserva" class="form-control-label">Nome da Reserva:</label>
            <input id="nome-reserva" class="form-control" type="text" placeholder="Nome da Reserva" name="nome_reserva">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="dia-hora" class="form-control-label">Dia e Hora:</label>
            <input id="dia-hora" class="form-control" type="text" placeholder="Dia e Hora" name="dia_hora">
          </div>
        </div>
      </div>
      <button class="btn bg-gradient-dark btn-sm float-start me-3" type="submit">Enviar</button>
    </form>
        </div>
    </div>
</div>

<script>
    const menuItems = document.querySelectorAll('.menu-item');
    
    menuItems.forEach(item => {
        item.addEventListener('click', function() {
            menuItems.forEach(item => {
                item.classList.remove('selected');
            });
            this.classList.add('selected');
        });
    });

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
