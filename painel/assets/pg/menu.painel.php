<div class="wrapper">
    <div class="sidebar">
      <div class="sidebar-wrapper">
        <div class="logo">
          <a href="<?=$base;?>/painel/Home" class="simple-text logo-mini">
            NG
          </a>
          <a href="<?=$base;?>/painel/Home" class="simple-text logo-normal">
          NEGRX1
          </a>
        </div>
        <ul class="nav">

          <li class="">
            <a href="<?=$base;?>/painel/ConfigdoSite">
              <i class="tim-icons icon-settings"></i>
              <p>Configurações do Site</p>
            </a>
          </li>


          <li class="">
            <a href="<?=$base;?>/painel/GerenciarSlide">
              <i class="tim-icons icon-palette"></i>
              <p>Gerenciar Slide (Principal)</p>
            </a>
          </li>
          
          <li class="">
            <a href="<?=$base;?>/painel/GerenciarAlertas">
              <i class="tim-icons icon-bullet-list-67"></i>
              <p>Gerenciar Alertas</p>
            </a>
          </li>

          <li class="">
            <a href="<?=$base;?>/painel/GerenciarCategoria">
              <i class="tim-icons icon-components"></i>
              <p>Gerenciar Categoria</p>
            </a>
          </li>

          <li class="">
            <a href="<?=$base;?>/painel/ImgDestaqueCat">
              <i class="tim-icons icon-pencil"></i>
              <p>Imagem Destaque Categoria</p>
            </a>
          </li>

          <li>
            <a href="<?=$base;?>/painel/GerenciarItemDestaque">
              <i class="tim-icons icon-tag"></i>
              <p>Gerenciar Item Destaque</p>
            </a>
          </li>

          
          <li>
            <a href="<?=$base;?>/painel/GerenciarItens">
              <i class="tim-icons icon-paper"></i>
              <p>Gerenciar Itens</p>
            </a>
          </li>


          <li>
            <a href="<?=$base;?>/painel/SobreGerenciar">
              <i class="tim-icons icon-trophy"></i>
              <p>Gerenciar Sobre</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle d-inline">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
              <li class="dropdown nav-item">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                  <div class="photo">
                    <img src="<?=$base;?>/painel/assets/img/anime3.png" alt="Profile Photo">
                  </div>
                  <b class="caret d-none d-lg-block d-xl-block"></b>
                  <p class="d-lg-none">
                    Log out
                  </p>
                </a>
                <ul class="dropdown-menu dropdown-navbar">
                  <li class="nav-link"><a href="<?=$base;?>/painel/MinhaConta" class="nav-item dropdown-item">Minha Conta</a></li>
                  <li class="nav-link"><a href="<?=$base;?>/painel/Sair" class="nav-item dropdown-item">Sair</a></li>
                </ul>
              </li>
              <li class="separator d-lg-none"></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="modal modal-search fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="searchModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="SEARCH">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
      </div>