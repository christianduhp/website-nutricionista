-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 05:08 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `response` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `meal_plans`
--

CREATE TABLE `meal_plans` (
  `id` int(11) NOT NULL,
  `option` varchar(255) NOT NULL,
  `meal_name` varchar(255) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `plan_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meal_plans`
--

INSERT INTO `meal_plans` (`id`, `option`, `meal_name`, `food_name`, `plan_name`) VALUES
(1, 'Opcão 1', 'Café da Manhã', 'Omelete de ovos', 'Plano Padrão'),
(2, 'Opcão 1', 'Café da Manhã', 'Aveia com frutas', 'Plano Padrão'),
(3, 'Opcão 1', 'Café da Manhã', 'Café preto', 'Plano Padrão'),
(4, 'Opcão 1', 'Lanche da Manhã', 'Iogurte natural', 'Plano Padrão'),
(5, 'Opcão 1', 'Lanche da Manhã', 'Frutas secas', 'Plano Padrão'),
(7, 'Opcão 1', 'Almoço', 'Arroz integral', 'Plano Padrão'),
(9, 'Opcão 1', 'Lanche da Tarde', 'Batata doce cozida', 'Plano Padrão'),
(10, 'Opcão 1', 'Lanche da Tarde', 'Castanhas', 'Plano Padrão'),
(11, 'Opcão 1', 'Jantar', 'Salmão assado', 'Plano Padrão'),
(12, 'Opcão 1', 'Jantar', 'Quinoa', 'Plano Padrão'),
(13, 'Opcão 1', 'Jantar', 'Salada verde', 'Plano Padrão'),
(14, 'Opcão 2', 'Café da Manhã', 'Cereal integral', 'Plano Padrão'),
(15, 'Opcão 2', 'Café da Manhã', 'Leite desnatado', 'Plano Padrão'),
(16, 'Opcão 2', 'Café da Manhã', 'Banana', 'Plano Padrão'),
(17, 'Opcão 2', 'Lanche da Manhã', 'Maçã', 'Plano Padrão'),
(18, 'Opcão 2', 'Lanche da Manhã', 'Mix de oleaginosas', 'Plano Padrão'),
(19, 'Opcão 2', 'Almoço', 'Peixe assado', 'Plano Padrão'),
(20, 'Opcão 2', 'Almoço', 'Quinoa', 'Plano Padrão'),
(21, 'Opcão 2', 'Almoço', 'Brócolis no vapor', 'Plano Padrão'),
(22, 'Opcão 2', 'Lanche da Tarde', 'Iogurte grego', 'Plano Padrão'),
(23, 'Opcão 2', 'Lanche da Tarde', 'Pêssego', 'Plano Padrão'),
(24, 'Opcão 2', 'Jantar', 'Frango ao curry', 'Plano Padrão'),
(25, 'Opcão 2', 'Jantar', 'Arroz basmati', 'Plano Padrão'),
(26, 'Opcão 2', 'Jantar', 'Abobrinha refogada', 'Plano Padrão'),
(27, 'Opcão 3', 'Café da Manhã', 'Panquecas de aveia', 'Plano Padrão'),
(28, 'Opcão 3', 'Café da Manhã', 'Frutas vermelhas', 'Plano Padrão'),
(29, 'Opcão 3', 'Café da Manhã', 'Chá verde', 'Plano Padrão'),
(30, 'Opcão 3', 'Lanche da Manhã', 'Iogurte de amêndoas', 'Plano Padrão'),
(31, 'Opcão 3', 'Lanche da Manhã', 'Mix de sementes', 'Plano Padrão'),
(32, 'Opcão 3', 'Almoço', 'Carne magra ao molho de tomate', 'Plano Padrão'),
(33, 'Opcão 3', 'Almoço', 'Arroz selvagem', 'Plano Padrão'),
(34, 'Opcão 3', 'Almoço', 'Legumes no vapor', 'Plano Padrão'),
(35, 'Opcão 3', 'Lanche da Tarde', 'Banana com pasta de amendoim', 'Plano Padrão'),
(36, 'Opcão 3', 'Lanche da Tarde', 'Chá de ervas', 'Plano Padrão'),
(37, 'Opcão 3', 'Jantar', 'Peixe grelhado', 'Plano Padrão'),
(38, 'Opcão 3', 'Jantar', 'Cuscuz marroquino', 'Plano Padrão'),
(39, 'Opcão 3', 'Jantar', 'Salada de folhas verdes', 'Plano Padrão'),
(40, 'Opcão 4', 'Café da Manhã', 'Smoothie de frutas', 'Plano Padrão'),
(41, 'Opcão 4', 'Café da Manhã', 'Torradas integrais', 'Plano Padrão'),
(42, 'Opcão 4', 'Café da Manhã', 'Café preto', 'Plano Padrão'),
(43, 'Opcão 4', 'Lanche da Manhã', 'Iogurte grego', 'Plano Padrão'),
(44, 'Opcão 4', 'Lanche da Manhã', 'Mix de nozes', 'Plano Padrão'),
(45, 'Opcão 4', 'Almoço', 'Frango ao curry', 'Plano Padrão'),
(46, 'Opcão 4', 'Almoço', 'Arroz basmati', 'Plano Padrão'),
(47, 'Opcão 4', 'Almoço', 'Vegetais refogados', 'Plano Padrão'),
(48, 'Opcão 4', 'Lanche da Tarde', 'Maçã fatiada', 'Plano Padrão'),
(49, 'Opcão 4', 'Lanche da Tarde', 'Barra de cereais', 'Plano Padrão'),
(50, 'Opcão 4', 'Jantar', 'Espaguete integral', 'Plano Padrão'),
(51, 'Opcão 4', 'Jantar', 'Molho de tomate caseiro', 'Plano Padrão'),
(52, 'Opcão 4', 'Jantar', 'Salada de rúcula', 'Plano Padrão'),
(53, 'Opcão 5', 'Café da Manhã', 'Panquecas de aveia', 'Plano Padrão'),
(54, 'Opcão 5', 'Café da Manhã', 'Frutas vermelhas', 'Plano Padrão'),
(55, 'Opcão 5', 'Café da Manhã', 'Chá verde', 'Plano Padrão'),
(56, 'Opcão 5', 'Lanche da Manhã', 'Iogurte com granola', 'Plano Padrão'),
(57, 'Opcão 5', 'Lanche da Manhã', 'Banana', 'Plano Padrão'),
(58, 'Opcão 5', 'Almoço', 'Peixe grelhado', 'Plano Padrão'),
(59, 'Opcão 5', 'Almoço', 'Quinoa cozida', 'Plano Padrão'),
(60, 'Opcão 5', 'Almoço', 'Brócolis no vapor', 'Plano Padrão'),
(61, 'Opcão 5', 'Lanche da Tarde', 'Mix de frutas secas', 'Plano Padrão'),
(62, 'Opcão 5', 'Lanche da Tarde', 'Castanhas', 'Plano Padrão'),
(63, 'Opcão 5', 'Jantar', 'Frango assado', 'Plano Padrão'),
(64, 'Opcão 5', 'Jantar', 'Batata-doce', 'Plano Padrão'),
(65, 'Opcão 5', 'Jantar', 'Salada de folhas verdes', 'Plano Padrão'),
(66, 'Opcão 6', 'Café da Manhã', 'Tapioca recheada', 'Plano Padrão'),
(67, 'Opcão 6', 'Café da Manhã', 'Abacate', 'Plano Padrão'),
(68, 'Opcão 6', 'Café da Manhã', 'Café preto', 'Plano Padrão'),
(69, 'Opcão 6', 'Lanche da Manhã', 'Iogurte com mel', 'Plano Padrão'),
(70, 'Opcão 6', 'Lanche da Manhã', 'Nozes', 'Plano Padrão'),
(71, 'Opcão 6', 'Almoço', 'Carne de porco ao molho barbecue', 'Plano Padrão'),
(72, 'Opcão 6', 'Almoço', 'Arroz selvagem', 'Plano Padrão'),
(73, 'Opcão 6', 'Almoço', 'Legumes no vapor', 'Plano Padrão'),
(74, 'Opcão 6', 'Lanche da Tarde', 'Maçã', 'Plano Padrão'),
(75, 'Opcão 6', 'Lanche da Tarde', 'Biscoitos integrais', 'Plano Padrão'),
(76, 'Opcão 6', 'Jantar', 'Sushi variado', 'Plano Padrão'),
(77, 'Opcão 6', 'Jantar', 'Sopa de miso', 'Plano Padrão'),
(78, 'Opcão 6', 'Jantar', 'Edamame', 'Plano Padrão'),
(79, 'Opcão 7', 'Café da Manhã', 'Ovos mexidos', 'Plano Padrão'),
(80, 'Opcão 7', 'Café da Manhã', 'Pão integral', 'Plano Padrão'),
(81, 'Opcão 7', 'Café da Manhã', 'Suco de laranja', 'Plano Padrão'),
(82, 'Opcão 7', 'Lanche da Manhã', 'Mamão', 'Plano Padrão'),
(83, 'Opcão 7', 'Lanche da Manhã', 'Granola', 'Plano Padrão'),
(84, 'Opcão 7', 'Almoço', 'Lasanha de berinjela', 'Plano Padrão'),
(85, 'Opcão 7', 'Almoço', 'Salada de folhas', 'Plano Padrão'),
(86, 'Opcão 7', 'Almoço', 'Pêssego', 'Plano Padrão'),
(87, 'Opcão 7', 'Lanche da Tarde', 'Iogurte com morangos', 'Plano Padrão'),
(88, 'Opcão 7', 'Lanche da Tarde', 'Amêndoas', 'Plano Padrão'),
(89, 'Opcão 7', 'Jantar', 'Peito de peru assado', 'Plano Padrão'),
(90, 'Opcão 7', 'Jantar', 'Cuscuz marroquino', 'Plano Padrão'),
(91, 'Opcão 7', 'Jantar', 'Abóbora assada', 'Plano Padrão'),
(92, 'Opção 1', 'Café da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(93, 'Opção 1', 'Lanche da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(94, 'Opção 1', 'Almoço', 'Alimento Padrão', 'Plano Vegetariano'),
(95, 'Opção 1', 'Lanche da Tarde', 'Alimento Padrão', 'Plano Vegetariano'),
(96, 'Opção 1', 'Jantar', 'Alimento Padrão', 'Plano Vegetariano'),
(97, 'Opção 2', 'Café da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(98, 'Opção 2', 'Lanche da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(99, 'Opção 2', 'Almoço', 'Alimento Padrão', 'Plano Vegetariano'),
(100, 'Opção 2', 'Lanche da Tarde', 'Alimento Padrão', 'Plano Vegetariano'),
(101, 'Opção 2', 'Jantar', 'Alimento Padrão', 'Plano Vegetariano'),
(102, 'Opção 3', 'Café da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(103, 'Opção 3', 'Lanche da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(104, 'Opção 3', 'Almoço', 'Alimento Padrão', 'Plano Vegetariano'),
(105, 'Opção 3', 'Lanche da Tarde', 'Alimento Padrão', 'Plano Vegetariano'),
(106, 'Opção 3', 'Jantar', 'Alimento Padrão', 'Plano Vegetariano'),
(107, 'Opção 4', 'Café da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(108, 'Opção 4', 'Lanche da Manhã', 'Alimento Padrão', 'Plano Vegetariano'),
(109, 'Opção 4', 'Almoço', 'Alimento Padrão', 'Plano Vegetariano'),
(110, 'Opção 4', 'Lanche da Tarde', 'Alimento Padrão', 'Plano Vegetariano'),
(111, 'Opção 4', 'Jantar', 'Alimento Padrão', 'Plano Vegetariano');


-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `title`, `description`) VALUES
(1, 'Avaliação do Tratamento', 'Avalie sua experiência e contribua para melhorias.'),
(2, 'Anamnese para Exercício Físico', 'Forneça informações para otimizar sua prática.'),
(3, 'Anamnese para Perda de Peso', 'Compartilhe detalhes para personalizar seu plano.'),
(4, 'Anamnese de Saúde da Mulher', 'Informações cruciais para orientar sua saúde.'),
(5, 'Avaliação Nutricional - Geriatria', 'Ajude-me a entender suas necessidades nutricionais.'),
(6, 'Feedback Semanal Pós-Atendimento', 'Compartilhe sua semana para ajustes necessários.'),
(7, 'Definição de Metas', 'Estabeleça metas para um tratamento mais direcionado.'),
(8, 'Alergia Alimentar', 'Identifique alergias alimentares para cuidado adequado.'),
(9, 'Rastreamento Metabólico', 'Dados essenciais para análise metabólica.'),
(10, 'Sinais e Sintomas', 'Compreensão detalhada para diagnóstico preciso.'),
(11, 'Questionário Pré-Consulta', 'Forneça informações preliminares para melhor atendimento.'),
(12, 'Pré-Consulta - Vegetarianos/Veganos', 'Detalhes específicos para planos personalizados.'),
(13, 'Relação com a Comida', 'Entenda seus hábitos alimentares e emoções associadas.'),
(14, 'Teste DISC - Perfil Comportamental', 'Descubra seu perfil comportamental para ajustes.');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaire_questions`
--

CREATE TABLE `questionnaire_questions` (
  `id` int(11) NOT NULL,
  `questionnaire_id` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `options` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questionnaire_questions`
--

INSERT INTO `questionnaire_questions` (`id`, `questionnaire_id`, `question`, `type`, `options`) VALUES
(1, 1, 'Como você me descobriu?', 'radio', '[\"Google\", \"Redes sociais\", \"Indicação de amigo (a) ou familiar\", \"Outro\"]'),
(2, 1, 'Como você classifica o suporte pré-consulta?', 'radio', '[\"Excelente\", \"Muito bom\", \"Bom\", \"Nada bom\"]'),
(3, 1, 'O que você buscava quando agendou a consulta?', 'text', NULL),
(4, 1, 'Como eu estou contribuindo para que você conquiste sua meta?', 'text', NULL),
(5, 1, 'Eu consigo esclarecer suas dúvidas...:', 'radio', '[\"Muito bem\", \"Não muito bem\", \"Um pouco mal\", \"Muito mal\"]'),
(6, 1, 'Você sente que eu estou presente na consulta e te escutando ativamente?', 'radio', '[\"Sempre\", \"Quase sempre\", \"Às vezes\", \"Quase nunca\"]'),
(7, 1, 'O quanto você se sente confortável e acolhido (a) durante as consultas?', 'radio', '[\"Muito confortável\", \"Confortável\", \"Um pouco desconfortável\", \"Muito desconfortável\"]'),
(8, 1, 'O que você mudaria durante as consultas?', 'textarea', NULL),
(9, 1, 'Para que você se mantenha motivado (a) no tratamento, você prefere que o contato no período entre as consultas seja...', 'radio', '[\"Frequente\", \"Ocasional\", \"Somente durante as consultas\"]'),
(10, 1, 'Como eu posso tornar a adesão ao tratamento mais fácil para você?', 'textarea', NULL),
(11, 1, 'Quais desses materiais você tem mais interesse em consumir?', 'checkbox', '[\"Receitas\", \"Livros digitais\", \"Orientações nutricionais\", \"Vídeos e áudios\"]'),
(12, 1, 'De 0 a 10, o quanto você está satisfeito (a) com o tratamento?', 'radio', '[\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\"]'),
(13, 1, 'O que eu posso fazer para essa avaliação chegar a 10?', 'textarea', NULL),
(14, 1, 'De 0 a 10, qual a chance de você indicar minha consulta para um amigo ou familiar?', 'radio', '[\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\"]'),
(15, 2, 'Como você classificaria seus hábitos alimentares?', 'radio', '[\"Muito bons\", \"Bons\", \"Regulares\", \"Ruins\", \"Muito ruins\"]'),
(16, 2, 'Como você gostaria de classificar seus hábitos alimentares no final do tratamento?', 'radio', '[\"Muito bons\", \"Bons\", \"Regulares\", \"Ruins\", \"Muito ruins\"]'),
(17, 2, 'Fadiga é uma redução na habilidade do músculo em gerar força. Você sente que isso acontece de forma precoce durante o treino?', 'radio', '[\"Sim\", \"Não\"]'),
(18, 2, 'Sente tontura durante os treinos?', 'radio', '[\"Sim\", \"Não\"]'),
(19, 2, 'Já utilizou drogas anabolizantes no passado?', 'radio', '[\"Sim\", \"Não\"]'),
(20, 2, 'Utiliza drogas anabolizantes atualmente?', 'radio', '[\"Sim\", \"Não\"]'),
(21, 2, 'Se sim, qual?', 'text', NULL),
(22, 2, 'Qual a duração do treino?', 'text', NULL),
(23, 2, 'Há consumo de água durante o treino? Qual a quantidade média ingerida?', 'text', NULL),
(24, 2, 'Consome bebidas esportivas nos dias de treino? Antes, durante ou depois?', 'text', NULL),
(25, 2, 'De 0 a 10, quanto você está comprometido?', 'radio', '[\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\"]'),
(26, 2, 'O que falta para o seu comprometimento chegar no 10?', 'textarea', NULL),
(27, 2, 'O que eu posso fazer para te motivar ou manter motivado?', 'textarea', NULL),
(28, 2, 'Alguém será seu apoio nesta caminhada? Quem é essa pessoa?', 'text', NULL),
(29, 2, 'Escolha uma frase que vai dizer para si sempre que estiver desmotivado (a).:', 'text', NULL),
(30, 2, 'Qual é sua preferência de sabor?', 'radio', '[\"Doce\", \"Salgado\", \"Azedo\", \"Amargo\"]'),
(31, 2, 'Em qual horário do dia você sente maior apetite?', 'radio', '[\"Manhã\", \"Tarde\", \"Noite\", \"Madrugada\"]'),
(32, 2, 'Como você diria que é sua mastigação?', 'radio', '[\"Lenta, mastiga os alimentos até a consistência de \'papinha\' antes de engolir.\", \"Rápida, mastiga com pressa, engole grandes pedaços de alimento.\", \"Mais ou menos, depende do dia.\"]'),
(33, 2, 'Você sente queimação no estômago após comer certos alimentos?', 'radio', '[\"Sim\", \"Não\"]'),
(34, 2, 'Pense em como você se sente após o almoço. Como é sua digestão?', 'radio', '[\"Boa! Não sente nenhum mal-estar. Após algumas horas, sente que o meu estômago já está vazio novamente.\", \"Regular. Sente desconfortos leves e que o estômago nunca está 100 % vazio.\", \"Ruim. Mal-estar constante, gases, azia, eructações, sensação de saciedade precoce.\"]'),
(35, 2, 'Toma líquidos junto às refeições?', 'radio', '[\"Sim\", \"Não\"]'),
(36, 2, 'Quantos copos ou garrafas de água você bebe por dia?', 'text', NULL),
(37, 2, 'Com que frequência você faz xixi?', 'radio', '[\"Poucas vezes ao dia\", \"Frequência normal\", \"Frequência aumentada, acorda à noite para ir ao banheiro\"]'),
(38, 2, 'Em relação ao padrão de evacuação:', 'radio', '[\"Normal, evacua diariamente.\", \"Obstipado, intestino constantemente preso.\", \"Diarreico, fezes aquosas.\"]'),
(39, 2, 'Após uma refeição, sente dores abdominais ou que está estufado (a)?', 'radio', '[\"Sim\", \"Não\"]'),
(40, 2, 'Em relação à produção de gases:', 'radio', '[\"Está normal.\", \"Está aumentada. Sente a barriga sempre inchada.\"]'),
(41, 2, 'Quando vai ao banheiro, tem a sensação de esvaziamento completo?', 'radio', '[\"Sim\", \"Não\"]'),
(42, 2, 'Costuma comer em maior ou menor quantidade quando está triste, feliz ou angustiado (a)?', 'radio', '[\"Sim\", \"Não\"]'),
(43, 3, 'Como você classificaria seus hábitos alimentares?', 'radio', '[\"Muito ruim\", \"Ruim\", \"Regular\", \"Bom\", \"Muito bom\"]'),
(44, 3, 'Como você gostaria de classificar seus hábitos alimentares no final do tratamento?', 'radio', '[\"Muito ruim\", \"Ruim\", \"Regular\", \"Bom\", \"Muito bom\"]'),
(45, 3, 'De 0 a 10, quanto você está comprometido?', 'radio', '[\"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\"]'),
(46, 3, 'O que falta para o seu comprometimento chegar no 10?', 'textarea', NULL),
(47, 3, 'O que eu posso fazer para te motivar ou manter motivado?', 'textarea', NULL),
(48, 3, 'Alguém será seu apoio nesta caminhada? Quem é essa pessoa?', 'text', NULL),
(49, 3, 'Escolha uma frase que vai dizer para si sempre que estiver desmotivado (a).: Sobre hábitos alimentares:', 'text', NULL),
(50, 3, 'Qual é sua preferência de sabor?', 'radio', '[\"Doce\", \"Salgado\", \"Azedo\", \"Amargo\"]'),
(51, 3, 'Em qual horário do dia você sente maior apetite?', 'radio', '[\"Manhã\", \"Tarde\", \"Noite\", \"Madrugada\"]'),
(52, 3, 'Como você diria que é sua mastigação?', 'radio', '[\"Rápida, mastiga com pressa, engole grandes pedaços de alimento.\", \"Mediana, depende do tempo disponível para almoçar naquele dia.\", \"Lenta, mastiga os alimentos até a consistência de \'papinha\' antes de engolir\"]'),
(53, 3, 'Alguma observação?', 'text', NULL),
(54, 3, 'Você sente queimação no estômago após comer certos alimentos?', 'radio', '[\"Sim\", \"Não\"]'),
(55, 3, 'Quais alimentos?', 'text', NULL),
(56, 3, 'Pense em como você se sente após o almoço. Como é sua digestão?', 'radio', '[\"Boa! Não sente nenhum mal-estar. Após algumas horas, sente que o meu estômago já está vazio novamente.\", \"Regular. Sente desconfortos leves e que o estômago nunca está 100 % vazio.\", \"Ruim. Mal-estar constante, gases, azia, eructações, sensação de saciedade precoce.\"]'),
(57, 3, 'Toma líquidos junto às refeições?', 'radio', '[\"Sim\", \"Não\"]'),
(58, 3, 'Quantos copos ou garrafas de água você bebe por dia?', 'text', NULL),
(59, 3, 'Com que frequência você faz xixi?', 'radio', '[\"Poucas vezes ao dia\", \"Frequência normal\", \"Frequência aumentada, acorda à noite para ir ao banheiro\"]'),
(60, 3, 'Em relação à evacuação:', 'radio', '[\"Normal, evacua diariamente.\", \"Obstipado, intestino constantemente preso.\", \"Diarreico, regularidade de fezes aquosas.\"]'),
(61, 3, 'Após uma refeição, sente dores abdominais ou que está estufado (a)?', 'radio', '[\"Sim\", \"Não\"]'),
(62, 3, 'Em relação à produção de gases:', 'radio', '[\"Está normal.\", \"Está aumentada. Sente a barriga sempre inchada.\"]'),
(63, 3, 'Quando vai ao banheiro, tem a sensação de esvaziamento completo?', 'radio', '[\"Sim\", \"Não\"]'),
(64, 3, 'Qual é a cor da sua língua?', 'radio', '[\"Rosada\", \"Esbranquiçada\", \"Avermelhada\", \"Arroxeada\", \"Amarelada\"]'),
(65, 3, 'Comportamento: Possui momentos em que come sem conseguir parar?', 'radio', '[\"Sim\", \"Não\"]'),
(66, 3, 'As emoções costumam controlar sua alimentação?', 'radio', '[\"Sim\", \"Não\"]'),
(67, 3, 'Se sim, quais sentimentos despertam o descontrole?', 'text', NULL),
(68, 3, 'Me descreva um momento que te faz perder o controle sobre a sua alimentação.:', 'textarea', NULL),
(69, 3, 'Me descreva um momento em que você conquistou algo que queria muito.:', 'textarea', NULL),
(70, 3, 'Como podemos resgatar esse sentimento de vitória para o nosso tratamento?', 'textarea', NULL),
(71, 3, 'Você tomou a decisão de mudar. O que te levou a isso?', 'textarea', NULL),
(72, 3, 'O que você espera de mim durante o nosso tratamento?', 'textarea', NULL),
(74, 4, 'Qual é sua preferência de sabor?', 'radio', '[\"Doce\", \"Salgado\", \"Azedo\", \"Amargo\"]'),
(75, 4, 'Em qual horário do dia você sente maior apetite?', 'radio', '[\"Manhã\", \"Tarde\", \"Noite\", \"Madrugada\"]'),
(76, 4, 'Alguma observação?', 'text', NULL),
(77, 4, 'Como você diria que é sua mastigação?', 'radio', '[\"Lenta, mastiga os alimentos até a consistência de \'papinha\' antes de engolir.\", \"Mais ou menos, depende do dia.\", \"Rápida, mastiga com pressa, engole grandes pedaços de alimento.\"]'),
(78, 4, 'Observações:', 'text', NULL),
(79, 4, 'Você sente queimação no estômago após comer certos alimentos?', 'radio', '[\"Sim\", \"Não\"]'),
(80, 4, 'Se sim, quais alimentos?', 'text', NULL),
(81, 4, 'Pense em como você se sente após o almoço. Como é sua digestão?', 'radio', '[\"Boa! Não sente nenhum mal-estar. Após algumas horas, sente que o meu estômago já está vazio novamente.\", \"Regular. Sente desconfortos leves e que o estômago nunca está 100 % vazio.\", \"Ruim. Mal-estar constante, gases, azia, eructações, sensação de saciedade precoce.\"]'),
(82, 4, 'Toma líquidos junto às refeições?', 'radio', '[\"Sim\", \"Não\"]'),
(83, 4, 'Se sim, qual tipo e quantidade?', 'text', NULL),
(84, 4, 'Quantos copos ou garrafas de água você bebe por dia?', 'text', NULL),
(85, 4, 'Com que frequência você faz xixi?', 'radio', '[\"Poucas vezes ao dia\", \"Frequência normal\", \"Frequência aumentada, acorda à noite para ir ao banheiro\"]'),
(86, 4, 'Observações:', 'text', NULL),
(87, 4, 'Em relação ao padrão de evacuação:', 'radio', '[\"Normal, evacua diariamente.\", \"Obstipado, intestino constantemente preso.\", \"Diarreico, fezes aquosas.\", \"Outros:\"]'),
(88, 4, 'Outros:', 'text', NULL),
(89, 4, 'Após uma refeição, sente dores abdominais ou que está estufada?', 'radio', '[\"Sim\", \"Não\"]'),
(90, 4, 'Se sim, causado por algum alimento específico?', 'text', NULL),
(91, 4, 'Em relação à produção de gases:', 'radio', '[\"Está normal.\", \"Está aumentada. Sente a barriga sempre inchada.\"]'),
(92, 4, 'Quando vai ao banheiro, tem a sensação de esvaziamento completo?', 'radio', '[\"Sim\", \"Não\"]'),
(93, 4, 'Entendendo o Ciclo Menstrual: Com que idade ocorreu a menarca (primeira menstruação)?', 'text', NULL),
(94, 4, 'Já esteve grávida?', 'radio', '[\"Não\", \"Sim, uma vez\", \"Sim, mais de uma vez\"]'),
(95, 4, 'Se sim, qual o tipo de parto realizado?', 'radio', '[\"Parto normal\", \"Cesárea\", \"Já passou pelo parto normal e pela cesárea\", \"Não se aplica\"]'),
(96, 4, 'Complicações?', 'text', NULL),
(97, 4, 'Utiliza contraceptivos? Qual (is)?', 'text', NULL),
(98, 4, 'Quantos dias duram o seu ciclo menstrual completo?', 'text', NULL),
(99, 4, 'Considera o ciclo regular?', 'radio', '[\"Sim\", \"Não\"]'),
(100, 4, 'Sente quando ovula? (Dor aguda ao lado do abdômen, onde está o ovário):', 'radio', '[\"Sim\", \"Não\"]'),
(101, 4, 'Quantos dias de sangramento?', 'radio', '[\"2 dias\", \"3 dias\", \"4 dias\", \"5 dias\", \"6 dias\", \"7 dias\", \"8 dias\", \"Mais de 8 dias\"]'),
(102, 4, 'Há presença de coágulos?', 'radio', '[\"Sim\", \"Não\"]'),
(103, 4, 'Presença de sintomas dos períodos Pré-Menstrual e Menstrual: Sente-se irritada, facilmente se estressa.:', 'radio', '[\"Sim\", \"Não\"]'),
(104, 4, 'Cefaleia (dor de cabeça).:', 'radio', '[\"Sim\", \"Não\"]'),
(105, 4, 'Aumento da acne:', 'radio', '[\"Sim\", \"Não\"]'),
(106, 4, 'Edema, sente-se inchada.:', 'radio', '[\"Sim\", \"Não\"]'),
(107, 4, 'Seios doloridos:', 'radio', '[\"Sim\", \"Não\"]'),
(108, 4, 'Constipação (intestino preso):', 'radio', '[\"Sim\", \"Não\"]'),
(109, 4, 'Diarreia:', 'radio', '[\"Sim\", \"Não\"]'),
(110, 4, 'Gases/passagem de gases?', 'radio', '[\"Sim\", \"Não\"]'),
(111, 4, 'Vômitos:', 'radio', '[\"Sim\", \"Não\"]'),
(112, 4, 'Naúseas:', 'radio', '[\"Sim\", \"Não\"]'),
(113, 4, 'Cólicas:', 'radio', '[\"Sim\", \"Não\"]'),
(114, 4, 'Intensidade:', 'text', NULL),
(115, 4, 'Para entender mais: Costuma comer em maior ou menor quantidade quando está triste, feliz ou angustiada?', 'radio', '[\"Sim\", \"Não\"]'),
(116, 4, 'Me conte um momento em que você \"comeu suas emoções\":', 'textarea', NULL),
(117, 4, 'Como você classificaria seus hábitos alimentares?', 'radio', '[\"Muito bons\", \"Bons\", \"Regulares\", \"Ruins\", \"Muito ruins\"]'),
(118, 4, 'Como você gostaria de classificar seus hábitos alimentares no final do tratamento?', 'radio', '[\"Muito bons\", \"Bons\", \"Regulares\", \"Ruins\", \"Muito ruins\"]'),
(119, 4, 'De 0 a 10, quanto você está comprometida?', 'radio', '[\"0\", \"1\", \"2\", \"3\", \"4\", \"5\", \"6\", \"7\", \"8\", \"9\", \"10\"]'),
(120, 4, 'O que falta para o seu comprometimento chegar no 10?', 'textarea', NULL),
(121, 4, 'O que eu posso fazer para te motivar ou manter motivada?', 'textarea', NULL),
(122, 4, 'Alguém será seu apoio nesta caminhada? Quem é essa pessoa?', 'text', NULL),
(123, 4, 'Escolha uma frase que vai dizer para si sempre que estiver desmotivada.:', 'text', NULL),
(124, 5, 'Alteração no peso nas últimas 2 semanas:', 'radio', '[\"Aumento do peso\", \"Diminuição do peso\", \"Sem alteração\"]'),
(125, 5, 'Perda total nos últimos 6 meses, em Kg e % perda:', 'textarea', NULL),
(126, 5, 'Alteração na ingestão alimentar:', 'radio', '[\"Sem alteração\", \"Alterada por semanas\"]'),
(127, 5, 'Caso haja alteração, por quantas semanas?', 'text', NULL),
(128, 5, 'Tipo de dieta:', 'radio', '[\"Dieta sólida sub-ótima\", \"Dieta líquida completa\", \"Líquidos hipocalóricos\", \"Inanição\"]'),
(129, 5, 'Sistemas gastrointestinais (que persistam por > 2 semanas):', 'checkbox', '[\"Nenhum\", \"Náusea\", \"Vômitos\", \"Diarreia\", \"Anorexia\"]'),
(130, 5, 'Mais de um sintoma presente:', 'radio', '[\"Sim\", \"Não\"]'),
(131, 5, 'Capacidade funcional:', 'radio', '[\"Sem disfunção (capacidade completa)\", \"Disfunção\"]'),
(132, 5, 'Duração da disfunção, em semanas:', 'text', NULL),
(133, 5, 'Situação da capacidade funcional:', 'radio', '[\"Trabalho subótimo\", \"Ambulatório\", \"Acamado\"]'),
(134, 5, 'Doença e sua relação com necessidades - Diagnóstico primário (especificar):', 'text', NULL),
(135, 5, 'Doença e sua relação com necessidades - Demanda metabólica (stress):', 'radio', '[\"Sem stress\", \"Baixo stress\", \"Stress moderado\", \"Stress elevado\"]'),
(136, 6, 'Minha primeira semana: Como se sentiu ao seguir as orientações?', 'textarea', NULL),
(137, 6, 'Teve alguma dificuldade na implementação do plano alimentar?', 'textarea', NULL),
(138, 6, 'Qual foi a sua maior vitória nesses últimos dias?', 'textarea', NULL),
(139, 6, 'O que gostaria que tivesse sido melhor? Existe algo que possamos melhorar?', 'textarea', NULL),
(140, 8, 'Quais alimentos você consome mais de uma vez ao dia? (Exemplos: refrigerante, chá, leite, pães, doces, etc.):', 'textarea', NULL),
(141, 8, 'Descreva os alimentos que fazem você se sentir mal ou te deixam doente.:', 'textarea', NULL),
(142, 8, 'Você fica acordado entre 01h00 e 05h00 da manhã com algum dos sintomas abaixo? Se sim, selecione todos eles.:', 'checkbox', '[\"Não possuo essa dificuldade.\", \"Dor de cabeça\", \"Tonturas\", \"Dores de estômago\", \"Inchaço\", \"Desejos alimentares\", \"Tosse seca\"]'),
(143, 8, 'Algum membro da sua família possui algum dos sintomas abaixo? Se sim, selecione todos.:', 'checkbox', '[\"Não\", \"Corrimento nasal, espirros, lacrimejamento e coceira dos olhos (todos juntos)\", \"Asma\", \"Urticária\", \"Dermatite crônica\", \"Enxaqueca\", \"Tonturas\", \"Dores de estômago\", \"Inchaço\", \"Tosse seca\", \"Problemas nos seios nasais\"]'),
(144, 8, 'Durante a infância, você teve... (selecione todos):', 'checkbox', '[\"Dermatite, corrimento nasal, espirros, lacrimejamento e coceira dos olhos (todos juntos)\", \"Asma\", \"Não apresentei esses sinais e sintomas\"]'),
(145, 8, 'Você teve problemas com cólicas intestinais quando bebê?', 'radio', '[\"Sim\", \"Não\", \"Não sei dizer\"]'),
(146, 8, 'Você tem coceiras na pele, no palato ou no céu da boca? Se sim, com que frequência isso ocorre?', 'radio', '[\"Não tenho\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(147, 8, 'Você já percebeu o corpo inchaço pela manhã? Selecione as áreas em que o inchaço ocorre.:', 'checkbox', '[\"Não percebi inchaço\", \"Tornozelos\", \"Pés\", \"Mãos\", \"Rosto\"]'),
(148, 8, 'Você já realizou uma refeição completa no meio do dia? (Exemplo: após a igreja ao domingo ou em um restaurante durante o dia):', 'radio', '[\"Sim\", \"Não\"]'),
(149, 8, 'Você já teve fadiga de 1 a 2 horas após a refeição? Se sim, com que frequência isso ocorre?', 'radio', '[\"Quase todas as vezes\", \"Metade do tempo\", \"Sem frequência\"]'),
(150, 8, 'Você já teve tosse seca?', 'radio', '[\"Sim\", \"Não\"]'),
(151, 8, 'Selecione quantas vezes você tosse em 24 horas.:', 'select', '[\"5\", \"10\", \"20\", \"30\", \"40\", \"50\", \"75\", \"100\", \"> 100\"]'),
(152, 8, 'Você come petiscos entre as refeições? Se sim, cite os alimentos abaixo.:', 'textarea', NULL),
(153, 8, 'Você tem resfriados excessivos quando uma mudança repentina de temperatura ocorre?', 'radio', '[\"Sim\", \"Não\"]'),
(154, 8, 'Você tem enxaquecas severas? Se sim, indique a frequência.:', 'radio', '[\"Não tenho\", \"Diariamente\", \"Mensalmente\", \"Semanalmente\", \"A maioria dos meses\"]'),
(155, 8, 'Você tem dores nos seios da face? Se sim, indique a frequência.:', 'radio', '[\"Não tenho\", \"Diariamente\", \"Mensalmente\", \"Semanalmente\", \"A maioria dos meses\"]'),
(156, 8, 'Você tem dores na nuca? Se sim, indique a frequência.:', 'radio', '[\"Não tenho\", \"Diariamente\", \"Mensalmente\", \"Semanalmente\", \"A maioria dos meses\"]'),
(157, 8, 'Você já teve gases, eructações, inchaço ou cólica após as refeições? Se sim, indique a frequência.:', 'radio', '[\"Não\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(158, 8, 'Você já notou dormência da face, braços ou pernas com intervalos periódicos sem causa aparente? Se sim, indique a frequência.:', 'radio', '[\"Não\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(159, 8, 'Você tem sonolência, dor de cabeça ou inchaço após a ingestão de coquetéis, cerveja ou vinho? Com que frequência?', 'textarea', NULL),
(160, 8, 'Você é alérgico (a) a penicilina?', 'radio', '[\"Sim\", \"Não\"]'),
(161, 8, 'Você já teve diarreia, mesmo leve ou intermitente? Se sim, indique a frequência.:', 'radio', '[\"Não\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(162, 8, 'Você já teve sintomas repetidos ao acordar, como dor de cabeça? Descreva os sintomas abaixo.:', 'textarea', NULL),
(163, 8, 'Esses sintomas desaparecem com a ingestão de algum alimento em particular, como café ou refrigerante de cola? Descreva os alimentos.:', 'textarea', NULL),
(164, 8, 'Existem outras reações ou problemas com outros alimentos? Descreva os alimentos.:', 'textarea', NULL),
(165, 8, 'Você já pigarreou? Com que frequência ocorre? Selecione abaixo diariamente, semanalmente ou mensal e a frequência por dia.:', 'select', '[\"Diariamente\", \"Semanalmente\", \"Mensalmente\", \"1-2x por dia\", \"5x por dia\", \"10x por dia\", \"30x por dia\", \"40x por dia\", \"50x por dia\", \"75x por dia\", \"100x por dia\", \"> 100x por dia\"]'),
(166, 8, 'Você já sentiu tonturas com uma sensação de movimento?', 'radio', '[\"Sim\", \"Não\"]'),
(167, 8, 'Isto ocorre com a fala?', 'radio', '[\"Sim\", \"Não\", \"Não sinto tonturas\"]'),
(168, 8, 'Quando você move a cabeça?', 'radio', '[\"Sim\", \"Não\", \"Não sinto tonturas\"]'),
(169, 8, 'Qual o tempo médio da fala sem parar?', 'select', '[\"5-10 seg\", \"1-2 min\", \"15 - 30 min\", \"> 1 hora\"]'),
(170, 8, 'O seu peso aumentou ou diminuiu em média 2 Kg em um período de 1 semana?', 'radio', '[\"Sim\", \"Não\", \"Não sei dizer\"]'),
(171, 7, 'Qual foi a meta 1 que definimos juntos?', 'text', NULL),
(172, 7, 'Realizei 100% da meta 1:', 'radio', '[\"Sim\", \"Não\"]'),
(173, 7, 'Qual foi a meta 2 que definimos juntos?', 'text', NULL),
(174, 7, 'Realizei 100% da meta 2:', 'radio', '[\"Sim\", \"Não\"]'),
(175, 7, 'Qual foi a meta 3 que definimos juntos?', 'text', NULL),
(176, 7, 'Realizei 100% da meta 3:', 'radio', '[\"Sim\", \"Não\"]'),
(201, 7, 'Coloque a seguir quais os benefícios e conquistas observou no intervalo da 1 a 2 consulta:', 'textarea', NULL),
(202, 7, 'Coloque a seguir quais os benefícios e conquistas observou no intervalo da 2 a 3 consulta:', 'textarea', NULL),
(203, 7, 'Coloque a seguir quais os benefícios e conquistas observou no intervalo da 3 a 4 consulta:', 'textarea', NULL),
(204, 7, 'Coloque a seguir quais os benefícios e conquistas observou no intervalo da 4 a 5 consulta:', 'textarea', NULL),
(205, 9, 'Sensação de desmaio:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(206, 9, 'Tonturas:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(207, 9, 'Insônia:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(208, 9, 'Olhos lacrimejantes ou coçando:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(209, 9, 'Olhos inchados, vermelhos ou com os cílios colando:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(210, 9, 'Bolsas ou olheiras abaixo dos olhos:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(211, 9, 'Visão borrada ou em túnel (não inclui miopia ou astigmatismo):', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(212, 9, 'Coceiras no ouvido:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(213, 9, 'Dores de ouvido, infecções auditivas:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(214, 9, 'Retirada de fluido purulento do ouvido:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(215, 9, 'Zunido, perda de audição:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(216, 9, 'Nariz entupido:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(217, 9, 'Problemas de Seios Nasais (Sinusite):', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(218, 9, 'Corrimento nasal, espirros, lacrimejamento e coceira dos olhos (todos juntos):', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(219, 9, 'Ataques de espirros:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(220, 9, 'Excessiva formação de muco:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(221, 9, 'Tosse crônica:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(222, 9, 'Freqüente necessidade de limpar a garganta:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(223, 9, 'Dor de garganta, rouquidão ou perda de voz:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(224, 9, 'Língua, gengivas ou lábios inchados/ descoloridos:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(225, 9, 'Aftas:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(226, 9, 'Acne:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(227, 9, 'Feridas que coçam, erupções ou pele seca:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(228, 9, 'Perda de cabelo:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(229, 9, 'Vermelhidão, calorões:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(230, 9, 'Suor excessivo:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(231, 9, 'Batidas cardíacas irregulares ou falhando:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(232, 9, 'Batidas cardíacas rápidas demais:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(233, 9, 'Dor no peito:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(234, 9, 'Congestão no peito:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(235, 9, 'Asma, bronquite:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(236, 9, 'Pouco fôlego:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(237, 9, 'Dificuldade para respirar:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(238, 9, 'Náuseas, vômitos:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(239, 9, 'Diarréia:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(240, 9, 'Constipação, prisão de ventre:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(241, 9, 'Sente-se inchado, com abdômen distendido:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(242, 9, 'Arrotos e/ou gases intestinais:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(243, 9, 'Azia:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(244, 9, 'Dor estomacal / intestinal:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(245, 9, 'Dores articulares:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(246, 9, 'Artrite / artrose:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(247, 9, 'Rigidez ou limitação dos movimentos:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(248, 9, 'Dores musculares:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(249, 9, 'Sensação de fraqueza ou cansaço:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(250, 9, 'Fadiga, moleza:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(251, 9, 'Apatia, letargia:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(252, 9, 'Hiperatividade:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(253, 9, 'Dificuldade de descansar, relaxar:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(254, 9, 'Memória ruim:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(255, 9, 'Confusão mental, compreensão ruim:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(256, 9, 'Concentração ruim:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(257, 9, 'Fraca coordenação motora:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(258, 9, 'Dificuldade em tomar decisões:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(259, 9, 'Fala com repetições de sons ou palavras, com várias pausas involuntárias:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(260, 9, 'Pronuncia palavras de forma indistinta, confusa:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(261, 9, 'Problemas de aprendizagem:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(262, 9, 'Mudanças de humor:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(263, 9, 'Ansiedade, medo e nervosismo:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(264, 9, 'Raiva, irritabilidade, agressividade:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(265, 9, 'Depressão:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(266, 9, 'Freqüentemente doente:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(267, 9, 'Freqüente ou urgente vontade de urinar:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(268, 9, 'Coceira genital ou corrimento:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(269, 9, 'Edema / Inchaço - Pés / Pernas / Mãos:', 'radio', '[\"Nunca ou quase nunca teve o sintoma\", \"Ocasionalmente teve, efeito não foi severo\", \"Ocasionalmente teve, efeito foi severo\", \"Frequentemente teve, efeito não foi severo\", \"Frequentemente teve, efeito foi severo\"]'),
(270, 10, 'Diminuição do volume da urina e frequência da secreção:', 'radio', '[\"Não\", \"Sim\"]'),
(271, 10, 'Queimação ao urinar:', 'radio', '[\"Não\", \"Sim\"]'),
(272, 10, 'Infecção urinária recorrente:', 'radio', '[\"Não\", \"Sim\"]'),
(273, 10, 'Urina com coloração escura ou com sangue:', 'radio', '[\"Não\", \"Sim\"]'),
(274, 10, 'Dores Articulares:', 'radio', '[\"Não\", \"Sim\"]'),
(275, 10, 'Artrite:', 'radio', '[\"Não\", \"Sim\"]'),
(276, 10, 'Artrose:', 'radio', '[\"Não\", \"Sim\"]'),
(277, 10, 'Osteopenia (Seu médico já disse que você tem perda leve de massa óssea?):', 'radio', '[\"Não\", \"Sim\"]'),
(278, 10, 'Osteoporose:', 'radio', '[\"Não\", \"Sim\"]'),
(279, 10, 'Lúpus:', 'radio', '[\"Não\", \"Sim\"]'),
(280, 10, 'Inchaço nos tornozelos e pulsos:', 'radio', '[\"Não\", \"Sim\"]'),
(281, 10, 'Gota:', 'radio', '[\"Não\", \"Sim\"]'),
(282, 10, 'Hipertireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(283, 10, 'Hipotireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(284, 10, 'Nódulo:', 'radio', '[\"Não\", \"Sim\"]'),
(285, 10, 'Boqueira (feridas no canto da boca):', 'radio', '[\"Não\", \"Sim\"]'),
(286, 10, 'Halitose (mau hálito):', 'radio', '[\"Não\", \"Sim\"]'),
(287, 10, 'Boca seca:', 'radio', '[\"Não\", \"Sim\"]'),
(288, 10, 'Aftas:', 'radio', '[\"Não\", \"Sim\"]'),
(289, 10, 'Coceira no céu da boca:', 'radio', '[\"Não\", \"Sim\"]'),
(290, 10, 'Diminuição no paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(291, 10, 'Bruxismo:', 'radio', '[\"Não\", \"Sim\"]'),
(292, 10, 'Vermelha, Lisa e Dolorida:', 'radio', '[\"Não\", \"Sim\"]'),
(293, 10, 'Pálida e Lisa:', 'radio', '[\"Não\", \"Sim\"]'),
(294, 10, 'Ardência na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(295, 10, 'Rachaduras na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(296, 10, 'Língua Branca:', 'radio', '[\"Não\", \"Sim\"]'),
(297, 10, 'Prejuízo do paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(298, 10, 'Secos, Quebradiços, Rachados:', 'radio', '[\"Não\", \"Sim\"]'),
(299, 10, 'Grossos, Vermelhos, Doloridos:', 'radio', '[\"Não\", \"Sim\"]'),
(300, 10, 'Herpes:', 'radio', '[\"Não\", \"Sim\"]'),
(301, 10, 'Grossas e Espessas:', 'radio', '[\"Não\", \"Sim\"]'),
(302, 10, 'Frágeis, Quebradiças e Descamativas:', 'radio', '[\"Não\", \"Sim\"]'),
(303, 10, 'Manchas Brancas:', 'radio', '[\"Não\", \"Sim\"]'),
(304, 10, 'Estriadas:', 'radio', '[\"Não\", \"Sim\"]'),
(305, 10, 'Amareladas:', 'radio', '[\"Não\", \"Sim\"]'),
(306, 10, 'Histórico de Micoses:', 'radio', '[\"Não\", \"Sim\"]'),
(307, 10, 'Zumbido ininterrupto:', 'radio', '[\"Não\", \"Sim\"]'),
(308, 10, 'Dificuldade de Audição:', 'radio', '[\"Não\", \"Sim\"]'),
(309, 10, 'Palpitação/ taquicardia:', 'radio', '[\"Não\", \"Sim\"]'),
(310, 10, 'Dificuldade de Respirar:', 'radio', '[\"Não\", \"Sim\"]'),
(311, 10, 'Respiração curta:', 'radio', '[\"Não\", \"Sim\"]'),
(312, 10, 'Dor no peito:', 'radio', '[\"Não\", \"Sim\"]'),
(313, 10, 'Retenção de Líquidos:', 'radio', '[\"Não\", \"Sim\"]'),
(314, 10, 'Arritmia:', 'radio', '[\"Não\", \"Sim\"]'),
(315, 10, 'Doenças coronarianas:', 'radio', '[\"Sim\", \"Não\"]'),
(316, 10, 'Descreva aqui caso tenha algum problema cardíaco:', 'textarea', NULL),
(317, 10, 'Rinite:', 'radio', '[\"Não\", \"Sim\"]'),
(318, 10, 'Sinusite:', 'radio', '[\"Não\", \"Sim\"]'),
(319, 10, 'Asma:', 'radio', '[\"Não\", \"Sim\"]'),
(320, 10, 'Bronquite:', 'radio', '[\"Não\", \"Sim\"]'),
(321, 10, 'Outros:', 'radio', '[\"Não\", \"Sim\"]'),
(322, 10, 'Se sim, descreva quais.:', 'textarea', NULL),
(323, 10, 'Falta de Apetite:', 'radio', '[\"Não\", \"Sim\"]'),
(324, 10, 'Náuseas:', 'radio', '[\"Não\", \"Sim\"]'),
(325, 10, 'Vômitos:', 'radio', '[\"Não\", \"Sim\"]'),
(326, 10, 'Dificuldade para engolir os alimentos:', 'radio', '[\"Não\", \"Sim\"]'),
(327, 10, 'Refluxo:', 'radio', '[\"Não\", \"Sim\"]'),
(328, 10, 'Azia (Queimação no Estômago e/ou Esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(329, 10, 'Eructação em excesso (arrotos em excesso):', 'radio', '[\"Não\", \"Sim\"]'),
(330, 10, 'Esofagite (inflamação do esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(331, 10, 'Hérnia de Hiato:', 'radio', '[\"Não\", \"Sim\"]'),
(332, 10, 'Gastrite:', 'radio', '[\"Não\", \"Sim\"]'),
(333, 10, 'Dor no Estômago:', 'radio', '[\"Não\", \"Sim\"]'),
(334, 10, 'Indigestão:', 'radio', '[\"Não\", \"Sim\"]'),
(335, 10, 'Flatulência (gases) imediatamente após a refeição:', 'radio', '[\"Não\", \"Sim\"]'),
(336, 10, 'Sensação de empachamento após comer:', 'radio', '[\"Não\", \"Sim\"]'),
(337, 10, 'Gases com dor abdominal:', 'radio', '[\"Não\", \"Sim\"]'),
(338, 10, 'Distensão Abdominal:', 'radio', '[\"Não\", \"Sim\"]'),
(339, 10, 'Dor no ânus:', 'radio', '[\"Não\", \"Sim\"]'),
(340, 10, 'Evacuar com dificuldade:', 'radio', '[\"Não\", \"Sim\"]'),
(341, 10, 'Constipação (Intestino preso):', 'radio', '[\"Não\", \"Sim\"]'),
(342, 10, 'Uso de laxante, chás, purgativos:', 'radio', '[\"Não\", \"Sim\"]'),
(343, 10, 'Diarreia:', 'radio', '[\"Não\", \"Sim\"]'),
(344, 10, 'Sensação de Evacuação Incompleta:', 'radio', '[\"Não\", \"Sim\"]'),
(345, 10, 'Coceira e prurido anal:', 'radio', '[\"Não\", \"Sim\"]'),
(346, 10, 'Hemorróida:', 'radio', '[\"Não\", \"Sim\"]'),
(347, 10, 'Quantas vezes por dia e/ou semana evacua?', 'text', NULL),
(348, 10, 'Coco em forma de banana marrom:', 'radio', '[\"Não\", \"Sim\"]'),
(349, 10, 'Coco em forma de bolinhas:', 'radio', '[\"Não\", \"Sim\"]'),
(350, 10, 'Coco Pastoso:', 'radio', '[\"Não\", \"Sim\"]'),
(351, 10, 'Suores Noturnos:', 'radio', '[\"Não\", \"Sim\"]'),
(352, 10, 'Tontura/ Vertigem/ Zonzeira:', 'radio', '[\"Não\", \"Sim\"]'),
(353, 10, 'Dores generalizadas:', 'radio', '[\"Não\", \"Sim\"]'),
(354, 10, 'Diabetes:', 'radio', '[\"Não\", \"Sim\"]'),
(355, 10, 'Inflamação Crônica (Ouvido? Garganta? Outros):', 'radio', '[\"Não\", \"Sim\"]'),
(356, 10, 'Se sim, descreva:', 'textarea', NULL),
(357, 10, 'Falta de energia:', 'radio', '[\"Não\", \"Sim\"]'),
(358, 10, 'Perda de Peso nos últimos 3 meses:', 'radio', '[\"Não\", \"Sim\"]'),
(359, 10, 'Sensibilidade ao Frio:', 'radio', '[\"Não\", \"Sim\"]'),
(360, 10, 'Aumento de Peso:', 'radio', '[\"Não\", \"Sim\"]'),
(361, 10, 'Hipertensão arterial (pressão alta):', 'radio', '[\"Não\", \"Sim\"]'),
(362, 10, 'Pressão Baixa (hipotensão arterial):', 'radio', '[\"Não\", \"Sim\"]'),
(363, 10, 'Anemia:', 'radio', '[\"Não\", \"Sim\"]'),
(364, 10, 'Sudorese Excessiva:', 'radio', '[\"Não\", \"Sim\"]'),
(365, 10, 'Hipersensibilidade a ruídos:', 'radio', '[\"Não\", \"Sim\"]'),
(366, 10, 'Diminuição do volume da urina e frequência da secreção:', 'radio', '[\"Não\", \"Sim\"]'),
(367, 10, 'Queimação ao urinar:', 'radio', '[\"Não\", \"Sim\"]'),
(368, 10, 'Infecção urinária recorrente:', 'radio', '[\"Não\", \"Sim\"]'),
(369, 10, 'Urina com coloração escura ou com sangue:', 'radio', '[\"Não\", \"Sim\"]'),
(370, 10, 'Dores Articulares:', 'radio', '[\"Não\", \"Sim\"]'),
(371, 10, 'Artrite:', 'radio', '[\"Não\", \"Sim\"]'),
(372, 10, 'Artrose:', 'radio', '[\"Não\", \"Sim\"]'),
(373, 10, 'Osteopenia (Seu médico já disse que você tem perda leve de massa óssea?):', 'radio', '[\"Não\", \"Sim\"]'),
(374, 10, 'Osteoporose:', 'radio', '[\"Não\", \"Sim\"]'),
(375, 10, 'Lúpus:', 'radio', '[\"Não\", \"Sim\"]'),
(376, 10, 'Inchaço nos tornozelos e pulsos:', 'radio', '[\"Não\", \"Sim\"]'),
(377, 10, 'Gota:', 'radio', '[\"Não\", \"Sim\"]'),
(378, 10, 'Hipertireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(379, 10, 'Hipotireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(380, 10, 'Nódulo:', 'radio', '[\"Não\", \"Sim\"]'),
(381, 10, 'Boqueira (feridas no canto da boca):', 'radio', '[\"Não\", \"Sim\"]'),
(382, 10, 'Halitose (mau hálito):', 'radio', '[\"Não\", \"Sim\"]'),
(383, 10, 'Boca seca:', 'radio', '[\"Não\", \"Sim\"]'),
(384, 10, 'Aftas:', 'radio', '[\"Não\", \"Sim\"]'),
(385, 10, 'Coceira no céu da boca:', 'radio', '[\"Não\", \"Sim\"]'),
(386, 10, 'Diminuição no paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(387, 10, 'Bruxismo:', 'radio', '[\"Não\", \"Sim\"]'),
(388, 10, 'Vermelha, Lisa e Dolorida:', 'radio', '[\"Não\", \"Sim\"]'),
(389, 10, 'Pálida e Lisa:', 'radio', '[\"Não\", \"Sim\"]'),
(390, 10, 'Ardência na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(391, 10, 'Rachaduras na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(392, 10, 'Língua Branca:', 'radio', '[\"Não\", \"Sim\"]'),
(393, 10, 'Prejuízo do paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(394, 10, 'Secos, Quebradiços, Rachados:', 'radio', '[\"Não\", \"Sim\"]'),
(395, 10, 'Grossos, Vermelhos, Doloridos:', 'radio', '[\"Não\", \"Sim\"]'),
(396, 10, 'Herpes:', 'radio', '[\"Não\", \"Sim\"]'),
(397, 10, 'Grossas e Espessas:', 'radio', '[\"Não\", \"Sim\"]'),
(398, 10, 'Frágeis, Quebradiças e Descamativas:', 'radio', '[\"Não\", \"Sim\"]'),
(399, 10, 'Manchas Brancas:', 'radio', '[\"Não\", \"Sim\"]'),
(400, 10, 'Estriadas:', 'radio', '[\"Não\", \"Sim\"]'),
(401, 10, 'Amareladas:', 'radio', '[\"Não\", \"Sim\"]'),
(402, 10, 'Histórico de Micoses:', 'radio', '[\"Não\", \"Sim\"]'),
(403, 10, 'Zumbido ininterrupto:', 'radio', '[\"Não\", \"Sim\"]'),
(404, 10, 'Dificuldade de Audição:', 'radio', '[\"Não\", \"Sim\"]'),
(405, 10, 'Palpitação/ taquicardia:', 'radio', '[\"Não\", \"Sim\"]'),
(406, 10, 'Dificuldade de Respirar:', 'radio', '[\"Não\", \"Sim\"]'),
(407, 10, 'Respiração curta:', 'radio', '[\"Não\", \"Sim\"]'),
(408, 10, 'Dor no peito:', 'radio', '[\"Não\", \"Sim\"]'),
(409, 10, 'Retenção de Líquidos:', 'radio', '[\"Não\", \"Sim\"]'),
(410, 10, 'Arritmia:', 'radio', '[\"Não\", \"Sim\"]'),
(411, 10, 'Doenças coronarianas:', 'radio', '[\"Sim\", \"Não\"]'),
(412, 10, 'Descreva aqui caso tenha algum problema cardíaco:', 'textarea', NULL),
(413, 10, 'Rinite:', 'radio', '[\"Não\", \"Sim\"]'),
(414, 10, 'Sinusite:', 'radio', '[\"Não\", \"Sim\"]'),
(415, 10, 'Asma:', 'radio', '[\"Não\", \"Sim\"]'),
(416, 10, 'Bronquite:', 'radio', '[\"Não\", \"Sim\"]'),
(417, 10, 'Outros:', 'radio', '[\"Não\", \"Sim\"]'),
(418, 10, 'Se sim, descreva quais.:', 'textarea', NULL),
(419, 10, 'Falta de Apetite:', 'radio', '[\"Não\", \"Sim\"]'),
(420, 10, 'Náuseas:', 'radio', '[\"Não\", \"Sim\"]'),
(421, 10, 'Vômitos:', 'radio', '[\"Não\", \"Sim\"]'),
(422, 10, 'Dificuldade para engolir os alimentos:', 'radio', '[\"Não\", \"Sim\"]'),
(423, 10, 'Refluxo:', 'radio', '[\"Não\", \"Sim\"]'),
(424, 10, 'Azia (Queimação no Estômago e/ou Esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(425, 10, 'Eructação em excesso (arrotos em excesso):', 'radio', '[\"Não\", \"Sim\"]'),
(426, 10, 'Esofagite (inflamação do esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(427, 10, 'Hérnia de Hiato:', 'radio', '[\"Não\", \"Sim\"]'),
(428, 10, 'Gastrite:', 'radio', '[\"Não\", \"Sim\"]'),
(429, 10, 'Dor no Estômago:', 'radio', '[\"Não\", \"Sim\"]'),
(430, 10, 'Indigestão:', 'radio', '[\"Não\", \"Sim\"]'),
(431, 10, 'Flatulência (gases) imediatamente após a refeição:', 'radio', '[\"Não\", \"Sim\"]'),
(432, 10, 'Sensação de empachamento após comer:', 'radio', '[\"Não\", \"Sim\"]'),
(433, 10, 'Gases com dor abdominal:', 'radio', '[\"Não\", \"Sim\"]');
INSERT INTO `questionnaire_questions` (`id`, `questionnaire_id`, `question`, `type`, `options`) VALUES
(434, 10, 'Distensão Abdominal:', 'radio', '[\"Não\", \"Sim\"]'),
(435, 10, 'Dor no ânus:', 'radio', '[\"Não\", \"Sim\"]'),
(436, 10, 'Evacuar com dificuldade:', 'radio', '[\"Não\", \"Sim\"]'),
(437, 10, 'Constipação (Intestino preso):', 'radio', '[\"Não\", \"Sim\"]'),
(438, 10, 'Uso de laxante, chás, purgativos:', 'radio', '[\"Não\", \"Sim\"]'),
(439, 10, 'Diarreia:', 'radio', '[\"Não\", \"Sim\"]'),
(440, 10, 'Sensação de Evacuação Incompleta:', 'radio', '[\"Não\", \"Sim\"]'),
(441, 10, 'Coceira e prurido anal:', 'radio', '[\"Não\", \"Sim\"]'),
(442, 10, 'Hemorróida:', 'radio', '[\"Não\", \"Sim\"]'),
(443, 10, 'Quantas vezes por dia e/ou semana evacua?', 'text', NULL),
(444, 10, 'Coco em forma de banana marrom:', 'radio', '[\"Não\", \"Sim\"]'),
(445, 10, 'Coco em forma de bolinhas:', 'radio', '[\"Não\", \"Sim\"]'),
(446, 10, 'Coco Pastoso:', 'radio', '[\"Não\", \"Sim\"]'),
(447, 10, 'Suores Noturnos:', 'radio', '[\"Não\", \"Sim\"]'),
(448, 10, 'Tontura/ Vertigem/ Zonzeira:', 'radio', '[\"Não\", \"Sim\"]'),
(449, 10, 'Dores generalizadas:', 'radio', '[\"Não\", \"Sim\"]'),
(450, 10, 'Diabetes:', 'radio', '[\"Não\", \"Sim\"]'),
(451, 10, 'Inflamação Crônica (Ouvido? Garganta? Outros):', 'radio', '[\"Não\", \"Sim\"]'),
(452, 10, 'Se sim, descreva:', 'textarea', NULL),
(453, 10, 'Falta de energia:', 'radio', '[\"Não\", \"Sim\"]'),
(454, 10, 'Perda de Peso nos últimos 3 meses:', 'radio', '[\"Não\", \"Sim\"]'),
(455, 10, 'Sensibilidade ao Frio:', 'radio', '[\"Não\", \"Sim\"]'),
(456, 10, 'Aumento de Peso:', 'radio', '[\"Não\", \"Sim\"]'),
(457, 10, 'Hipertensão arterial (pressão alta):', 'radio', '[\"Não\", \"Sim\"]'),
(458, 10, 'Pressão Baixa (hipotensão arterial):', 'radio', '[\"Não\", \"Sim\"]'),
(459, 10, 'Anemia:', 'radio', '[\"Não\", \"Sim\"]'),
(460, 10, 'Sudorese Excessiva:', 'radio', '[\"Não\", \"Sim\"]'),
(461, 10, 'Hipersensibilidade a ruídos:', 'radio', '[\"Não\", \"Sim\"]'),
(462, 10, 'Diminuição do volume da urina e frequência da secreção:', 'radio', '[\"Não\", \"Sim\"]'),
(463, 10, 'Queimação ao urinar:', 'radio', '[\"Não\", \"Sim\"]'),
(464, 10, 'Infecção urinária recorrente:', 'radio', '[\"Não\", \"Sim\"]'),
(465, 10, 'Urina com coloração escura ou com sangue:', 'radio', '[\"Não\", \"Sim\"]'),
(466, 10, 'Dores Articulares:', 'radio', '[\"Não\", \"Sim\"]'),
(467, 10, 'Artrite:', 'radio', '[\"Não\", \"Sim\"]'),
(468, 10, 'Artrose:', 'radio', '[\"Não\", \"Sim\"]'),
(469, 10, 'Osteopenia (Seu médico já disse que você tem perda leve de massa óssea?):', 'radio', '[\"Não\", \"Sim\"]'),
(470, 10, 'Osteoporose:', 'radio', '[\"Não\", \"Sim\"]'),
(471, 10, 'Lúpus:', 'radio', '[\"Não\", \"Sim\"]'),
(472, 10, 'Inchaço nos tornozelos e pulsos:', 'radio', '[\"Não\", \"Sim\"]'),
(473, 10, 'Gota:', 'radio', '[\"Não\", \"Sim\"]'),
(474, 10, 'Hipertireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(475, 10, 'Hipotireoidismo:', 'radio', '[\"Não\", \"Sim\"]'),
(476, 10, 'Nódulo:', 'radio', '[\"Não\", \"Sim\"]'),
(477, 10, 'Boqueira (feridas no canto da boca):', 'radio', '[\"Não\", \"Sim\"]'),
(478, 10, 'Halitose (mau hálito):', 'radio', '[\"Não\", \"Sim\"]'),
(479, 10, 'Boca seca:', 'radio', '[\"Não\", \"Sim\"]'),
(480, 10, 'Aftas:', 'radio', '[\"Não\", \"Sim\"]'),
(481, 10, 'Coceira no céu da boca:', 'radio', '[\"Não\", \"Sim\"]'),
(482, 10, 'Diminuição no paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(483, 10, 'Bruxismo:', 'radio', '[\"Não\", \"Sim\"]'),
(484, 10, 'Vermelha, Lisa e Dolorida:', 'radio', '[\"Não\", \"Sim\"]'),
(485, 10, 'Pálida e Lisa:', 'radio', '[\"Não\", \"Sim\"]'),
(486, 10, 'Ardência na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(487, 10, 'Rachaduras na Língua:', 'radio', '[\"Não\", \"Sim\"]'),
(488, 10, 'Língua Branca:', 'radio', '[\"Não\", \"Sim\"]'),
(489, 10, 'Prejuízo do paladar:', 'radio', '[\"Não\", \"Sim\"]'),
(490, 10, 'Secos, Quebradiços, Rachados:', 'radio', '[\"Não\", \"Sim\"]'),
(491, 10, 'Grossos, Vermelhos, Doloridos:', 'radio', '[\"Não\", \"Sim\"]'),
(492, 10, 'Herpes:', 'radio', '[\"Não\", \"Sim\"]'),
(493, 10, 'Grossas e Espessas:', 'radio', '[\"Não\", \"Sim\"]'),
(494, 10, 'Frágeis, Quebradiças e Descamativas:', 'radio', '[\"Não\", \"Sim\"]'),
(495, 10, 'Manchas Brancas:', 'radio', '[\"Não\", \"Sim\"]'),
(496, 10, 'Estriadas:', 'radio', '[\"Não\", \"Sim\"]'),
(497, 10, 'Amareladas:', 'radio', '[\"Não\", \"Sim\"]'),
(498, 10, 'Histórico de Micoses:', 'radio', '[\"Não\", \"Sim\"]'),
(499, 10, 'Zumbido ininterrupto:', 'radio', '[\"Não\", \"Sim\"]'),
(500, 10, 'Dificuldade de Audição:', 'radio', '[\"Não\", \"Sim\"]'),
(501, 10, 'Palpitação/ taquicardia:', 'radio', '[\"Não\", \"Sim\"]'),
(502, 10, 'Dificuldade de Respirar:', 'radio', '[\"Não\", \"Sim\"]'),
(503, 10, 'Respiração curta:', 'radio', '[\"Não\", \"Sim\"]'),
(504, 10, 'Dor no peito:', 'radio', '[\"Não\", \"Sim\"]'),
(505, 10, 'Retenção de Líquidos:', 'radio', '[\"Não\", \"Sim\"]'),
(506, 10, 'Arritmia:', 'radio', '[\"Não\", \"Sim\"]'),
(507, 10, 'Doenças coronarianas:', 'radio', '[\"Sim\", \"Não\"]'),
(508, 10, 'Descreva aqui caso tenha algum problema cardíaco:', 'textarea', NULL),
(509, 10, 'Rinite:', 'radio', '[\"Não\", \"Sim\"]'),
(510, 10, 'Sinusite:', 'radio', '[\"Não\", \"Sim\"]'),
(511, 10, 'Asma:', 'radio', '[\"Não\", \"Sim\"]'),
(512, 10, 'Bronquite:', 'radio', '[\"Não\", \"Sim\"]'),
(513, 10, 'Outros:', 'radio', '[\"Não\", \"Sim\"]'),
(514, 10, 'Se sim, descreva quais.:', 'textarea', NULL),
(515, 10, 'Falta de Apetite:', 'radio', '[\"Não\", \"Sim\"]'),
(516, 10, 'Náuseas:', 'radio', '[\"Não\", \"Sim\"]'),
(517, 10, 'Vômitos:', 'radio', '[\"Não\", \"Sim\"]'),
(518, 10, 'Dificuldade para engolir os alimentos:', 'radio', '[\"Não\", \"Sim\"]'),
(519, 10, 'Refluxo:', 'radio', '[\"Não\", \"Sim\"]'),
(520, 10, 'Azia (Queimação no Estômago e/ou Esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(521, 10, 'Eructação em excesso (arrotos em excesso):', 'radio', '[\"Não\", \"Sim\"]'),
(522, 10, 'Esofagite (inflamação do esôfago):', 'radio', '[\"Não\", \"Sim\"]'),
(523, 10, 'Hérnia de Hiato:', 'radio', '[\"Não\", \"Sim\"]'),
(524, 10, 'Gastrite:', 'radio', '[\"Não\", \"Sim\"]'),
(525, 10, 'Dor no Estômago:', 'radio', '[\"Não\", \"Sim\"]'),
(526, 10, 'Indigestão:', 'radio', '[\"Não\", \"Sim\"]'),
(527, 10, 'Flatulência (gases) imediatamente após a refeição:', 'radio', '[\"Não\", \"Sim\"]'),
(528, 10, 'Sensação de empachamento após comer:', 'radio', '[\"Não\", \"Sim\"]'),
(529, 10, 'Gases com dor abdominal:', 'radio', '[\"Não\", \"Sim\"]'),
(530, 10, 'Distensão Abdominal:', 'radio', '[\"Não\", \"Sim\"]'),
(531, 10, 'Dor no ânus:', 'radio', '[\"Não\", \"Sim\"]'),
(532, 10, 'Evacuar com dificuldade:', 'radio', '[\"Não\", \"Sim\"]'),
(533, 10, 'Constipação (Intestino preso):', 'radio', '[\"Não\", \"Sim\"]'),
(534, 10, 'Uso de laxante, chás, purgativos:', 'radio', '[\"Não\", \"Sim\"]'),
(535, 10, 'Diarreia:', 'radio', '[\"Não\", \"Sim\"]'),
(536, 10, 'Sensação de Evacuação Incompleta:', 'radio', '[\"Não\", \"Sim\"]'),
(537, 10, 'Coceira e prurido anal:', 'radio', '[\"Não\", \"Sim\"]'),
(538, 10, 'Hemorróida:', 'radio', '[\"Não\", \"Sim\"]'),
(539, 10, 'Quantas vezes por dia e/ou semana evacua?', 'text', NULL),
(540, 10, 'Coco em forma de banana marrom:', 'radio', '[\"Não\", \"Sim\"]'),
(541, 10, 'Coco em forma de bolinhas:', 'radio', '[\"Não\", \"Sim\"]'),
(542, 10, 'Coco Pastoso:', 'radio', '[\"Não\", \"Sim\"]'),
(543, 10, 'Suores Noturnos:', 'radio', '[\"Não\", \"Sim\"]'),
(544, 10, 'Tontura/ Vertigem/ Zonzeira:', 'radio', '[\"Não\", \"Sim\"]'),
(545, 10, 'Dores generalizadas:', 'radio', '[\"Não\", \"Sim\"]'),
(546, 10, 'Diabetes:', 'radio', '[\"Não\", \"Sim\"]'),
(547, 10, 'Inflamação Crônica (Ouvido? Garganta? Outros):', 'radio', '[\"Não\", \"Sim\"]'),
(548, 10, 'Se sim, descreva:', 'textarea', NULL),
(549, 10, 'Falta de energia:', 'radio', '[\"Não\", \"Sim\"]'),
(550, 10, 'Perda de Peso nos últimos 3 meses:', 'radio', '[\"Não\", \"Sim\"]'),
(551, 10, 'Sensibilidade ao Frio:', 'radio', '[\"Não\", \"Sim\"]'),
(552, 10, 'Aumento de Peso:', 'radio', '[\"Não\", \"Sim\"]'),
(553, 10, 'Hipertensão arterial (pressão alta):', 'radio', '[\"Não\", \"Sim\"]'),
(554, 10, 'Pressão Baixa (hipotensão arterial):', 'radio', '[\"Não\", \"Sim\"]'),
(555, 10, 'Anemia:', 'radio', '[\"Não\", \"Sim\"]'),
(556, 10, 'Sudorese Excessiva:', 'radio', '[\"Não\", \"Sim\"]'),
(557, 10, 'Hipersensibilidade a ruídos:', 'radio', '[\"Não\", \"Sim\"]'),
(558, 10, 'Dor de cabeça:', 'radio', '[\"Não\", \"Sim\"]'),
(559, 10, 'Enxaqueca:', 'radio', '[\"Não\", \"Sim\"]'),
(560, 10, 'Confusão Mental:', 'radio', '[\"Não\", \"Sim\"]'),
(561, 10, 'Desorientação:', 'radio', '[\"Não\", \"Sim\"]'),
(562, 10, 'Sonolência Diurna:', 'radio', '[\"Não\", \"Sim\"]'),
(563, 10, 'Dificuldade de pegar no sono (insônia):', 'radio', '[\"Não\", \"Sim\"]'),
(564, 10, 'Labirintite:', 'radio', '[\"Não\", \"Sim\"]'),
(565, 10, 'Pesadelos/ Sono Agitado:', 'radio', '[\"Não\", \"Sim\"]'),
(566, 10, 'Acorda cansado:', 'radio', '[\"Não\", \"Sim\"]'),
(567, 10, 'Desequilíbrio:', 'radio', '[\"Não\", \"Sim\"]'),
(568, 10, 'Diminuição da memória:', 'radio', '[\"Não\", \"Sim\"]'),
(569, 10, 'Dificuldade de aprendizagem:', 'radio', '[\"Não\", \"Sim\"]'),
(570, 10, 'Sensibilidade aumentada à dor:', 'radio', '[\"Não\", \"Sim\"]'),
(571, 10, 'Convulsões:', 'radio', '[\"Não\", \"Sim\"]'),
(572, 10, 'Diminuição da Concentração:', 'radio', '[\"Não\", \"Sim\"]'),
(573, 10, 'Síndrome do Pânico:', 'radio', '[\"Não\", \"Sim\"]'),
(574, 10, 'Pele seca, descamação, seborreia:', 'radio', '[\"Não\", \"Sim\"]'),
(575, 10, 'Dermatite urticária:', 'radio', '[\"Não\", \"Sim\"]'),
(576, 10, 'Pele muito oleosa:', 'radio', '[\"Não\", \"Sim\"]'),
(577, 10, 'Acne:', 'radio', '[\"Não\", \"Sim\"]'),
(578, 10, 'Descreva região mais recorrente:', 'text', NULL),
(579, 10, 'Manchas Roxas:', 'radio', '[\"Não\", \"Sim\"]'),
(580, 10, 'Dificuldade de Cicatrização:', 'radio', '[\"Não\", \"Sim\"]'),
(581, 10, 'Fácil sangramento:', 'radio', '[\"Não\", \"Sim\"]'),
(582, 10, 'Machucados na pele:', 'radio', '[\"Não\", \"Sim\"]'),
(583, 10, 'Rachadura nos pés:', 'radio', '[\"Não\", \"Sim\"]'),
(584, 10, 'Micoses:', 'radio', '[\"Não\", \"Sim\"]'),
(585, 10, 'Psoríase:', 'radio', '[\"Não\", \"Sim\"]'),
(586, 10, 'Vitiligo:', 'radio', '[\"Não\", \"Sim\"]'),
(587, 10, 'Rosácea:', 'radio', '[\"Não\", \"Sim\"]'),
(588, 10, 'Dermatite:', 'radio', '[\"Não\", \"Sim\"]'),
(589, 10, 'Celulite:', 'radio', '[\"Não\", \"Sim\"]'),
(590, 10, 'Microvasos/ Varizes:', 'radio', '[\"Não\", \"Sim\"]'),
(591, 10, 'Transpiração com odor:', 'radio', '[\"Não\", \"Sim\"]'),
(592, 10, 'Pelagra (Pele descamando):', 'radio', '[\"Não\", \"Sim\"]'),
(593, 10, 'Fraqueza muscular:', 'radio', '[\"Não\", \"Sim\"]'),
(594, 10, 'Fadiga crônica:', 'radio', '[\"Não\", \"Sim\"]'),
(595, 10, 'Atrofia (Perda muscular):', 'radio', '[\"Não\", \"Sim\"]'),
(596, 10, 'Cãibras:', 'radio', '[\"Não\", \"Sim\"]'),
(597, 10, 'Mialgia (Dor Muscular):', 'radio', '[\"Não\", \"Sim\"]'),
(598, 10, 'Dores nas pernas:', 'radio', '[\"Não\", \"Sim\"]'),
(599, 10, 'Formigamentos:', 'radio', '[\"Não\", \"Sim\"]'),
(600, 10, 'Diminuição da sensibilidade dos pés e tornozelos:', 'radio', '[\"Não\", \"Sim\"]'),
(601, 10, 'Queimação na planta do pé:', 'radio', '[\"Não\", \"Sim\"]'),
(602, 10, 'Tremores:', 'radio', '[\"Não\", \"Sim\"]'),
(603, 10, 'Fraqueza ao fechar as mãos:', 'radio', '[\"Não\", \"Sim\"]'),
(604, 10, 'Redução da coordenação:', 'radio', '[\"Não\", \"Sim\"]'),
(605, 10, 'Contrações contínuas:', 'radio', '[\"Não\", \"Sim\"]'),
(606, 10, 'Compulsividade:', 'radio', '[\"Não\", \"Sim\"]'),
(607, 10, 'Ansiedade e apreensão:', 'radio', '[\"Não\", \"Sim\"]'),
(608, 10, 'Irritabilidade:', 'radio', '[\"Não\", \"Sim\"]'),
(609, 10, 'Nervosismo:', 'radio', '[\"Não\", \"Sim\"]'),
(610, 10, 'Agitação/ Hiperatividade:', 'radio', '[\"Não\", \"Sim\"]'),
(611, 10, 'Humor Lábil:', 'radio', '[\"Não\", \"Sim\"]'),
(612, 10, 'Humor deprimido:', 'radio', '[\"Não\", \"Sim\"]'),
(613, 10, 'Redução do interesse e do prazer:', 'radio', '[\"Não\", \"Sim\"]'),
(614, 10, 'Depressão:', 'radio', '[\"Não\", \"Sim\"]'),
(615, 10, 'Alopécia (Queda de cabelo acentuada):', 'radio', '[\"Não\", \"Sim\"]'),
(616, 10, 'Secos e Quebradiços:', 'radio', '[\"Não\", \"Sim\"]'),
(617, 10, 'Calvície Precoce:', 'radio', '[\"Não\", \"Sim\"]'),
(618, 10, 'Cabelos brancos precoce:', 'radio', '[\"Não\", \"Sim\"]'),
(619, 10, 'Caspas (dermatite seborreica):', 'radio', '[\"Não\", \"Sim\"]'),
(620, 10, 'Calvície Genética:', 'radio', '[\"Não\", \"Sim\"]'),
(621, 10, 'Queimação / Irritação / Coceira:', 'radio', '[\"Não\", \"Sim\"]'),
(622, 10, 'Olhos Secos:', 'radio', '[\"Não\", \"Sim\"]'),
(623, 10, 'Visão Turva:', 'radio', '[\"Não\", \"Sim\"]'),
(624, 10, 'Fotofobia (Sensibilidade à luz):', 'radio', '[\"Não\", \"Sim\"]'),
(625, 10, 'Sensação de areia nos olhos:', 'radio', '[\"Não\", \"Sim\"]'),
(626, 10, 'Lacrimejamento:', 'radio', '[\"Não\", \"Sim\"]'),
(627, 10, 'Vermelhidão :', 'radio', '[\"Não\", \"Sim\"]'),
(628, 10, 'Dificuldade de visão noturna:', 'radio', '[\"Não\", \"Sim\"]'),
(629, 10, 'Glaucoma:', 'radio', '[\"Não\", \"Sim\"]'),
(630, 10, 'Catarata:', 'radio', '[\"Não\", \"Sim\"]'),
(631, 10, 'Conjuntivite:', 'radio', '[\"Não\", \"Sim\"]'),
(632, 10, 'Sangramento:', 'radio', '[\"Não\", \"Sim\"]'),
(633, 10, 'Retração:', 'radio', '[\"Não\", \"Sim\"]'),
(634, 10, 'Inflamação:', 'radio', '[\"Não\", \"Sim\"]'),
(635, 10, 'Diminuição do olfato:', 'radio', '[\"Não\", \"Sim\"]'),
(636, 10, 'Sangramento:', 'radio', '[\"Não\", \"Sim\"]'),
(637, 10, 'Coceira:', 'radio', '[\"Não\", \"Sim\"]'),
(638, 10, 'Corrimento nasal, espirros:', 'radio', '[\"Não\", \"Sim\"]'),
(639, 10, 'Formação de muco:', 'radio', '[\"Não\", \"Sim\"]'),
(640, 10, 'Dentes Frágeis:', 'radio', '[\"Não\", \"Sim\"]'),
(641, 10, 'Cáries:', 'radio', '[\"Não\", \"Sim\"]'),
(642, 10, 'Manchas Brancas:', 'radio', '[\"Não\", \"Sim\"]'),
(643, 10, 'Sangramento vaginal fora da menstruação:', 'radio', '[\"Não\", \"Sim\"]'),
(644, 10, 'Ciclo Menstrual Irregular:', 'radio', '[\"Não\", \"Sim\"]'),
(645, 10, 'Fungos / Candidíase:', 'radio', '[\"Não\", \"Sim\"]'),
(646, 10, 'Ovário Policístico:', 'radio', '[\"Não\", \"Sim\"]'),
(647, 10, 'Nódulo ou Tumor: Mama, Útero, Ovário:', 'radio', '[\"Não\", \"Sim\"]'),
(648, 10, 'Ardência e Prurido Vaginal:', 'radio', '[\"Não\", \"Sim\"]'),
(649, 10, 'Perda de Libido:', 'radio', '[\"Não\", \"Sim\"]'),
(650, 10, 'Endometriose ou Infertilidade:', 'radio', '[\"Não\", \"Sim\"]'),
(651, 10, 'Sintomas da Menopausa:', 'radio', '[\"Não\", \"Sim\"]'),
(652, 10, 'Tensão Pré-Menstrual (TPM):', 'radio', '[\"Não\", \"Sim\"]'),
(653, 11, 'Você possui algum compromisso diário?', 'radio', '[\"Não\", \"Sim, trabalho\", \"Sim, estudo\", \"Sim, estudo e trabalho\", \"Sim, outros compromissos\"]'),
(654, 11, 'Onde costuma fazer suas refeições?', 'radio', '[\"Levo comida para o trabalho\", \"Peço delivery no trabalho\", \"Cozinho e realizo minhas refeições em casa\", \"Em casa, marmitas congeladas terceirizadas\", \"Em casa, peço delivery\"]'),
(655, 11, 'Quantas vezes na semana você frequenta restaurantes, bares ou pede delivery?', 'radio', '[\"De 1 a 2x por semana\", \"De 2 a 4x por semana\", \"De 4 a 6x por semana\", \"Diariamente\", \"Quase nunca, faço minhas refeições em casa.\"]'),
(656, 11, 'Qual é o seu alimento preferido?', 'text', NULL),
(657, 11, 'O que você não come de jeito nenhum?', 'text', NULL),
(658, 11, 'O que você costuma comer durante a semana?', 'text', NULL),
(659, 11, 'O que você costuma comer no final de semana?', 'text', NULL),
(660, 11, 'Possui micro-ondas em casa?', 'radio', '[\"Sim\", \"Não\"]'),
(661, 11, 'O local onde você trabalha possui micro-ondas?', 'radio', '[\"Sim\", \"Não\"]'),
(662, 11, 'O local onde você trabalha possui geladeira?', 'radio', '[\"Sim\", \"Não\"]'),
(663, 11, 'Trabalha de forma remota (home office)?', 'radio', '[\"Sim\", \"Não\"]'),
(664, 11, 'O que te trouxe até a nossa consulta? Qual é o seu objetivo principal?', 'textarea', NULL),
(665, 11, 'Você pratica atividades físicas?', 'radio', '[\"Sim, diariamente\", \"Sim, de 2 a 3x por semana\", \"Sim, de 4 a 6x por semana\", \"Não, mas desejo começar a praticar\", \"Não, e não tenho interesse em praticar\"]'),
(666, 11, 'Qual atividade física?', 'text', NULL),
(667, 11, 'Como é seu sono?', 'radio', '[\"Ótimo! Durmo de 7 a 8h por noite, sem interrupções\", \"É bom! Durmo de 7 a 8h por noite, mas acordo algumas vezes durante a noite\", \"Mais ou menos. Às vezes consigo dormir mais cedo, mas normalmente durmo de 5 a 6h por noite.\", \"Nada bom. Durmo menos de 5h por noite e acordo com a sensação de que o descanso foi insuficiente\", \"Nenhuma dessas opções.\"]'),
(668, 11, 'Caso tenha marcado a última opção na pergunta anterior, explique aqui como seu sono funciona. Também é um espaço para observações, algo que você acha que eu deveria saber:', 'textarea', NULL),
(669, 11, 'Você fuma?', 'radio', '[\"Sim, diariamente\", \"Sim, ocasionalmente\", \"Não atualmente, mas já fui fumante\", \"Não, e nunca fui fumante\"]'),
(670, 11, 'Se sim, quantos cigarros/dia?', 'text', NULL),
(671, 11, 'Range os dentes e/ou mantém a mandíbula tensa?', 'radio', '[\"Não\", \"Sim\", \"Diagnosticado (a) com bruxismo?\"]'),
(672, 11, 'O que você diria sobre a sua disposição física?', 'radio', '[\"É boa, tenho energia para realizar todas as minhas atividades diárias.\", \"É regular, deixo de fazer algumas coisas por me sentir cansado (a), mas as tarefas importantes são cumpridas.\", \"É ruim, faço minhas atividades com custo.\"]'),
(673, 11, 'Você sente que está concentrado nas suas atividades diárias?', 'radio', '[\"Sim, extremamente focado.\", \"Mais ou menos. Consigo produzir, mas me distraio um pouco mais que deveria.\", \"Está ruim, me distraio com muita facilidade e sei que poderia produzir mais.\"]'),
(674, 11, 'Como classificaria sua memória?', 'radio', '[\"Muito boa\", \"Boa\", \"Regular\", \"Ruim\", \"Muito ruim\"]'),
(675, 11, 'Café:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(676, 11, 'Refrigerante:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(677, 11, 'Chá Mate ou Preto:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(678, 11, 'Doces/Chocolate:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(679, 11, 'Quais são os doces mais consumidos?', 'text', NULL),
(680, 11, 'Temperos prontos (Sazon, Caldo Knor...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(681, 11, 'Quais?', 'text', NULL),
(682, 11, 'Alimentos fritos:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(683, 11, 'Quais preparações fritas são mais frequentes?', 'text', NULL),
(684, 11, 'Consumo de bebida alcoólica:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(685, 11, 'Quais bebidas?', 'text', NULL),
(686, 11, 'Embutidos (Presunto, salame italiano, mortadela, salsicha, calabresa...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(687, 11, 'Quais?', 'text', NULL),
(688, 11, 'Cereais Integrais (Arroz integral, aveia, milho, quinoa...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(689, 11, 'Quais?', 'text', NULL),
(690, 11, 'Hortaliças Cruas:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(691, 11, 'Frutas:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(692, 11, 'Leguminosas (Feijão, ervilha, grão-de-bico...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(693, 11, 'Peixes:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(694, 11, 'Quais peixes?', 'text', NULL),
(695, 11, 'Carnes e aves:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(696, 11, 'Leite (Integral, Semi ou Desnatado) e Derivados (Iogurte, queijo, manteiga...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(697, 11, 'Quais?', 'text', NULL),
(698, 11, 'Possui alguma doença crônica (Ex.: diabetes, pressão alta, colesterol alto, gordura no fígado)? Qual (is)?', 'text', NULL),
(699, 11, 'Tem alguma doença aguda recorrente (Ex.: resfriado, alergia, virose, etc.)? Qual (is)?', 'text', NULL),
(700, 11, 'Possui alguma alergia ou restrição alimentar (Ex.: Lactose, Glúten, Ovo, Leite, Amendoim, Frutos do Mar, etc.)?', 'radio', '[\"Sim\", \"Não\"]'),
(701, 11, 'Qual (is)?', 'text', NULL),
(702, 11, 'Há histórico de doenças na sua família? Qual (is)? (Ex.: Alzheimer, Colesterol Alto, etc.):', 'text', NULL),
(703, 11, 'Já fez dietas anteriormente? Quais?', 'text', NULL),
(704, 11, 'Caso tenha respondido sim anteriormente, alguma dessas dietas foi prescrita por um nutricionista para você?', 'radio', '[\"Não\", \"Sim, todas\", \"Sim, algumas\"]'),
(705, 11, 'Quais medicamentos você utiliza atualmente?', 'text', NULL),
(706, 11, 'Pensando nos últimos 3 meses, houve consumo ocasional de medicamentos? Ex.: Antibiótico, anti-inflamatório... Se sim, especifique.', 'text', NULL),
(707, 11, 'Quais suplementos você utiliza atualmente?', 'text', NULL),
(708, 12, 'Você é...:', 'radio', '[\"Ovolactovegetariano: utiliza ovos, leite e laticínios na sua alimentação.\", \"Lactovegetariano: utiliza leite e laticínios na sua alimentação.\", \"Ovovegetariano: utiliza ovos na sua alimentação.\", \"Vegetarianismo estrito: não utiliza nenhum produto de origem animal na sua alimentação.\", \"Vegano: além das fontes alimentares, busca excluir todas as formas de exploração aos animais (no vestuário, por exemplo).\", \"Um onívoro com o objetivo de fazer a transição para o vegetarianismo.\"]'),
(709, 12, 'Há quanto tempo não consome carne?', 'text', NULL),
(710, 12, 'Como foi a transição de onívoro para vegetariano/vegano? Alguém te ajudou nesse processo?', 'textarea', NULL),
(711, 12, 'Tem o objetivo de reduzir o consumo de produtos de origem animal?', 'radio', '[\"Sim\", \"Não\"]'),
(712, 12, 'Obs.:', 'textarea', NULL),
(713, 12, 'Me conte sobre a sua rotina:', 'textarea', NULL),
(714, 12, 'Você possui algum compromisso diário?', 'radio', '[\"Não\", \"Sim, trabalho\", \"Sim, estudo\", \"Sim, estudo e trabalho\", \"Sim, outros compromissos\"]'),
(715, 12, 'Onde costuma fazer suas refeições?', 'radio', '[\"Levo comida para o trabalho\", \"Peço delivery no trabalho\", \"Cozinho e realizo minhas refeições em casa\", \"Em casa, marmitas congeladas terceirizadas\", \"Em casa, peço delivery\"]'),
(716, 12, 'Quantas vezes na semana você frequenta restaurantes, bares ou pede delivery?', 'radio', '[\"De 1 a 2x por semana\", \"De 2 a 4x por semana\", \"De 4 a 6x por semana\", \"Diariamente\", \"Quase nunca, faço minhas refeições em casa.\"]'),
(717, 12, 'Qual é o seu alimento preferido?', 'text', NULL),
(718, 12, 'O que você não come de jeito nenhum?', 'text', NULL),
(719, 12, 'O que você costuma comer durante a semana?', 'text', NULL),
(720, 12, 'O que você costuma comer no final de semana?', 'text', NULL),
(721, 12, 'Possui micro-ondas em casa?', 'radio', '[\"Sim\", \"Não\"]'),
(722, 12, 'O local onde você trabalha possui micro-ondas?', 'radio', '[\"Sim\", \"Não\"]'),
(723, 12, 'O local onde você trabalha possui geladeira?', 'radio', '[\"Sim\", \"Não\"]'),
(724, 12, 'Trabalha de forma remota (home office)?', 'radio', '[\"Sim\", \"Não\"]'),
(725, 12, 'O que te trouxe até a nossa consulta? Qual é o seu objetivo principal?', 'textarea', NULL),
(726, 12, 'Me conte sobre seus hábitos de vida:', 'textarea', NULL),
(727, 12, 'Você pratica atividades físicas?', 'radio', '[\"Sim, diariamente\", \"Sim, de 2 a 3x por semana\", \"Sim, de 4 a 6x por semana\", \"Não, mas desejo começar a praticar\", \"Não, e não tenho interesse em praticar\"]'),
(728, 12, 'Qual atividade física?', 'text', NULL),
(729, 12, 'Como é seu sono?', 'radio', '[\"Ótimo! Durmo de 7 a 8h por noite, sem interrupções\", \"É bom! Durmo de 7 a 8h por noite, mas acordo algumas vezes durante a noite\", \"Mais ou menos. Às vezes consigo dormir mais cedo, mas normalmente durmo de 5 a 6h por noite.\", \"Nada bom. Durmo menos de 5h por noite e acordo com a sensação de que o descanso foi insuficiente\", \"Nenhuma dessas opções.\"]'),
(730, 12, 'Caso tenha marcado a última opção na pergunta anterior, explique aqui como seu sono funciona. Também é um espaço para observações, algo que você acha que eu deveria saber:', 'textarea', NULL),
(731, 12, 'Você fuma?', 'radio', '[\"Sim, diariamente\", \"Sim, ocasionalmente\", \"Não atualmente, mas já fui fumante\", \"Não, e nunca fui fumante\"]'),
(732, 12, 'Se sim, quantos cigarros por dia?', 'text', NULL),
(733, 12, 'Range os dentes e/ou mantém a mandíbula tensa?', 'radio', '[\"Sim\", \"Não\", \"Diagnosticado (a) com bruxismo?\"]'),
(734, 12, 'O que você diria sobre a sua disposição física?', 'radio', '[\"É boa, tenho energia para realizar todas as minhas atividades diárias.\", \"É regular, deixo de fazer algumas coisas por me sentir cansado (a), mas as tarefas importantes são cumpridas.\", \"É ruim, faço minhas atividades com custo.\"]'),
(735, 12, 'Você sente que está concentrado nas suas atividades diárias?', 'radio', '[\"Sim, extremamente focado.\", \"Mais ou menos. Consigo produzir, mas me distraio um pouco mais que deveria.\", \"Está ruim, me distraio com muita facilidade e sei que poderia produzir mais.\"]'),
(736, 12, 'Como classificaria sua memória?', 'radio', '[\"Muito boa\", \"Boa\", \"Regular\", \"Ruim\", \"Muito ruim\"]'),
(737, 12, 'A frequência com que eu consumo os alimentos abaixo é:', 'textarea', NULL),
(738, 12, 'Café:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(739, 12, 'Refrigerante:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(740, 12, 'Chá Mate ou Preto:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(741, 12, 'Doces/Chocolate/Guloseimas:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(742, 12, 'Quais são os doces mais consumidos?', 'text', NULL),
(743, 12, 'Temperos prontos (Sazon, Caldo Knor...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(744, 12, 'Quais?', 'text', NULL),
(745, 12, 'Alimentos fritos:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(746, 12, 'Quais preparações fritas são mais frequentes?', 'text', NULL),
(747, 12, 'Consumo de bebida alcoólica:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(748, 12, 'Quais bebidas?', 'text', NULL),
(749, 12, 'Embutidos (Presunto, salame italiano, mortadela, salsicha, calabresa...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(750, 12, 'Quais?', 'text', NULL),
(751, 12, 'Cereais Integrais (Arroz integral, aveia, milho, quinoa...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(752, 12, 'Quais?', 'text', NULL),
(753, 12, 'Hortaliças Cruas:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(754, 12, 'Frutas:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(755, 12, 'Leguminosas (Feijão, ervilha, grão-de-bico...):', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(756, 12, 'Carnes e aves:', 'radio', '[\"Nunca\", \"Diariamente\", \"Semanalmente\", \"Mensalmente\"]'),
(757, 12, 'Sobre sua saúde:', 'textarea', NULL),
(758, 12, 'Possui alguma doença crônica (Ex.: diabetes, pressão alta, colesterol alto, gordura no fígado)? Qual (is)?', 'text', NULL),
(759, 12, 'Tem alguma doença aguda recorrente (Ex.: resfriado, alergia, virose, etc.)? Qual (is)?', 'text', NULL),
(760, 12, 'Possui alguma alergia ou restrição alimentar (Ex.: Lactose, Glúten, Ovo, Leite, Amendoim, Frutos do Mar, etc.)?', 'radio', '[\"Sim\", \"Não\"]'),
(761, 12, 'Qual (is)?', 'text', NULL),
(762, 12, 'Há histórico de doenças na sua família? Qual (is)? (Ex.: Alzheimer, Colesterol Alto, etc.):', 'text', NULL),
(763, 12, 'Já fez dietas anteriormente? Quais?', 'text', NULL),
(764, 12, 'Caso tenha respondido sim anteriormente, alguma dessas dietas foi prescrita por um nutricionista para você?', 'radio', '[\"Não\", \"Sim, todas\", \"Sim, algumas\"]'),
(765, 12, 'Medicamentos e Suplementos', 'textarea', NULL),
(766, 12, 'Quais medicamentos você utiliza atualmente?', 'text', NULL),
(767, 12, 'Pensando nos últimos 3 meses, houve consumo ocasional de medicamentos? Ex.: Antibiótico, anti-inflamatório... Se sim, especifique.:', 'text', NULL),
(768, 12, 'Quais suplementos você utiliza atualmente?', 'text', NULL),
(769, 13, 'Eu me sinto bem quando como comida saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(770, 13, 'Eu gasto muito tempo para comprar, planejar e/ou preparar as refeições para que minha alimentação seja o mais saudável possível:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(771, 13, 'Eu considero que a minha alimentação é mais saudável do que da maioria das pessoas:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(772, 13, 'Eu me sinto culpado (a) quando como algum alimento que considero não saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(773, 13, 'As minhas relações sociais já foram afetadas negativamente por causa da minha preocupação em comer alimentos saudáveis:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(774, 13, 'O meu interesse por uma alimentação saudável é uma parte importante do meu jeito de ser, de entender o mundo:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(775, 13, 'Prefiro comer um alimento saudável e pouco saboroso do que um alimento saboroso que não seja saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(776, 13, 'Eu como principalmente alimentos considero saudáveis:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(777, 13, 'A minha preocupação com a alimentação saudável me consome muito tempo:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(778, 13, 'A minha preocupação com a alimentação saudável me consome muito tempo:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(779, 13, 'Eu me preocupo com a possibilidade de comer alimentos pouco saudáveis:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(780, 13, 'Eu não me importo de gastar mais dinheiro com um alimento se eu o considero mais saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(781, 13, 'Eu me sinto agustiado (a) ou triste quando como alimentos que não considero saudáveis:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(782, 13, 'Eu prefiro comer pouco, mas de forma saudável, do que ficar saciado (a) com uma comida que possa não ser saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(783, 13, 'Eu evito comer com pessoas que não compartilham minhas ideias sobre alimentação saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(784, 13, 'Eu tento convencer as pessoas ao meu redor para que sigam os meus hábitos de alimentação saudável:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(785, 13, 'Se em algum momento como algo que não considero saudável, eu me castigo por isso:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(786, 13, 'Os meus pensamentos sobre alimentação saudável não me deixam concentrar em outras tarefas:', 'radio', '[\"Não concordo\", \"Concordo um pouco\", \"Concordo bastante\", \"Concordo fortemente\"]'),
(787, 14, 'Você se considera mais: Determinado Confiante Consistente Preciso', 'radio', '[\"Determinado\", \"Confiante\", \"Consistente\", \"Preciso\"]'),
(788, 14, 'Você se considera mais: Apressado Persuasivo Metódico Cuidadoso', 'radio', '[\"Apressado\", \"Persuasivo\", \"Metódico\", \"Cuidadoso\"]'),
(789, 14, 'Você se considera mais: Competitivo Político Cooperativo Diplomata', 'radio', '[\"Competitivo\", \"Político\", \"Cooperativo\", \"Diplomata\"]'),
(790, 14, 'Você se considera mais: Objetivo Exagerado Estável Exato', 'radio', '[\"Objetivo\", \"Exagerado\", \"Estável\", \"Exato\"]'),
(791, 14, 'Você se considera mais: Assertivo Otimista Paciente Prudente', 'radio', '[\"Assertivo\", \"Otimista\", \"Paciente\", \"Prudente\"]'),
(792, 14, 'Você se considera mais: Fazedor Inspirador Persistente Perfeccionista', 'radio', '[\"Fazedor\", \"Inspirador\", \"Persistente\", \"Perfeccionista\"]'),
(793, 14, 'Você se considera mais: Agressivo Expansivo Possessivo Julgador', 'radio', '[\"Agressivo\", \"Expansivo\", \"Possessivo\", \"Julgador\"]'),
(794, 14, 'Você se considera mais: Decidido Flexível Previsível Sistemático', 'radio', '[\"Decidido\", \"Flexível\", \"Previsível\", \"Sistemático\"]'),
(795, 14, 'Você se considera mais: Inovador Comunicativo Agradável Elegante', 'radio', '[\"Inovador\", \"Comunicativo\", \"Agradável\", \"Elegante\"]'),
(796, 14, 'Você se considera mais: Autoritário Extravagante Modesto Dependente', 'radio', '[\"Autoritário\", \"Extravagante\", \"Modesto\", \"Dependente\"]'),
(797, 14, 'Você se considera mais: Enérgico Entusiasmado Calmo Disciplinado', 'radio', '[\"Enérgico\", \"Entusiasmado\", \"Calmo\", \"Disciplinado\"]'),
(798, 14, 'Você se considera mais: Firme Expressivo Amável Formal', 'radio', '[\"Firme\", \"Expressivo\", \"Amável\", \"Formal\"]'),
(799, 14, 'Você se considera mais: Visionário Criativo Ponderado Detalhista', 'radio', '[\"Visionário\", \"Criativo\", \"Ponderado\", \"Detalhista\"]'),
(800, 14, 'Você se considera mais: Egocêntrico Tagarela Acomodado Dependente', 'radio', '[\"Egocêntrico\", \"Tagarela\", \"Acomodado\", \"Dependente\"]'),
(801, 14, 'Você se considera mais: Confiável Convincente Compreensivo Pontual', 'radio', '[\"Confiável\", \"Convincente\", \"Compreensivo\", \"Pontual\"]'),
(802, 14, 'Você se considera mais: Vigoroso Caloroso Gentil Preocupado', 'radio', '[\"Vigoroso\", \"Caloroso\", \"Gentil\", \"Preocupado\"]'),
(803, 14, 'Você se considera mais: Ousado Sedutor Harmonizador Cauteloso', 'radio', '[\"Ousado\", \"Sedutor\", \"Harmonizador\", \"Cauteloso\"]'),
(804, 14, 'Você se considera mais: Energético Espontâneo Satisfeito Conservador', 'radio', '[\"Energético\", \"Espontâneo\", \"Satisfeito\", \"Conservador\"]'),
(805, 14, 'Você se considera mais: Exigente Sociável Leal Rigoroso', 'radio', '[\"Exigente\", \"Sociável\", \"Leal\", \"Rigoroso\"]'),
(806, 14, 'Você se considera mais: Pioneiro Divertido Tranquilo Convencional', 'radio', '[\"Pioneiro\", \"Divertido\", \"Tranquilo\", \"Convencional\"]'),
(807, 14, 'Você se considera mais: Ambicioso Reluzente Regulado Calculista', 'radio', '[\"Ambicioso\", \"Reluzente\", \"Regulado\", \"Calculista\"]'),
(808, 14, 'Você se considera mais: Inquisitivo Dado Rígido consigo Cético', 'radio', '[\"Inquisitivo\", \"Dado\", \"Rígido consigo\", \"Cético\"]'),
(809, 14, 'Você se considera mais: Audacioso Extrovertido Casual Meticuloso', 'radio', '[\"Audacioso\", \"Extrovertido\", \"Casual\", \"Meticuloso\"]'),
(810, 14, 'Você se considera mais: Direto Jovial Moderado Processual', 'radio', '[\"Direto\", \"Jovial\", \"Moderado\", \"Processual\"]');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image_src` varchar(255) DEFAULT NULL,
  `ingredients` text DEFAULT NULL,
  `instructions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `title`, `description`, `image_src`, `ingredients`, `instructions`) VALUES
(9, 'Salada de Quinoa', 'Uma salada deliciosa e nutritiva com quinoa, vegetais frescos e molho de limão.', '../../uploads/recipes/salada_quinoa.jpg', 'Quinoa\nVegetais frescos\nMolho de limão', '1. Cozinhe a quinoa de acordo com as instruções da embalagem.\n2. Corte os vegetais em pedaços pequenos.\n3. Misture a quinoa cozida e os vegetais em uma tigela.\n4. Adicione o molho de limão e misture bem.\n5. Sirva e aproveite!'),
(10, 'Salmão Grelhado com Aspargos', 'Salmão grelhado com aspargos frescos, temperado com ervas e azeite de oliva.', '../../uploads/recipes/salmao.jpg', 'Salmão\nAspargos frescos\nErvas\nAzeite de oliva', '1. Tempere o salmão com ervas a gosto.\n2. Grelhe o salmão e os aspargos.\n3. Regue com azeite de oliva antes de servir.'),
(11, 'Smoothie de Frutas Vermelhas', 'Um smoothie saudável feito com morangos, mirtilos, iogurte e mel.', '../../uploads/recipes/smoothie.jpg', 'Morangos\nMirtilos\nIogurte\nMel', '1. Misture morangos e mirtilos no liquidificador.\n2. Adicione iogurte e mel.\n3. Bata até obter uma consistência suave.\n4. Sirva em um copo e aproveite!'),
(12, 'Wrap de Frango com Abacate', 'Um wrap saudável com frango grelhado, abacate, alface e molho de iogurte.', '../../uploads/recipes/wrap_frango.jpg', 'Frango grelhado\nAbacate\nAlface\nMolho de iogurte', '1. Grelhe o frango até que esteja cozido.\n2. Espalhe molho de iogurte em uma tortilha.\n3. Adicione o frango grelhado, abacate e alface.\n4. Enrole e aproveite!'),
(13, 'Salada de Grãos com Legumes', 'Uma salada nutritiva com grãos integrais, legumes frescos e molho de mostarda.', '../../uploads/recipes/salada.jpg', 'Grãos integrais\nLegumes frescos\nMolho de mostarda', '1. Cozinhe os grãos integrais de acordo com as instruções.\n2. Corte os legumes em pedaços pequenos.\n3. Misture os grãos cozidos e os legumes em uma tigela.\n4. Adicione o molho de mostarda e misture bem.\n5. Sirva e aproveite!'),
(14, 'Omelete de Vegetais', 'Um omelete saudável com ovos, espinafre, tomate e queijo feta.', '../../uploads/recipes/omelete.jpg', 'Ovos\nEspinafre\nTomate\nQueijo feta', '1. Bata os ovos em uma tigela.\n2. Adicione espinafre, tomate e queijo feta.\n3. Despeje a mistura em uma frigideira quente.\n4. Cozinhe até que o omelete esteja firme.\n5. Dobre ao meio e sirva.'),
(15, 'Frutas Assadas com Mel', 'Frutas variadas assadas no forno com um toque de mel e canela.', '../../uploads/recipes/frutas.jpg', 'Frutas variadas\nMel\nCanela', '1. Corte as frutas em pedaços.\n2. Regue com mel e polvilhe canela.\n3. Asse no forno até que fiquem douradas.\n4. Sirva quente.'),
(16, 'Tigela de Quinoa com Abacate', 'Uma tigela nutritiva com quinoa, abacate, feijão preto e molho de limão.', '../../uploads/recipes/quinoa_abacate.jpg', 'Quinoa\nAbacate\nFeijão preto\nMolho de limão', '1. Cozinhe a quinoa de acordo com as instruções da embalagem.\n2. Misture a quinoa cozida, abacate e feijão preto em uma tigela.\n3. Adicione o molho de limão e misture bem.\n4. Sirva e aproveite!'),
(112, 'Wrap de Falafel com Molho de Tahine', 'Um wrap recheado com falafel crocante, homus, alface, tomate e pepino.', '../../uploads/recipes/65a1fbc18649d_tortilla-wrap-with-falafel-vegetables-black-stone-background.jpg', '6 falafels cozidos\n4 wraps de trigo integral\n1 xícara de homus\n1 xícara de alface picada\n1 tomate grande, cortado em cubos\n1/2 pepino, fatiado\nMolho de tahine a gosto', 'Aqueça os wraps de acordo com as instruções da embalagem.\r\nEspalhe homus em cada wrap.\r\nColoque 2 falafels em cada wrap e adicione alface, tomate e pepino.\r\nRegue com molho de tahine.\r\nDobre os wraps e sirva.'),
(113, 'Curry de Legumes com Leite de Coco', 'Um curry vegano e reconfortante, repleto de legumes e cozidos em um molho de leite de coco.', '../../uploads/recipes/65a201af90b23_pakistan-food-arrangement-view.jpg', '2 cenouras, cortadas em rodelas\n1 abobrinha, cortada em cubos\n1 batata-doce, descascada e cortada em pedaços\n1 brócolis, separado em floretes;\n1 cebola, picada\n2 dentes de alho, picados\n1 lata de leite de coco;\n2 colheres de sopa de curry em pó\nSal e pimenta a gosto\nArroz integral para servir', 'Refogue a cebola e o alho em um pouco de azeite até ficarem dourados.;\r\nAdicione os legumes e o curry em pó, mexendo bem.;\r\nDespeje o leite de coco sobre os legumes e tempere com sal e pimenta.;\r\nCozinhe em fogo médio até os legumes ficarem macios.;\r\nSirva sobre arroz integral cozido.;'),
(114, 'Abobrinha Recheada com Quinoa', 'Meia abobrinha recheada com uma mistura de quinoa cozida, tomate, espinafre e queijo feta.', '../../uploads/recipes/65a206fa3cdf8_high-angle-view-meal-served-plate_1048944-4770780.jpg', '2 abobrinhas médias\n1 xícara de quinoa cozida\n1 tomate médio, picado\n1 xícara de folhas de espinafre, picadas\n1/2 xícara de queijo feta despedaçado\nAzeite de oliva\nSal e pimenta a gosto', 'Pré-aqueça o forno a 180°C.\nCorte as abobrinhas ao meio no sentido do comprimento e escave o interior, formando pequenas \'barcas\'.\nEm uma tigela, misture a quinoa cozida, o tomate, o espinafre e o queijo feta.\nTempere a mistura com sal, pimenta e regue com um fio de azeite de oliva.\nRecheie cada barca de abobrinha com a mistura.\nColoque as abobrinhas recheadas em uma assadeira e leve ao forno por aproximadamente 20-25 minutos, ou até que as abobrinhas fiquem macias.\nRetire do forno e sirva quente. Desfrute desta opção saudável e deliciosa!'),
(123, 'Risoto de Cogumelos e Espinafre', 'Sabor italiano com uma pitada saudável e vegetariana.', '../../uploads/recipes/65a2a901aad63_healthy-vegetarian-risotto-with-fresh-parsley-garnish-generated-by-ai (1).jpg', '1 xícara de arroz arbóreo\r\n200g de cogumelos variados (shiitake, cogumelos-de-paris), fatiados\r\n2 xícaras de folhas de espinafre fresco\r\n1 cebola média, picada\r\n2 dentes de alho, picados\r\n1/2 xícara de vinho branco seco\r\n4 xícaras de caldo de legumes\r\n1/2 xícara de queijo parmesão ralado\r\nAzeite de oliva\r\nSal e pimenta a gosto', '1. Em uma panela, aqueça o caldo de legumes e mantenha-o aquecido em fogo baixo.\r\n2. Em outra panela, refogue a cebola e o alho em azeite de oliva até ficarem macios.\r\n3. Adicione os cogumelos fatiados e continue cozinhando até que eles liberem seus sucos.\r\n4. Acrescente o arroz arbóreo à panela e mexa bem para envolver os grãos nos sucos dos cogumelos.\r\n5. Despeje o vinho branco na panela e mexa até que seja absorvido.\r\n6. Comece a adicionar o caldo de legumes aos poucos, mexendo constantemente e esperando que seja absorvido antes de adicionar mais.\r\n7. Quando o arroz estiver quase cozido, adicione as folhas de espinafre e continue mexendo até que o espinafre murche.\r\n8. Finalize o risoto adicionando o queijo parmesão ralado, ajuste o tempero com sal e pimenta.\r\n9. Sirva imediatamente, garantindo um risoto cremoso e cheio de sabor.\r\n\r\nDesfrute deste delicioso risoto vegetariano, perfeito para satisfazer seus desejos por uma refeição reconfortante e nutritiva.');

-- --------------------------------------------------------

--
-- Table structure for table `smtp_config`
--

CREATE TABLE `smtp_config` (
  `id` int(11) NOT NULL,
  `host` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `port` int(11) NOT NULL,
  `system_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smtp_config`
--

INSERT INTO `smtp_config` (`id`, `host`, `username`, `password`, `port`, `system_name`) VALUES
(1, 'smtp.gmail.com', 'seuEmailAqui@gmail.com', 'suaSenhaAqui', 587, 'Daniel Lima | Nutricionista');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_token_hash` varchar(255) DEFAULT NULL,
  `reset_token_expires_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `profile_picture` varchar(255) DEFAULT '../../assets/images/default_profile_img.png',
  `birthdate` date DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `address_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `occupation` varchar(255) DEFAULT NULL,
  `communication_preference` varchar(255) DEFAULT NULL,
  `payment_preference` varchar(255) DEFAULT NULL,
  `plan_name` varchar(255) DEFAULT 'Plano Padrão',
  `selected_questionnaires` text DEFAULT 'Questionário Pré-Consulta',
  `cep` varchar(10) DEFAULT NULL,
  `complement` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `neighborhood` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `reset_token_hash`, `reset_token_expires_at`, `is_admin`, `profile_picture`, `birthdate`, `phone_number`, `height`, `gender`, `nationality`, `city`, `address`, `address_number`, `created_at`, `occupation`, `communication_preference`, `payment_preference`, `plan_name`, `selected_questionnaires`) VALUES
(1, 'Leonardo Guedes', 'john.doe@example.com', '$2y$10$GGrH898MVdcKKn07RG8kXOAnKbNAwrHUfZ675l5wazsSwOH97VOwO', NULL, NULL, 1, '../../uploads/profiles/65b6767c795dd_portrait-happy-male-with-broad-smile.jpg', '1990-01-01', '123456789', 175.00, 'Outro', 'USA', 'New York', '123 Main St', '456', '2024-04-12 03:00:00', 'Engineer', 'WhatsApp', 'Cartão de Crédito', 'Plano Padrão', 'Avaliação do Tratamento,Definição de Metas,Questionário Pré-Consulta');

-- --------------------------------------------------------

--
-- Table structure for table `users_measurements`
--

CREATE TABLE `users_measurements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `measured_at` date NOT NULL,
  `body_mass` decimal(8,2) DEFAULT NULL,
  `body_fat` decimal(8,2) DEFAULT NULL,
  `lean_body_mass` decimal(8,2) DEFAULT NULL,
  `weight` decimal(8,2) DEFAULT NULL,
  `bmi` decimal(8,2) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `visceral_fat` decimal(8,2) DEFAULT NULL,
  `basal_metabolism` decimal(8,2) DEFAULT NULL,
  `waist_hip_ratio` decimal(8,2) DEFAULT NULL,
  `trunk_measurement` decimal(8,2) DEFAULT NULL,
  `toracic_skinfold` decimal(8,2) DEFAULT NULL,
  `triceps_skinfold` decimal(8,2) DEFAULT NULL,
  `abdominal_skinfold` decimal(8,2) DEFAULT NULL,
  `thigh_skinfold` decimal(8,2) DEFAULT NULL,
  `axillary_skinfold` decimal(8,2) DEFAULT NULL,
  `suprailiac_skinfold` decimal(8,2) DEFAULT NULL,
  `subscapular_skinfold` decimal(8,2) DEFAULT NULL,
  `chest_girth` decimal(8,2) DEFAULT NULL,
  `hip_girth` decimal(8,2) DEFAULT NULL,
  `waist_girth` decimal(8,2) DEFAULT NULL,
  `abdomen_girth` decimal(8,2) DEFAULT NULL,
  `left_arm` decimal(8,2) DEFAULT NULL,
  `right_arm` decimal(8,2) DEFAULT NULL,
  `left_forearm` decimal(8,2) DEFAULT NULL,
  `right_forearm` decimal(8,2) DEFAULT NULL,
  `right_thigh` decimal(8,2) DEFAULT NULL,
  `left_thigh` decimal(8,2) DEFAULT NULL,
  `right_calf` decimal(8,2) DEFAULT NULL,
  `left_calf` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_measurements`
--

INSERT INTO `users_measurements` (`id`, `user_id`, `measured_at`, `body_mass`, `body_fat`, `lean_body_mass`, `weight`, `bmi`, `age`, `visceral_fat`, `basal_metabolism`, `waist_hip_ratio`, `trunk_measurement`, `toracic_skinfold`, `triceps_skinfold`, `abdominal_skinfold`, `thigh_skinfold`, `axillary_skinfold`, `suprailiac_skinfold`, `subscapular_skinfold`, `chest_girth`, `hip_girth`, `waist_girth`, `abdomen_girth`, `left_arm`, `right_arm`, `left_forearm`, `right_forearm`, `right_thigh`, `left_thigh`, `right_calf`, `left_calf`, `created_at`) VALUES
(1, 1, '2023-01-01', 73.50, 17.50, 52.00, 80.50, 27.00, 34, 10.00, 1680.00, 0.89, 91.50, 10.20, 13.50, 15.80, 12.00, 9.50, 14.80, 16.00, 84.50, 91.50, 76.80, 80.00, 30.00, 31.20, 25.50, 26.20, 47.50, 46.00, 33.50, 32.00, '2024-01-05 00:59:40'),
(2, 1, '2023-02-01', 72.80, 17.00, 52.80, 79.20, 26.40, 33, 9.50, 1660.00, 0.88, 90.70, 11.50, 14.80, 16.00, 13.00, 11.50, 16.20, 17.50, 86.80, 94.00, 78.00, 81.00, 31.20, 32.00, 26.00, 27.20, 49.00, 47.50, 35.00, 33.20, '2024-01-05 00:59:40'),
(3, 1, '2023-03-01', 72.00, 16.50, 53.50, 77.80, 25.80, 32, 9.00, 1640.00, 0.87, 89.90, 12.00, 15.00, 17.20, 12.80, 10.20, 14.50, 18.00, 87.00, 95.50, 79.80, 82.50, 32.00, 30.80, 27.50, 28.00, 50.20, 48.80, 36.50, 35.20, '2024-01-05 00:59:40'),
(4, 1, '2023-04-01', 71.20, 16.00, 54.20, 76.50, 25.10, 31, 8.50, 1620.00, 0.86, 89.10, 10.80, 14.20, 16.50, 13.50, 11.00, 15.50, 16.80, 85.50, 92.00, 77.50, 80.20, 30.80, 31.50, 25.20, 26.80, 48.00, 46.50, 34.20, 32.80, '2024-01-05 00:59:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `questionnaire_id` (`questionnaire_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `meal_plans`
--
ALTER TABLE `meal_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaire_questions`
--
ALTER TABLE `questionnaire_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `smtp_config`
--
ALTER TABLE `smtp_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_measurements`
--
ALTER TABLE `users_measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_measurements_ibfk_1` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=943;

--
-- AUTO_INCREMENT for table `meal_plans`
--
ALTER TABLE `meal_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110357;

--
-- AUTO_INCREMENT for table `questionnaire_questions`
--
ALTER TABLE `questionnaire_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=811;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `smtp_config`
--
ALTER TABLE `smtp_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users_measurements`
--
ALTER TABLE `users_measurements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6303;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`questionnaire_id`) REFERENCES `questionnaires` (`id`),
  ADD CONSTRAINT `answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questionnaire_questions` (`id`),
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_measurements`
--
ALTER TABLE `users_measurements`
  ADD CONSTRAINT `users_measurements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
