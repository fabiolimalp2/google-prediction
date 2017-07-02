-- phpMyAdmin SQL Dump
-- version 4.6.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 02-Jul-2017 às 16:00
-- Versão do servidor: 5.7.12
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `at02_fabiolima`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('sri6g6ns65d352ji0g3ui6ro8j9s022c', '192.168.1.12', 1498532220, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533313936303b),
('jp8sn1f9ipbh9rqfp3lauuh9rcdhs2bg', '192.168.1.12', 1498532583, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533323335323b),
('fg1tuot8pnc5hh1953sdpugv550ggdhm', '192.168.1.12', 1498533008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533323738333b),
('srdcaerojkgrae12jcqd2egqp13g17kv', '192.168.1.12', 1498533130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533333130343b),
('08h5e4f7adc50b9kehvb20r4qi0cr3e1', '192.168.1.12', 1498533683, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533333432353b),
('o602g541bdbittnu0a88ph1u316j31kt', '192.168.1.12', 1498533931, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533333732393b),
('v13hh91qsnc55geqeshpr1p69s1sa9rn', '192.168.1.12', 1498534359, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533343036363b),
('i9lm4l7hiqfdi90i65i835vp0126s3mv', '192.168.1.12', 1498534402, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439383533343336383b),
('a12tpjiuqv9vrt0l9h11kat8psa4qv30', '192.168.249.129', 1499008239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393030383230363b),
('dkpfj5sp6anpasufj9f248fka2rgifnv', '192.168.249.129', 1499008970, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393030383735303b),
('5b7ecc2vajtfgcus19uko03503h99l1i', '192.168.249.129', 1499009269, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393030393131323b),
('nrmjdtn9h4gqfkr7doe5g9s210tn8dha', '192.168.249.129', 1499010984, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393031303733383b),
('e9e8p032c0eon49tsqrh1k2h59akbb65', '192.168.249.129', 1499011200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313439393031313036363b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_file`
--

CREATE TABLE `model_file` (
  `id` int(4) NOT NULL,
  `name` varchar(30) NOT NULL,
  `file` text NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `model_file`
--

INSERT INTO `model_file` (`id`, `name`, `file`, `data`) VALUES
(5, 'language_id', 'uploads/', '2017-07-01 22:39:56'),
(6, 'language_id', 'uploads/', '2017-07-01 22:40:34'),
(7, 'language_id', 'uploads/', '2017-07-01 22:40:52'),
(8, 'language_id', 'uploads/', '2017-07-01 22:41:12'),
(9, 'language_id', 'uploads/', '2017-07-01 22:42:00'),
(10, 'language_id', 'uploads/', '2017-07-01 22:42:57'),
(11, 'language_id', 'uploads/', '2017-07-01 22:43:21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `model_info`
--

CREATE TABLE `model_info` (
  `id` int(10) NOT NULL,
  `model_id` varchar(50) NOT NULL,
  `model_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `model_info`
--

INSERT INTO `model_info` (`id`, `model_id`, `model_description`) VALUES
(1, 'sample.languageid', '<h3>Identificador de linguagem (DEMO)</h3>\r\n<ul>\r\n  <li>Analisa uma frase e determina se está em Inglês, Espanhol ou Frances .</li>\r\n  <li>Formato da pesquisa: Data em uma única coluna de texto. </li>\r\n  <li>Formato da resposta: Categorias do modelo, as categorias são &quot;Inglês&quot;, &quot;Espanhol&quot; e &quot;Frances&quot;.</li>\r\n  <li>Access URL: https://www.googleapis.com/prediction/v1.6/projects/414649711441/hostedmodels/sample.languageid/predict</li>\r\n  <li>Url utilizada para acessar o modelo hospedado.</li>\r\n  <li>Não há custo para utilização desse modelo</li>\r\n  <li>Desenvolvido pelo: Google Prediction API team</li>\r\n</ul>'),
(2, 'sample.tagger', '<h3>Classifica comentario em categorias (DEMO)</h3>\r\n<ul>\r\n  <li>Modelo classifica comentarios como relacionados ao android, appengine, chrome ou youtube. Dados de treino provem de comentarios de redes sociais.</li>\r\n  <li>Formato de pesquisa: Uma única coluna de texto </li>\r\n  <li>Formato da resposta: Categorias do modelo, as categorias são &quot;#android&quot;, &quot;#appengine&quot;, &quot;#chrome&quot; .</li>\r\n  <li>Access URL: https://www.googleapis.com/prediction/v1.6/projects/414649711441/hostedmodels/sample.tagger/predict</li>\r\n  <li>Url utilizada para acessar o modelo hospedado.</li>\r\n  <li>Não há custo para utilização desse modelo</li>\r\n  <li>Desenvolvido pelo: Google Prediction API team</li>\r\n</ul>'),
(3, 'sample.sentiment', '<h3>Detecta Sentimento (DEMO)</h3>\r\n<ul>\r\n  <li>Analisa o sentimento de um pequeno trecho de texto em inglês, em Positivo, Negativo e Neutro.</li>\r\n  <li>Formato da pesquisa: Uma única coluna de texto. </li>\r\n  <li>Formato da resposta: Categorias do modelo, as categorias são &quot;positive&quot;, &quot;negative&quot;, &quot;neutral&quot;.</li>\r\n  <li>Access URL: https://www.googleapis.com/prediction/v1.6/projects/414649711441/hostedmodels/sample.sentiment/predict</li>\r\n  <li>Url utilizada para acessar o modelo hospedado.</li>\r\n  <li>Não há custo para utilização desse modelo</li>\r\n  <li>Desenvolvido pelo: Google Prediction API team </li>\r\n</ul>'),
(4, 'wise-coyote-model', '<h3>Identificador de linguagem (Modificado)</h3>\r\n<ul>\r\n  <li>Analisa uma frase e determina se está em Inglês, Espanhol, Frances ou Portugues.</li>\r\n  <li>Formato da pesquisa: Uma única coluna de texto. </li>\r\n  <li>Formato da resposta: Categorias do modelo, as categorias são &quot;Inglês&quot;, &quot;Espanhol&quot;, &quot;Frances&quot; e &quot;Portugues&quot;.</li>\r\n  <li>Access URL: https://www.googleapis.com/prediction/v1.6/projects/ /hostedmodels/ /predict</li>\r\n  <li>Url utilizada para acessar o modelo hospedado.</li>\r\n  <li>Não há custo para utilização desse modelo</li>\r\n  <li>Desenvolvido por: Fabio Lima</li>\r\n</ul>'),
(5, 'coyote-model', '<h3>Identificador de alimentos (Personalizado)</h3>\r\n<ul>\r\n  <li>Analisa uma frase ou palavra e determina se é relacionado a um Legume, Fruta, Verdura, ou Tempero.</li>\r\n  <li>Formato da pesquisa: Uma única coluna de texto. </li>\r\n  <li>Formato da resposta: Categorias do modelo, as categorias são &quot;Legumes&quot;, &quot;Frutas&quot;, &quot;Verduras&quot; e &quot;Tempero&quot;.</li>\r\n  <li>Access URL: https://www.googleapis.com/prediction/v1.6/projects/ /hostedmodels/ /predict</li>\r\n  <li>Url utilizada para acessar o modelo hospedado.</li>\r\n  <li>Não há custo para utilização desse modelo</li>\r\n  <li>Desenvolvido por: Fabio Lima</li>\r\n</ul>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `model_file`
--
ALTER TABLE `model_file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_info`
--
ALTER TABLE `model_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `model_info`
--
ALTER TABLE `model_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
