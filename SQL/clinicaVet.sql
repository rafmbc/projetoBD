SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Criação de banco de dados para clinicaVet
CREATE DATABASE IF NOT EXISTS `clinicaVet` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `clinicaVet`;


-- Tabela para Veterinários
CREATE TABLE Veterinario (
    crmv INT PRIMARY KEY,
    nomeVeterinario VARCHAR(100),
    tipoEspecializacao ENUM('Pequenos Animais', 'Exóticos', 'Peixes') DEFAULT 'Pequenos Animais',
    telefone BIGINT(11)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO Veterinario (crmv, nomeVeterinario, tipoEspecializacao, telefone) 
VALUES 
(12345, 'Pedro Oliveira', 'Pequenos Animais', 11987654321),
(23456, 'Ana Costa', 'Exóticos', 11998765432),
(34567, 'Marcos Santos', 'Peixes', 11976543210),
(45678, 'Carla Silva', 'Pequenos Animais', 11965432109),
(56789, 'Lucas Almeida', 'Exóticos', 11954321098),
(67890, 'Marina Lima', 'Peixes', 11943210987),
(78901, 'Rodrigo Pereira', 'Pequenos Animais', 11932109876),
(89012, 'Sandra Gomes', 'Exóticos', 11921098765),
(90123, 'Rafaela Vieira', 'Peixes', 11910987654),
(10234, 'Fernando Costa', 'Pequenos Animais', 11909876543),
(21345, 'Joana Santos', 'Exóticos', 11998765432),
(32456, 'André Oliveira', 'Peixes', 11987654321),
(43567, 'Beatriz Marques', 'Pequenos Animais', 11976543210),
(54678, 'Gustavo Mendes', 'Exóticos', 11965432109),
(65789, 'Camila Sousa', 'Peixes', 11954321098);


-- Tabela para donos
CREATE TABLE Donos (
    cpfDono BIGINT PRIMARY KEY,
    nome VARCHAR(100),
    telefone BIGINT (11),
    endereco VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO Donos (cpfDono, nome, telefone, endereco) 
VALUES 
(12345678901, 'João da Silva', 11987654321, 'Rua das Flores, 123'),
(23456789012, 'Maria Oliveira', 11998765432, 'Avenida Principal, 456'),
(34567890123, 'José Santos', 11976543210, 'Praça Central, 789'),
(45678901234, 'Ana Costa', 11965432109, 'Travessa das Árvores, 234'),
(56789012345, 'Pedro Almeida', 11954321098, 'Alameda dos Pássaros, 567'),
(67890123456, 'Marcia Pereira', 11943210987, 'Estrada do Sol, 890'),
(78901234567, 'Roberto Gomes', 11932109876, 'Avenida das Estrelas, 123'),
(89012345678, 'Carla Vieira', 11921098765, 'Rua dos Anjos, 456'),
(90123456789, 'Carlos Silva', 11910987654, 'Avenida das Rosas, 789'),
(01234567890, 'Sandra Mendes', 11909876543, 'Praça dos Leões, 234'),
(09876543210, 'Fernanda Oliveira', 11998765432, 'Rua das Palmeiras, 567');

-- Tabela para animais
CREATE TABLE Animal (
    idAnimal INT PRIMARY KEY AUTO_INCREMENT,
    nomeAnimal VARCHAR(25),
    especieAnimal VARCHAR(20),
    sexoAnimal ENUM('M', 'F'),
    idade INT,
    cpfDono BIGINT,
    FOREIGN KEY (cpfDono) REFERENCES Donos(cpfDono) ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO Animal (nomeAnimal, especieAnimal, sexoAnimal, idade, dono) VALUES
('Bela', 'Gato', 'F', 3, 12345678901),       
('Rex', 'Cachorro', 'M', 5, 56789012345),      
('Cacau', 'Gato', 'F', 2, 23456789012),         
('Cookie', 'Cachorro', 'M', 4, 12345678901),       
('Nemo', 'Peixe', 'M', 1, 67890123456),         
('Pernalonga', 'Coelho', 'F', 2, 34567890123),       
('Amélia', 'Cobra', 'M', 6, 89012345678),     
('Luna', 'Gato', 'F', 1, 01234567890),          
('Chewie', 'Cachorro', 'F', 3, 90123456789),    
('Chico', 'Papagaio', 'M', 2, 09876543210),     
('Lua', 'Cobra', 'F', 4, 78901234567),      
('Bento', 'Hamster', 'M', 1, 09876543210),    
('Salem', 'Gato', 'F', 5, 45678901234);        
     

-- Tabela para secretária
CREATE TABLE Secretaria (
    idSecretaria INT PRIMARY KEY AUTO_INCREMENT,
    nomeSecretaria VARCHAR(100),
    telefoneSecretaria VARCHAR(11)
);

INSERT INTO Secretaria (nomeSecretaria, telefoneSecretaria) VALUES
('Ana Silva', '11987654321'),
('Carlos Oliveira', '11876543210'),
('Fernanda Santos', '11765432109'),
('Gabriel Lima', '11654321098'),
('Isabela Costa', '11543210987'),
('Lucas Pereira', '11432109876'),
('Mariana Rodrigues', '11321098765'),
('Paulo Souza', '11210987654'),
('Renata Oliveira', '11109876543'),
('Thiago Silva', '11998765432');


-- Tabela para exames
CREATE TABLE Exame (
    idExame INT PRIMARY KEY AUTO_INCREMENT,
    dataExame DATE,
    horarioExame TIME,
    tipoExame VARCHAR(100),
    observacoes TEXT,
    vetResponsavel INT,
    idAnimal INT,
    secretariaResponsavel INT,
    FOREIGN KEY (vetResponsavel) REFERENCES Veterinario(crmv) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (idAnimal) REFERENCES Animal(idAnimal) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (secretariaResponsavel) REFERENCES Secretaria(idSecretaria) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Inserindo exemplos na tabela Exame
INSERT INTO Exame (dataExame, horarioExame, tipoExame, observacoes, vetResponsavel, idAnimal, secretariaResponsavel) VALUES
('2023-01-15', '09:00:00', 'Check-up Anual', 'Exame de rotina para verificação da saúde geral', 12345, 1, 1),
('2023-02-05', '10:30:00', 'Vacinação', 'Aplicação de vacina contra doenças comuns', 23456, 2, 2),
('2023-03-20', '14:45:00', 'Cirurgia', 'Cirurgia de castração', 34567, 3, 3),
('2023-04-10', '11:15:00', 'Exame de Sangue', 'Análise do hemograma completo', 45678, 4, 4),
('2023-05-03', '13:00:00', 'Radiografia', 'Avaliação da estrutura óssea', 56789, 5, 5),
('2023-06-18', '08:30:00', 'Consulta Geral', 'Consulta de acompanhamento regular', 67890, 6, 6),
('2023-07-29', '15:20:00', 'Odontologia', 'Limpeza e verificação da saúde dental', 78901, 7, 7),
('2023-08-14', '10:00:00', 'Exame Oftalmológico', 'Avaliação da saúde ocular', 89012, 8, 8),
('2023-09-02', '11:45:00', 'Ultrassonografia', 'Imagem por ultrassom para diagnóstico', 90123, 9, 9),
('2023-10-17', '09:30:00', 'Fisioterapia', 'Reabilitação pós-operatória', 10234, 10, 10),
('2023-11-28', '14:00:00', 'Endoscopia', 'Exame interno do trato gastrointestinal', 21345, 11, 1),
('2023-12-05', '12:15:00', 'Exame Cardíaco', 'Avaliação do sistema cardiovascular', 32456, 12, 2),
('2024-01-22', '08:45:00', 'Eletrocardiograma', 'Registro da atividade elétrica do coração', 43567, 13, 3),
('2024-02-11', '13:30:00', 'Dermatologia', 'Avaliação e tratamento de problemas de pele', 54678, 1, 4),
('2024-03-06', '11:00:00', 'Exame de Fezes', 'Análise para detecção de parasitas', 65789, 2, 5),
('2024-04-19', '15:45:00', 'Ecocardiografia', 'Ultrassom do coração para diagnóstico detalhado', 12345, 3, 6),
('2024-05-20', '09:50:00', 'Cirurgia Ortopédica', 'Cirurgia para correção de problemas ósseos', 23456, 4, 7),
('2024-06-13', '14:25:00', 'Exame Neurológico', 'Avaliação do sistema nervoso', 34567, 5, 8),
('2024-07-02', '10:10:00', 'Endocrinologia', 'Avaliação e tratamento de problemas hormonais', 45678, 6, 9),
('2024-08-21', '12:30:00', 'Exame de Urina', 'Análise para detecção de problemas renais', 56789, 7, 10);

-- Incremento automático de idAnimal
ALTER TABLE `Animal`
  MODIFY `idAnimal` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

-- Incremento automático de idSecretaria
ALTER TABLE `Secretaria`
  MODIFY `idSecretaria` INT NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

-- Incremento automático de idExame
ALTER TABLE `Exame`
  MODIFY `idExame` INt NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;


COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;