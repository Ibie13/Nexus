-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Dez-2020 às 03:49
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdnexus2(3)`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `codAluno` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alunoSenha` varchar(20) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `cpf` char(14) NOT NULL,
  `rg` char(13) NOT NULL,
  `nascimento` date NOT NULL,
  `cep` char(9) NOT NULL,
  `imgAluno` varchar(100) NOT NULL,
  `rendaPropia` varchar(100) NOT NULL,
  `renda` varchar(100) NOT NULL,
  `cor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbaluno`
--

INSERT INTO `tbaluno` (`codAluno`, `nome`, `email`, `alunoSenha`, `sexo`, `cpf`, `rg`, `nascimento`, `cep`, `imgAluno`, `rendaPropia`, `renda`, `cor`) VALUES
(1, 'Gabriel Landim', 'gabriellandim@eu.com', '1234', 'Masculino', '468.288.118-36', '874.525.362-6', '2003-09-09', '08440-320', 'mano.jpg', 'sem renda própria ', 'R$1.045 a R$2.500', 'Branco'),
(2, 'Gabriel Bueno', 'bueno@gmail.com', '12345', 'Masculino', '468.288.118-36', '365.842.579-6', '1999-05-05', '47534-753', '3.jpg', 'sem renda própria ', 'R$4.000 ou mais', 'Branco'),
(4, 'Renata Silva', 'renata@gmail.com', '1234567', 'gênero fluido ', '468.288.118-36', '564.456.465-1', '2004-08-15', '45646-645', '4.jpg', 'com renda própria ', 'R$2.500 a R$ 4.000', 'Branco'),
(5, 'João Alberto da Silva', 'joaozinho@gmail.com', '12345678', 'Não binário ', '468.288.118-36', '133.133.333-1', '1980-10-20', '56456-416', '1.jpg', 'com renda própria ', 'R$4.000 ou mais', 'Branco'),
(6, 'Felipe de Castro', 'felipe@gmail.com', '123', 'Prefiro não dizer', '468.288.118-36', '354.321.065-4', '2001-10-19', '65045-640', '3.jpg', 'sem renda própria ', 'R$1.045 a R$2.500', 'Preto'),
(7, 'Leandro de Souza', 'leandro@gmail.com', '12345', 'Andrógeno ', '468.288.118-36', '874.525.362-6', '2002-11-01', '50045-640', '2.jpg', 'com renda própria ', 'R$2.500 a R$ 4.000', 'Vermelho'),
(10, 'Nicole Romero', 'nicole123@gmail.com', '1234', 'feminino', '664.216.610-84', '242.424.242-4', '0000-00-00', '08411-110', 'pp.jpg', 'com renda p´ropia', 'R$1.045 a R$2.500', 'Branco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcurso`
--

CREATE TABLE `tbcurso` (
  `codCurso` int(11) NOT NULL,
  `nomeCurso` varchar(60) NOT NULL,
  `emailCurso` varchar(80) NOT NULL,
  `senhaCurso` varchar(20) NOT NULL,
  `nomeImagemCurso` varchar(100) NOT NULL,
  `cepCurso` varchar(8) NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcurso`
--

INSERT INTO `tbcurso` (`codCurso`, `nomeCurso`, `emailCurso`, `senhaCurso`, `nomeImagemCurso`, `cepCurso`, `tipo`) VALUES
(1, 'Cursinho Mafalda', 'mafalda@gov.com.br', '1233', 'mafalda.jpg', '03072000', 'Pré-Vestibular'),
(2, 'Cursinho FEAUSP', 'feausp@usp.gov.com.br', '1234', 'feausp.jpg', '05508010', 'Pré-Vestibular'),
(3, 'Cursinho UFABC', 'ufabc@gov.com.br', '12345', 'ufabc.jpg', '09210580', 'Pré-Vestibular'),
(4, 'Veterinario', 'pet@gov.com', '123456', 'pet.jpg', '52369874', 'Pré-Vestibular'),
(5, 'Poliedro', 'poliedro@gov.com', '123456', 'poliedro.jpg', '25478963', 'Pré-Vestibular'),
(6, 'One', 'one@gov.com', '1234567', 'one.jpg', '15478963', 'Pré-Vestibular'),
(7, 'Cursinho DaCapo', 'dacapo@gov.com', '12345678', 'a7.jpg', '25478963', 'Música'),
(8, 'Cursinho Masp', 'masp@gov.com', '123456789', 'a8.jpg', '45875632', 'Outros'),
(11, 'Curso Alfa', 'nicole123@gmail.com', '1234', 'Pré-01.jpg', '08411-11', 'Pré-Vestibular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcursoaluno`
--

CREATE TABLE `tbcursoaluno` (
  `codCursoAluno` int(11) NOT NULL,
  `codCursoconfirmado` int(11) NOT NULL,
  `codAluno` int(11) NOT NULL,
  `nomeAluno` varchar(70) NOT NULL,
  `emailAluno` varchar(70) NOT NULL,
  `enderecoAluno` varchar(70) NOT NULL,
  `cpfAluno` varchar(70) NOT NULL,
  `rgAluno` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcursoaluno`
--

INSERT INTO `tbcursoaluno` (`codCursoAluno`, `codCursoconfirmado`, `codAluno`, `nomeAluno`, `emailAluno`, `enderecoAluno`, `cpfAluno`, `rgAluno`) VALUES
(4, 2, 1, 'Gabriel Bueno', 'g@gmail.com', '292 R. HonÃ³rio Maia, SÃ£o Paulo', '12345678912', '458752369'),
(5, 2, 5, 'carla', 'carla@gmail.com', 'rua lagoa', '4567890', '098765432'),
(6, 4, 5, 'carla', 'carla@gmail.com', 'rua lagoa', '4567890', '098765432'),
(12, 1, 9, 'Nicole Romero', 'nicole123@gmail.com', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', '905.638.590-91', '242.424.242-4'),
(13, 1, 10, 'Nicole Romero', 'nicole123@gmail.com', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', '664.216.610-84', '242.424.242-4'),
(15, 2, 10, 'Nicole Romero', 'nicole123@gmail.com', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', '664.216.610-84', '242.424.242-4');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcursoconfirmado`
--

CREATE TABLE `tbcursoconfirmado` (
  `codCursoconfirmado` int(11) NOT NULL,
  `nomeCursoC` varchar(50) NOT NULL,
  `emailCursoC` varchar(50) NOT NULL,
  `senhaCursoC` varchar(50) NOT NULL,
  `nomeImagemCursoC` varchar(50) NOT NULL,
  `cepCursoC` varchar(50) NOT NULL,
  `tipo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbcursoconfirmado`
--

INSERT INTO `tbcursoconfirmado` (`codCursoconfirmado`, `nomeCursoC`, `emailCursoC`, `senhaCursoC`, `nomeImagemCursoC`, `cepCursoC`, `tipo`) VALUES
(1, 'Cursinho Mafalda', 'mafalda@gov.com.br', '1233', 'mafalda.jpeg', '03072000', 'Pré-Vestibular'),
(2, 'Cursinho FEAUSP', 'feausp@usp.gov.com.br', '1234', 'feausp.jpg', '05508010', 'Pré-Vestibular'),
(3, 'Cursinho UFABC', 'ufabc@gov.com.br', '12345', 'ufabc.jpeg', '09210580', 'Pré-Vestibular'),
(4, 'Veterinario', 'pet@gov.com', '123456', 'medensina.jpg', '52369874', 'Pré-Vestibular'),
(5, 'Poliedro', 'poliedro@gov.com', '123456', 'poliedro.jpeg', '25478963', 'Pré-Vestibular'),
(6, 'One', 'one@gov.com', '1234567', 'one.jpeg', '15478963', 'Pré-Vestibular'),
(7, 'Cursinho DaCapo', 'dacapo@gov.com', '12345678', 'a7.jpeg', '25478963', 'Música'),
(8, 'Cursinho Masp', 'masp@gov.com', '123456789', 'a8.png', '45875632', 'Design'),
(11, 'Curso Alfa', 'nicole123@gmail.com', '1234', 'Pré-01.jpg', '08411-11', 'Pré-Vestibular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbgenero`
--

CREATE TABLE `tbgenero` (
  `idcodCor` int(11) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbgenero`
--

INSERT INTO `tbgenero` (`idcodCor`, `Genero`) VALUES
(1, 'Masculino'),
(2, 'Feminino'),
(3, 'Não-Binário'),
(4, 'Gênero Fluido'),
(5, 'Outro'),
(6, 'Prefiro Não Dizer');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocalizacao`
--

CREATE TABLE `tblocalizacao` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblocalizacao`
--

INSERT INTO `tblocalizacao` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Cursinho Mafalda', 'R. Honório Maia, 292 - Maranhão, São Paulo - SP', -23.535057, -46.559509, 'Educacao'),
(2, 'Cursinho FEAUSP', 'Av. Prof. Luciano Gualberto, 908 - Butantã, São Paulo - SP', -23.557793, -46.729298, 'Educacao'),
(3, 'Cursinho UFABC', 'Av. dos Estados, 5001 - Bangú, Santo Andre - SP', -23.644239, -46.528217, 'Educacao'),
(4, 'Veterinario', 'Rua das dores n°32', -23.550056, -46.405518, 'Educacao'),
(5, 'Poliedro', 'Rua Lalala n°10', -23.524038, -46.528175, 'Educacao'),
(6, 'One', 'Rua Augusta, n°10', -23.535057, -46.729298, 'Educacao'),
(7, 'Cursinho DaCapo', 'R. Antonio Camardo, 120 - Vila Gomes Cardim, São Paulo - SP', -23.535057, -46.566795, 'Educacao'),
(8, 'Cursinho Masp', 'Avenida Paulista, n°250', -23.572515, -46.566795, 'Educacao'),
(13, 'Curso Alfa', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851, 'Pré-Vestibular'),
(11, 'Mafalda', 'R. Honório Maia, 292 - Maranhão, São Paulo - SP', -23.535097, -46.559486, 'Desenvolvimento'),
(12, 'Cursinho Alfa', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851, 'Pré-Vestibular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocalizacaoaluno`
--

CREATE TABLE `tblocalizacaoaluno` (
  `idLocAluno` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblocalizacaoaluno`
--

INSERT INTO `tblocalizacaoaluno` (`idLocAluno`, `name`, `address`, `lat`, `lng`) VALUES
(1, 'Gabriel Landim', 'Rua Ascenso de Quadros, 32 - Guaianases - SÃ£o Paulo - SP', -23.537563, -46.407856),
(2, 'Gabriel Bueno', 'Rua Catu, 38 - Guaianases - SÃ£o Paulo - SP', -23.538565, -46.408218),
(3, 'Joana Silva', 'R. Augusta, 32 - ConsolaÃ§Ã£o - SÃ£o Paulo - SP', -23.549828, -46.646503),
(4, 'Renata Silva', 'R. Andes, 325 - Guaianases - SÃ£o Paulo - SP', -23.538099, -46.411396),
(5, 'JoÃ£o Alberto da Silva', 'Rua CapitÃ£o Pucci, 440 - Guaianases - SÃ£o Paulo - SP', -23.540142, -46.408443),
(6, 'Felipe de Castro', 'Rua Serra das Araras, 400 - Lajeado - SÃ£o Paulo - SP', -23.536644, -46.402096),
(7, 'Leandro de Souza', 'Estr. do Lageado Velho, 500 - Guaianases - SÃ£o Paulo - SP', -23.536812, -46.404217),
(8, 'Nicole Romero', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851),
(9, 'Nicole Romero', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851),
(10, 'Nicole Romero', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocalizacaoconfirmada`
--

CREATE TABLE `tblocalizacaoconfirmada` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblocalizacaoconfirmada`
--

INSERT INTO `tblocalizacaoconfirmada` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, ' Cursinho Mafalda', 'R. Honório Maia, 292 - Maranhão, São Paulo - SP', -23.535057, -46.559509, ' Educacao'),
(2, ' Cursinho FEAUSP', 'Av. Prof. Luciano Gualberto, 908 - Butantã, São Paulo - SP', -23.557793, -46.729298, ' Educacao'),
(3, ' Cursinho UFABC', 'Av. dos Estados, 5001 - Bangú, Santo Andre - SP', -23.644239, -46.528217, ' Educacao'),
(4, ' Veterinario', 'Rua das dores n°32', -23.550056, -46.405518, ' Educacao'),
(5, ' Poliedro', 'Rua Lalala n°10', -23.524038, -46.528175, ' Educacao'),
(6, ' One', 'Rua Augusta, n°10', -23.535057, -46.729298, ' Educacao'),
(7, ' Cursinho DaCapo', 'R. Antonio Camardo, 120 - Vila Gomes Cardim, São Paulo - SP', -23.535057, -46.566795, ' Educacao'),
(8, ' Cursinho Masp', 'Avenida Paulista, n°250', -23.572515, -46.566795, ' Educacao'),
(9, ' Cursinho Alfa', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851, ' Pré-Vestibular'),
(10, ' Cursinho Alfa', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851, ' Pré-Vestibular'),
(11, ' Curso Alfa', 'Rua francisco de oliveira, jardim lageado, 3032 - São Paulo - SP', -23.530029, -46.402851, ' Pré-Vestibular');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblogado`
--

CREATE TABLE `tblogado` (
  `idlogado` int(11) NOT NULL,
  `idCursoL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tblogado`
--

INSERT INTO `tblogado` (`idlogado`, `idCursoL`) VALUES
(1, 0),
(4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbrendafamiliar`
--

CREATE TABLE `tbrendafamiliar` (
  `idRenda` int(11) NOT NULL,
  `ValorRenda` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbrendafamiliar`
--

INSERT INTO `tbrendafamiliar` (`idRenda`, `ValorRenda`) VALUES
(3, 'Menos de 1 salário mínimo '),
(4, 'De 1 á 2 salários Mínimos'),
(5, 'De 2 á 3 Salários Mínimos '),
(6, 'De 3 á 4 salários Mínimos'),
(7, 'De 4 á 5 Salários Mínimos '),
(8, 'Mais de 5 Salários Mínimos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbvagascurso`
--

CREATE TABLE `tbvagascurso` (
  `id` int(11) NOT NULL,
  `codCursoconfirmado` int(11) NOT NULL,
  `vagasP` int(11) NOT NULL,
  `vagasR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbvagascurso`
--

INSERT INTO `tbvagascurso` (`id`, `codCursoconfirmado`, `vagasP`, `vagasR`) VALUES
(1, 1, 100, 36),
(2, 2, 90, 56),
(3, 3, 74, 21),
(4, 4, 98, 32),
(5, 5, 50, 20),
(6, 6, 100, 50),
(7, 7, 50, 20),
(8, 8, 50, 40),
(9, 9, 30, 20),
(10, 9, 60, 10),
(11, 10, 110, 50),
(12, 11, 120, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`codAluno`);

--
-- Indexes for table `tbcurso`
--
ALTER TABLE `tbcurso`
  ADD PRIMARY KEY (`codCurso`);

--
-- Indexes for table `tbcursoaluno`
--
ALTER TABLE `tbcursoaluno`
  ADD PRIMARY KEY (`codCursoAluno`),
  ADD KEY `codCurso_fk` (`codCursoconfirmado`),
  ADD KEY `codAluno_fk` (`codAluno`);

--
-- Indexes for table `tbcursoconfirmado`
--
ALTER TABLE `tbcursoconfirmado`
  ADD PRIMARY KEY (`codCursoconfirmado`);

--
-- Indexes for table `tbgenero`
--
ALTER TABLE `tbgenero`
  ADD PRIMARY KEY (`idcodCor`);

--
-- Indexes for table `tblocalizacao`
--
ALTER TABLE `tblocalizacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblocalizacaoaluno`
--
ALTER TABLE `tblocalizacaoaluno`
  ADD PRIMARY KEY (`idLocAluno`);

--
-- Indexes for table `tblocalizacaoconfirmada`
--
ALTER TABLE `tblocalizacaoconfirmada`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblogado`
--
ALTER TABLE `tblogado`
  ADD PRIMARY KEY (`idlogado`);

--
-- Indexes for table `tbrendafamiliar`
--
ALTER TABLE `tbrendafamiliar`
  ADD PRIMARY KEY (`idRenda`);

--
-- Indexes for table `tbvagascurso`
--
ALTER TABLE `tbvagascurso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codCursoconfirmado` (`codCursoconfirmado`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `codAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbcurso`
--
ALTER TABLE `tbcurso`
  MODIFY `codCurso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbcursoaluno`
--
ALTER TABLE `tbcursoaluno`
  MODIFY `codCursoAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbcursoconfirmado`
--
ALTER TABLE `tbcursoconfirmado`
  MODIFY `codCursoconfirmado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbgenero`
--
ALTER TABLE `tbgenero`
  MODIFY `idcodCor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblocalizacao`
--
ALTER TABLE `tblocalizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblocalizacaoaluno`
--
ALTER TABLE `tblocalizacaoaluno`
  MODIFY `idLocAluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblocalizacaoconfirmada`
--
ALTER TABLE `tblocalizacaoconfirmada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblogado`
--
ALTER TABLE `tblogado`
  MODIFY `idlogado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbrendafamiliar`
--
ALTER TABLE `tbrendafamiliar`
  MODIFY `idRenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbvagascurso`
--
ALTER TABLE `tbvagascurso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
