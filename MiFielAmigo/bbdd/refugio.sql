-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 09:50:29
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `refugio`
--
CREATE DATABASE IF NOT EXISTS `refugio` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `refugio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `adopcion`
--

DROP TABLE IF EXISTS `adopcion`;
CREATE TABLE `adopcion` (
  `idUsu` int(11) NOT NULL,
  `idPer` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perro`
--

DROP TABLE IF EXISTS `perro`;
CREATE TABLE `perro` (
  `idPer` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `raza` varchar(100) NOT NULL,
  `genero` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perro`
--

INSERT INTO `perro` (`idPer`, `nombre`, `raza`, `genero`, `descripcion`, `fec_nacimiento`, `foto`) VALUES
(1, 'Trufa', 'Macho', 'Mestizo', 'Trufa y Trully son hermanos de una camada de embarazos no deseados. En realidad, había tres cachorros, pero uno murió.\r\nEl dueño de la madre de los cachorros, es cliente de nuestro veterinario Antonio. Le pidió ayuda a Alicia y ella trajo a los dos cachorros a Manuel, un hogar de acogida, porque él siempre ayuda.\r\nTrufa y Trully fueron ubicadas en este hogar de acogida porque eran muy pequeñas.\r\nSon cachorros muy sociables y tiernos, siempre en busca de la proximidad de los humanos.', '2019-09-14', 'images/perros/Trufa.png'),
(2, 'Estrella', 'Mestizo', 'Hembra', 'Estrella es poco sociable, cariñosa a veces... Aunque le gusta que le mimen mucho, no quiere que le den besos pero ella a ti todos los posibles. Le gusta mucho el calor, tomando el sol o debajo de la manta. Es muy inteligente pero solo cuando quiere. Le encanta estar en casa y viajar en el asiento del copiloto en el coche.\r\n\r\n\r\n\r\n\r\n\r\n', '2007-09-30', 'images/perros/Estrella.png'),
(3, 'Thomas', 'Mestizo', 'Macho', 'Thomas y Teddy son muy sociables, amorosos, muy gentiles, cuidadosos, curiosos, tranquilos y equilibrados. Su madre fue abandonada por su dueño cuando estaba muy embarazada. En la calle dio a luz a los cachorros, una mujer nativa del pueblo los alimentó. Cuando los cachorros cumplieron un mes de edad, comenzaron a salir del \"nido\" remoto, que a los aldeanos no les gustaba, y la familia de los perros estaba en peligro. Afortunadamente, la familia fue notada por una mujer que ayudaba a los animales sin hogar. Ella sacaba a los cachorros de la calle y los llevaba al refugio donde ahora viven.', '2019-07-27', 'images/perros/Thomas.png'),
(4, 'Denny', 'Mestizo', 'Macho', 'En una aldea detrás de los garajes, una perra ciega de la calle había dado a luz a sus cachorros. A medida que crecieron, comenzaron a salir del nido y a conocer a las personas que no les gustaban mucho, y decidieron eliminar a la familia de los perros. Un activista de los derechos de los animales ha visto un llamado de ayuda en las redes sociales sobre esta familia. Nadie, pero absolutamente nadie se acercó a ayudar.\r\nUn activista de los derechos de los animales llevó a la madre (que también buscaba un hogar) y a los cachorros Denny y Dustin a un hogar de acogida.\r\nDenny es un cachorro muy hermoso, de buen carácter, inteligente, ágil, ansioso por aprender y a una edad en la que necesita un amigo y mentor.\r\nDenny es un cachorro cariñoso y afable, no tan arrogante como su hermano Dustin.', '2019-07-15', 'images/perros/Denny.png'),
(5, 'Dustin', 'Meztizo', 'Macho', 'En una aldea detrás de los garajes, una perra ciega de la calle había dado a luz a sus cachorros. A medida que crecieron, comenzaron a salir del nido y a conocer a las personas que no les gustaban mucho, y decidieron eliminar a la familia de los perros. Un activista de los derechos de los animales ha visto un llamado de ayuda en las redes sociales sobre esta familia. Nadie, pero absolutamente nadie se acercó a ayudar.\r\nUn activista de los derechos de los animales llevó a la madre (que también buscaba un hogar) y a los cachorros Dustin y Denny a un hogar de acogida.\r\nDustin es un cachorro muy activo, emocional, feliz, hace todo con placer: sale a caminar, juega. Le encanta comer y cuando llega la hora de comer, está ansioso por su comida. Después de comer, a Dustin le gusta relajarse (a diferencia de los cachorros que suelen retozar después de comer). La obediencia, fácil de entrenar, muy orientada a los humanos, entiende lo que quieres de él, responde a las \"críticas\". Está muy interesado en el mundo que lo rodea, disfruta de un paseo, está feliz de conocer gente. Junto con su hermano, Denny, jugando: él es el líder.', '2019-07-15', 'images/perros/Dustin.png'),
(6, 'Bala', 'Bodeguero ratonero', 'Hembra', 'Bala y sus hermanos, Fusil, Polvora, Revolver, Dinamita y Cartucho fueron tirados en una caja fuera del refugio.\r\nAfortunadamente, a los bribones no les ha pasado nada. Todos son sociables, juguetones, agradables y amorosos.\r\nAhora están esperando a una familia, como con los niños, que con amor, paciencia pero de manera constante enseña a los perros.', '2019-07-02', 'images/perros/Bala.png'),
(7, 'Belier', 'Mestizo', 'Macho', 'Al principio era tímido, pero rápidamente se hizo amigo de Pepsi.\r\nAsí que el hogar de acogida decidió acogerlo y ahora, como Pepsi, está buscando un hogar en Alemania.\r\nBelier es amigable, juguetona y curiosa.\r\nSe lleva bien con todos los perros y es respetuoso al tratar con el perro más viejo de la casa.', '2019-04-20', 'images/perros/Belier.png'),
(8, 'Pepsi', 'Mestizo pastor alemán', 'Hembra', 'Un niño se encontró accidentalmente con niños gitanos mientras hacía alboroto y ruido en la calle, aterrorizando a un pequeño perro que constantemente corría de un lado a otro con miedo.\r\nEl niño se acercó a los niños gitanos, los reprendió y se llevó al perrito a casa.\r\nLa familia le pidió a Mi que ayudara a Amigo a encontrar un nuevo hogar en Alemania para Pepsi.\r\nPepsi es un cachorro típico, tierno y juguetón, pero tiene el encanto de comunicarse con uno, sus expresiones faciales siempre te hacen reír.', '2019-03-26', 'images/perros/Pepsi.png'),
(9, 'Helsinki', 'Mestizo ratonero bodeguero', 'Macho', 'La madre, un pura sangre Ratonero Bodeguero Andaluz, vive en una bodega. El dueño había descuidado castrar a la perra, por lo que llegó al embarazo.\r\nCuando trajo a la pandilla de cachorros al refugio, prometió castrar a la madre para que no tuviera más cachorros, de lo cual tenemos que ocuparnos.\r\nHelsinki y sus hermanos al principio eran muy tímidos y reservados, ya que estaban acostumbrados a vivir en el campo. Después de un corto tiempo tuvieron confianza, jugaron entre ellos y también con otros perros. \r\nEn general, son encantadores, típicos cachorros, juguetones, socialmente aceptables.', '2019-07-23', 'images/perros/Helsinki.png'),
(10, 'Stefan', 'Mestizo', 'Macho', 'Stefan es un niño muy dulce, dulce. Un poco tímido Amigable con otros perros, fácil de entrenar.\r\nCaptura todo en un santiamén. Le encantan los diferentes juguetes, le encantan los juegos con los conespecíficos.\r\nÉl es bondadoso, inteligente y ágil, le gusta acurrucarse.\r\nEn una mañana lluviosa muy temprana en Orsk, cuando todavía estaba oscuro, una mujer caminaba con sus perros y escuchó un gemido. Corrió y vio debajo de un auto, un cachorro, mojado, sucio y asustado.\r\nCuando el cachorro vio a la mujer y sus perros, lloró más fuerte.\r\nEn tensión, el cachorro corrió de un auto a otro. Pero la mujer logró atraparlo.\r\nAl tocarse, el pequeño se estremeció y chirrió. Se empujó al suelo, como si quisiera volverse invisible.\r\nCuando se calmó un poco, se durmió y durmió mucho tiempo.\r\nEntonces comenzó una nueva vida y esperamos que encuentre a su familia amorosa.', '2019-06-21', 'images/perros/Stefan.png'),
(11, 'Tim', 'Chihuahua mix', 'Macho', 'La \"familia\" de Tim tiene suficiente de él y ya no quiere tenerlo. Ahora el hermoso joven busca un nuevo hogar en Alemania.\r\nTim es un perro joven y tímido que aún no ha aprendido mucho. En una situación que conoce, le encanta jugar y correr. Se orienta muy cerca de su persona, lo mira a los ojos, espera órdenes y comprende mucho.\r\nTim necesita personas que puedan darle la seguridad necesaria y estén dispuestos a darle su tiempo para llegar. Él es un verdadero tesoro cuando ha florecido.', '2018-11-02', 'images/perros/Tim.png'),
(12, 'Nala', 'Mestizo ', 'Hembra', 'Nala fue encontrada en el granero de una granja. La hija del dueño conoce a Alberto y Alicia y les informó. Alberto acordó hacerse cargo del perro, pero solo después\r\nBueno, incluso antes de que pudiera castrarse, nacieron sus 8 cachorros.\r\nNala es tierno, social y ama mucho a la gente.\r\nElla espera las visitas humanas diarias y es obediente.\r\nTambién cuida muy bien a su cachorro y podemos imaginar que podría encajar bien en todas las familias.', '2017-11-28', 'images/perros/Nala.png'),
(13, 'Sena', 'Mestizo', 'Hembra', 'Dos adolescentes cruzaron el campo en bicicleta cerca de una zanja cuando encontraron dos cajas en la zanja. Las cajas ya estaban mojadas y los cachorros adentro estaban casi ahogados.\r\nUno de los niños alertó a su madre, mientras que el otro se hizo cargo de los cachorros.\r\nLa madre vino con su auto y trajo los cachorros a Alicia y Alberto.\r\nAhora vive Volga, Sena, Mosa, Elba, Loira y Dangava de forma segura en el refugio y se comporta como un cachorro, generalmente juguetón y tierno.', '2019-04-10', 'images/perros/Sena.png'),
(14, 'Iris', 'Mestizo labrador', 'Hembra', 'Iris fue encontrada en una noche lluviosa fuera de la puerta de un bloque de pisos donde buscaba refugio. Una mujer que llegó a casa tarde por la noche se llevó el bulto empapado a su casa.\r\nIris estaba llena de energía, juguetona y social mente compatible con los adultos y niños. Es una perrita muy dulce que necesita desesperadamente a su propia familia, con hijos.\r\n¿Quién quiere darle al hermoso iris un hogar para siempre?', '2019-07-04', 'images/perros/Iris.png'),
(15, 'Elfo', 'Mestizo', 'Macho', 'Elfo fue observado por un momento por una mujer que lo había descubierto desviándose entre los olivares. Al principio pensó que era un gato blanco tierno, pero un día descubrió que Elfo era un perro en un estado lamentablemente demacrado.\r\nElla podría llevarlo a casa y animarlo.\r\nMientras tanto, Elfo también podría ser vacunado, ya que su condición se ha fortalecido.\r\nElfo es un perro-perro mágico que todavía es muy tímido con los ruidos fuertes.\r\nSuponemos que tiene una naturaleza sensible que debe ser recibida con mucha paciencia y amor, luego Elfo pierde su timidez y le encanta acurrucarse de forma segura en el regazo de su ser humano', '2018-11-14', 'images/perros/Elfo.png'),
(16, 'Belem', 'Mestizo', 'Hembra', 'Belem estaba en medio de la carretera cuando uno de nuestros voluntarios la vio.\r\nEra un milagro que todavía no la hubieran atropellado, así que se detuvo de inmediato, cruzó la peligrosa carretera y tomó a Belem en sus brazos.\r\nBelem estaba embarazada y tuvo que ser castrada de inmediato.\r\nAhora vive con nosotros en el refugio y es una perra llena de encanto.\r\nCreemos que Belem sería ideal para una familia con niños porque está llena de vitalidad y entusiasmo por la vida.', '2018-11-04', 'images/perros/Belem.png'),
(17, 'Chelsea', 'Meztizo', 'Hembra', 'Chelsea fue alimentada por un niño una y otra vez. Pero ella no aceptó la comida hasta que él se fue.\r\nDespués de un tiempo, se volvió más confiada y se dejó tocar. Se llevó a Chelsea a su casa y la llevó al veterinario al día siguiente.\r\nEl veterinario presentó una lesión en el tercer párpado de un ojo. Esto tuvo que ser operado, lo cual es muy costoso y, por lo tanto, nos pidieron apoyo financiero.\r\nChelsea se ha sometido a una cirugía (algunas fotos lo muestran), recuperándose bien y aumentando de peso.\r\nChelsea, a pesar de su corta edad, es una perra muy tranquila. Ella se lleva bien con todos los otros perros en el refugio.\r\nPara Chelsea buscamos personas activas, una familia con niños que, debido a su tamaño, sean un poco mayores y más estables.', '2019-01-15', 'images/perros/Chelsea.png'),
(18, 'Assol', 'Mestizo', 'Hembra', 'Assol es una verdadera belleza! Ella es como una princesa y inevitablemente debes sonreír cuando la veas.\r\nHasta hace poco, ella caminaba por las calles de la ciudad en busca de restos de comida. Descubrimos que Assol ha estado expuesto varias veces. Ella apareció en diferentes partes de la ciudad.\r\nProbablemente notaste que un cachorro también está haciendo un trabajo.\r\nAssol ahora vive en un hogar de acogida, esperando a personas en las que pueda confiar indefinidamente.\r\n¿Podrías ser esta persona?', '2019-07-02', 'images/perros/Assol.png'),
(19, 'Suecia', 'Mestizo ratonero bodeguero', 'Hembra', 'Suecia y sus hermanos, son el \"resultado\" de un embarazo no deseado.\r\nLa madre, un pura sangre Ratonero Bodeguero Andaluz, vive en una bodega. El dueño había descuidado castrar a la perra, por lo que llegó al embarazo.\r\nCuando trajo a la pandilla de cachorros al refugio, prometió castrar a la madre para que no tuviera más cachorros, de lo cual tenemos que ocuparnos. Al principio eran muy tímidos y reservados, ya que estaban acostumbrados a vivir en el campo. Después de un corto tiempo tuvieron confianza, jugaron entre ellos y también con mis otros perros. \r\nEn general, son encantadores, típicos cachorros, juguetones, socialmente aceptables.', '2019-08-06', 'images/perros/Suecia.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `api_key` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD PRIMARY KEY (`idUsu`,`idPer`),
  ADD KEY `idPer` (`idPer`);

--
-- Indices de la tabla `perro`
--
ALTER TABLE `perro`
  ADD PRIMARY KEY (`idPer`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `perro`
--
ALTER TABLE `perro`
  MODIFY `idPer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `adopcion`
--
ALTER TABLE `adopcion`
  ADD CONSTRAINT `idPer` FOREIGN KEY (`idPer`) REFERENCES `perro` (`idPer`) ON DELETE CASCADE,
  ADD CONSTRAINT `idUsu` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
