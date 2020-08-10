-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Ago-2020 às 05:12
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `modaafrobrasil`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_alertas`
--

CREATE TABLE `logs_alertas` (
  `id` int(11) NOT NULL,
  `informativo` text NOT NULL,
  `mensagem` text NOT NULL,
  `tipo_mensagem` set('alert-info','alert-success','alert-warning','alert-danger','alert-primary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_alertas`
--

INSERT INTO `logs_alertas` (`id`, `informativo`, `mensagem`, `tipo_mensagem`) VALUES
(2, 'Aten&ccedil;&atilde;o', 'Caso tiver algum erro informar a sac@camargohost.org!', 'alert-warning'),
(4, 'Atenção', 'Painel ainda não foi concluido 100%', 'alert-info');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_categoria`
--

CREATE TABLE `logs_categoria` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `nome_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_categoria`
--

INSERT INTO `logs_categoria` (`id`, `nome`, `nome_url`) VALUES
(1, 'Produtos', 'all_produtos'),
(2, 'Cursos', 'cursos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_imagem_cat`
--

CREATE TABLE `logs_imagem_cat` (
  `id` int(11) NOT NULL,
  `imagem` text NOT NULL,
  `imagem_mobile` text NOT NULL,
  `nome_imagem` text NOT NULL,
  `descricao_imagem` text NOT NULL,
  `link_imagem` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_imagem_cat`
--

INSERT INTO `logs_imagem_cat` (`id`, `imagem`, `imagem_mobile`, `nome_imagem`, `descricao_imagem`, `link_imagem`, `id_categoria`) VALUES
(1, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup.jpg', 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_m.jpg', 'Apenas um teste de Categoria', 'Descricao de um teste de Categoria', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 1),
(3, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup.jpg', 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_m.jpg', 'Apenas um teste de Categoria', 'Descricao de um teste de Categoria', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_informacoes_site`
--

CREATE TABLE `logs_informacoes_site` (
  `id` int(11) NOT NULL,
  `titulo_site` text NOT NULL,
  `description_site` text NOT NULL,
  `keywords` text NOT NULL,
  `url_imagem_logo` text NOT NULL,
  `url_favicon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_informacoes_site`
--

INSERT INTO `logs_informacoes_site` (`id`, `titulo_site`, `description_site`, `keywords`, `url_imagem_logo`, `url_favicon`) VALUES
(1, 'Negrx1 - Moda Afro Brasil', 'Nós selecionamos produtos de beleza e cuidados exclusivos para pele Negra, limpos e não tóxicos seguindo os mais altos padrões de qualidade. #negrx1', 'Nós selecionamos produtos de beleza e cuidados exclusivos para pele Negra, limpos e não tóxicos seguindo os mais altos padrões de qualidade. #negrx1', 'http://localhost:8080/modaafrobrasil/assets/img/logo.png', '/modaafrobrasil/favicon.ico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_item_destaque_categoria`
--

CREATE TABLE `logs_item_destaque_categoria` (
  `id` int(11) NOT NULL,
  `item_imagem` text NOT NULL,
  `item_nome` text NOT NULL,
  `item_descricao` text NOT NULL,
  `link` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_item_destaque_categoria`
--

INSERT INTO `logs_item_destaque_categoria` (`id`, `item_imagem`, `item_nome`, `item_descricao`, `link`, `id_categoria`) VALUES
(1, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE 1', 'Volume nude bálsamo e brilhopara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 1),
(2, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE', 'Volume nude bálsamo e brilho\r\npara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 1),
(3, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE', 'Volume nude bálsamo e brilho\r\npara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 1),
(4, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE', 'Volume nude bálsamo e brilho\r\npara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 2),
(5, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE', 'Volume nude bálsamo e brilho\r\npara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 2),
(6, 'https://www.hera.com/int/en/products/makeup/__icsFiles/afieldfile/2020/01/03/makeup_bestseller.png', 'NEW & ISSUE', 'Volume nude bálsamo e brilho\r\npara lábios naturalmente sensuais e ousados', 'http://localhost:8080/modaafrobrasil/produtos/cat/all_produtos', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_itens`
--

CREATE TABLE `logs_itens` (
  `id` int(11) NOT NULL,
  `imagem_item` text NOT NULL,
  `nome_item` text NOT NULL,
  `descricao_item` text NOT NULL,
  `tamanho_item` text NOT NULL,
  `link_item` text NOT NULL,
  `nome_url` text NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_itens`
--

INSERT INTO `logs_itens` (`id`, `imagem_item`, `nome_item`, `descricao_item`, `tamanho_item`, `link_item`, `nome_url`, `id_categoria`) VALUES
(1, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-1', 1),
(2, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-2', 1),
(3, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-3', 1),
(4, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-4', 1),
(5, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-5', 1),
(6, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-6', 1),
(7, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-7', 1),
(8, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-8', 1),
(9, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-9', 2),
(10, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-10', 2),
(11, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-11', 2),
(12, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-12', 2),
(13, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-13', 2),
(14, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-14', 2),
(15, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-15', 2),
(16, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. ', '3.5g', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'teste-16', 2),
(17, 'https://www.hera.com/int/en/products/__icsFiles/afieldfile/2020/04/16/20200413_sensualspicy-nudevolumematte_pdp_thumb_412_mo_1.png', 'SENSUAL SPICY NUDE VOLUME MATTE', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', '', 'https://www.hera.com/int/en/products/sensual-spicy-nude-volume-matte.html', 'sensual-spicy-nude-volume-matte1595880362', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_redessocial`
--

CREATE TABLE `logs_redessocial` (
  `id` int(11) NOT NULL,
  `facebook` text NOT NULL,
  `instagram` text NOT NULL,
  `tiktok` text NOT NULL,
  `email` text NOT NULL,
  `whatsapp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_redessocial`
--

INSERT INTO `logs_redessocial` (`id`, `facebook`, `instagram`, `tiktok`, `email`, `whatsapp`) VALUES
(1, 'https://www.instagram.com/negrx1/', 'negrx1', 'https://www.instagram.com/negrx1/', 'sac@camargohost.org', '(45) 9 8422-8904');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_slide`
--

CREATE TABLE `logs_slide` (
  `id` int(11) NOT NULL,
  `imagem` text NOT NULL,
  `titulo` text NOT NULL,
  `descricao` text NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_slide`
--

INSERT INTO `logs_slide` (`id`, `imagem`, `titulo`, `descricao`, `url`) VALUES
(1, 'http://localhost:8080/modaafrobrasil/uploads/20200513_black_main_kv_pc_01.jpg', 'Apenas um teste', 'informamos q isso e só um teste 2', 'http://localhost:8080/modaafrobrasil/'),
(2, 'http://localhost:8080/modaafrobrasil/uploads/20200513_sensual-spicy-nude-volume-matte_main_kv_pc_02.jpg', 'Apenas um teste', 'informamos q isso e só um teste 3', 'http://localhost:8080/modaafrobrasil/'),
(3, 'http://localhost:8080/modaafrobrasil/uploads/20200513_sensual-spicy-nude-volume-matte_main_kv_pc_02.jpg', 'Apenas um teste', 'informamos q isso e só um teste', 'http://localhost:8080/modaafrobrasil/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_sobre`
--

CREATE TABLE `logs_sobre` (
  `id` int(11) NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_sobre`
--

INSERT INTO `logs_sobre` (`id`, `texto`, `imagem`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pellentesque nec ligula ac accumsan. Fusce tincidunt dui eu nibh tempor tincidunt. Integer cursus cursus turpis, sit amet facilisis sapien condimentum id. Nulla ut elit eu lectus pulvinar iaculis vitae quis felis. Nulla quis vehicula diam. Sed leo nulla, dapibus sed vestibulum eget, malesuada nec leo. Aliquam quam tellus, vulputate nec malesuada eget, cursus nec lectus. Phasellus dictum, nibh at gravida porta, sem odio egestas sapien, eu vehicula justo eros ut ex. Curabitur eget velit dapibus, lobortis elit ut, tempus ipsum. Aliquam a ligula ultricies, placerat sem ac, placerat ipsum. Integer metus erat, ornare eget sapien id, efficitur ullamcorper dolor. Sed ut sapien urna. Praesent scelerisque nisi quis aliquet convallis. Morbi molestie arcu et pretium imperdiet. Sed lorem nisl, interdum laoreet lacus a, vestibulum euismod nulla. Duis luctus orci sit amet dolor vestibulum, sit amet gravida elit fringilla. Morbi posuere varius nisi id scelerisque. Integer bibendum diam eget turpis pulvinar scelerisque. Mauris fermentum ligula consectetur, consequat nisi non, sodales quam. Cras suscipit consequat erat, id dignissim nibh rutrum et. Etiam tellus risus, mollis nec lorem a, dictum efficitur lectus. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent massa urna, sagittis pulvinar ante et, auctor eleifend massa. Quisque ut congue magna, in pharetra leo.</p>\r\n', 'http://localhost:8080/modaafrobrasil/assets/img/logo.png???');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs_usuario`
--

CREATE TABLE `logs_usuario` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `email` text NOT NULL,
  `senha` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `logs_usuario`
--

INSERT INTO `logs_usuario` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Gabriel Camargo', 'Z2FicmllbGNtcjIwMTlAZ21haWwuY29t', 'MTEyMTI0MjQ=');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `logs_alertas`
--
ALTER TABLE `logs_alertas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_categoria`
--
ALTER TABLE `logs_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_imagem_cat`
--
ALTER TABLE `logs_imagem_cat`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_informacoes_site`
--
ALTER TABLE `logs_informacoes_site`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_item_destaque_categoria`
--
ALTER TABLE `logs_item_destaque_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_itens`
--
ALTER TABLE `logs_itens`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_redessocial`
--
ALTER TABLE `logs_redessocial`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_slide`
--
ALTER TABLE `logs_slide`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_sobre`
--
ALTER TABLE `logs_sobre`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs_usuario`
--
ALTER TABLE `logs_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `logs_alertas`
--
ALTER TABLE `logs_alertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `logs_categoria`
--
ALTER TABLE `logs_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `logs_imagem_cat`
--
ALTER TABLE `logs_imagem_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `logs_informacoes_site`
--
ALTER TABLE `logs_informacoes_site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logs_item_destaque_categoria`
--
ALTER TABLE `logs_item_destaque_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `logs_itens`
--
ALTER TABLE `logs_itens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `logs_redessocial`
--
ALTER TABLE `logs_redessocial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `logs_slide`
--
ALTER TABLE `logs_slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `logs_sobre`
--
ALTER TABLE `logs_sobre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `logs_usuario`
--
ALTER TABLE `logs_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
