<?php
$titulo = 'Meu Perfil';
?>
<?php
include './../../components/head/head.php';
?>

<div class="page">
  <!-- navbar -->
  <?php
  include './../../components/nav/navBar.php';
  ?>


  <div class="content">

    <div class="profile-card">
      <span class="profile-fieldset-label">Informações Pessoais</span>
      <div class="avatar">
        <img src="https://img.freepik.com/fotos-premium/garota-feliz-segura-seu-amado-animal-de-estimacao-um-gato-britanico-escoces-vermelho-no-colo-e-acaricia-seu-pelo_121837-9908.jpg?semt=ais_hybrid&w=740&q=80" alt="Julia Rocha">
      </div>
      <div class="profile-info">
        <div class="info-row">
          <span class="info-label">Nome:</span>
          <span class="info-val">Julia Rocha</span>
        </div>
        <div class="info-row">
          <span class="info-label">Telefone:</span>
          <span class="info-val">(67) 91876542</span>
        </div>
        <div class="info-row">
          <span class="info-label">E-mail:</span>
          <span class="info-val">exemplo@gmail.com</span>
        </div>
      </div>
      <span class="edit-icon">✏️</span>
    </div>

    <div class="tabs-row">
      <button class="tab active" onclick="switchTab('notif', this)">Notificações</button>
      <button class="tab" onclick="switchTab('adocao', this)">Adoção</button>
      <button class="tab" onclick="switchTab('doacao', this)">Doação</button>
    </div>

    <div id="notif" class="tab-panel active">
      <div class="list-card">
        <div class="list-item">
          <span class="item-tag">Aprovação</span>
          <span class="item-text">É com grande alegria que informamos que seu pedido para adoção...</span>
        </div>
        <div class="list-item">
          <span class="item-tag">Aprovação</span>
          <span class="item-text">É com grande alegria que informamos que seu pedido para adoção...</span>
        </div>
      </div>
    </div>

    <div id="adocao" class="tab-panel">
      <div class="list-card">
        <div class="list-item">
          <span class="item-tag">Pedido</span>
          <span class="item-text">Seu pedido de adoção está em análise...</span>
        </div>
      </div>
    </div>

    <div id="doacao" class="tab-panel">
      <div class="list-card">
        <div class="list-item">
          <span class="item-tag">Doação</span>
          <span class="item-text">Obrigado por sua contribuição para os animais...</span>
        </div>
      </div>
    </div>

  </div>
</div>

<script>
  function switchTab(id, btn) {
    document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
    document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
    document.getElementById(id).classList.add('active');
    btn.classList.add('active');
  }
</script>

</body>

</html>