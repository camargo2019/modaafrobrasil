<?php 
//Gabriel CMR - Desenvolvimentos
// Plagio e Crime
session_start();
require __DIR__.'/../assets/php/autoload.php';

$info_autoload = $db->row('SELECT * FROM logs_informacoes_site LIMIT 1');
$url_atual = '//'.$_SERVER['SERVER_NAME'].$_SERVER["REQUEST_URI"];
?>
<html  lang="pt-BR">
    <head>
	    <base href="<?php echo $base ?>/painel">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="author" content="Gabriel Camargo (@camargo.2018)">
	    <meta name="developer" content="Gabriel Camargo (@camargo.2018)">
	    <title>Gerenciador | <?=$info_autoload->titulo_site;?></title>
	    <link rel="shortcut icon" href="<?=$info_autoload->url_favicon;?>" />
	    <script>var base="<?=$base;?>";</script>
	    <script src="https://code.jquery.com/jquery-3.5.1.min.js"  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
        <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
        <link href="<?=$base;?>/painel/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="<?=$base;?>/painel/assets/css/black-dashboard.css?v=1.0.0" rel="stylesheet" />
        <link href="<?=$base;?>/painel/assets/pn/pn.css" rel="stylesheet" />
        <script type="text/javascript">
        const Toast = Swal.mixin({
	        toast: true,
	        position: 'top-end',
	        showConfirmButton: false,
	        timer: 3000,
	        timerProgressBar: true,
	        onOpen: (toast) => {
	            toast.addEventListener('mouseenter', Swal.stopTimer)
	            toast.addEventListener('mouseleave', Swal.resumeTimer)
	        }
        });
        </script>
	</head>
    <body>

    <?php


    if($_SESSION['email'] && $_SESSION['senha'] == true){
      $verifica_login = $db->row('SELECT * FROM logs_usuario WHERE email="'.$_SESSION['email'].'" AND senha="'.$_SESSION['senha'].'"');
      if($verifica_login){
        include __DIR__.'/assets/pg/menu.painel.php';
          if($_GET['pg'] == "Home"){
            include __DIR__.'/assets/pg/home.painel.php';
          }elseif($_GET['pg'] == "Sair"){
            include __DIR__.'/assets/pg/sair.painel.php';
          }elseif($_GET['pg'] == "ConfigdoSite"){
            include __DIR__.'/assets/pg/configsite.painel.php';
          }elseif($_GET['pg'] == "MinhaConta"){
            include __DIR__.'/assets/pg/minhaconta.painel.php';
          }elseif($_GET['pg'] == "ImgDestaqueCat"){
            include __DIR__.'/assets/pg/imgdestaquecat.painel.php';
          }elseif($_GET['pg'] == "GerenciarAlertas"){
            include __DIR__.'/assets/pg/gerenciaralertas.painel.php';
          }elseif($_GET['pg'] == "GerenciarCategoria"){
            include __DIR__.'/assets/pg/gerenciarcategoria.painel.php';
          }elseif($_GET['pg'] == "GerenciarSlide"){
            include __DIR__.'/assets/pg/gerenciarslide.painel.php';
          }elseif($_GET['pg'] == "SobreGerenciar"){
            include __DIR__.'/assets/pg/sobregerenciar.painel.php';
          }elseif($_GET['pg'] == "GerenciarItemDestaque"){
            include __DIR__.'/assets/pg/gerenciaritemdestaque.painel.php';
          }elseif($_GET['pg'] == "GerenciarItens"){
            include __DIR__.'/assets/pg/gerenciaritens.painel.php';
          }else{
            include __DIR__.'/assets/pg/home.painel.php';
          }
        }else{
          include __DIR__.'/assets/pg/login.painel.php';
        }
      }else{
      include __DIR__.'/assets/pg/login.painel.php';
    }
    ?>
    






    <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Menu Cor</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        <li class="button-container">
          <a href="https://gabrielcmr.com.br" target="_blank" class="btn btn-primary btn-block btn-round">Suporte</a>
        </li>
      </ul>
    </div>
  </div>
  <script src="<?=$base;?>/painel/assets/js/core/jquery.min.js"></script>
  <script src="<?=$base;?>/painel/assets/js/core/popper.min.js"></script>
  <script src="<?=$base;?>/painel/assets/js/core/bootstrap.min.js"></script>
  <script src="<?=$base;?>/painel/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?=$base;?>/painel/assets/js/plugins/chartjs.min.js"></script>
  <script src="<?=$base;?>/painel/assets/js/plugins/bootstrap-notify.js"></script>
  <script src="<?=$base;?>/painel/assets/js/black-dashboard.min.js?v=1.0.0"></script>
  <script src="<?=$base;?>/painel/assets/pn/pn.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini desativado...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini ativado...');
          }
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
        <script>
        $(document).ready(function() {
            pn.initDashboardPageCharts();
        });
        </script>
        <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
        <script>
        window.TrackJS &&
            TrackJS.install({
                token: "ee6fab19c5a04ac1a32a645abde4613a",
                application: "black-dashboard-free"
            });
        </script>
    </body>

</html>