<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Mapeamos los generos para introducir en la base de datos
        $genres = DB::table('genres')->pluck('id', 'name');

        $moviesData = [
            // ACCIÓN
            ['title' => 'Mad Max: Furia en la carretera', 'synopsis' => 'En un desierto postapocalíptico, Max ayuda a una mujer rebelde y a un grupo de prisioneras a escapar de un tirano.', 'duration' => 120, 'age' => 16, 'genre' => 'Acción'],
            ['title' => 'John Wick', 'synopsis' => 'Un exasesino a sueldo suspende su jubilación para localizar a los gánsteres que mataron a su perro y le robaron todo.', 'duration' => 101, 'age' => 18, 'genre' => 'Acción'],
            ['title' => 'El Caballero Oscuro', 'synopsis' => 'Batman se enfrenta al Joker, un criminal psicópata que quiere sumir a Gotham en la anarquía.', 'duration' => 152, 'age' => 12, 'genre' => 'Acción'],
            ['title' => 'Gladiator', 'synopsis' => 'Un general romano traicionado busca venganza contra el emperador corrupto que asesinó a su familia.', 'duration' => 155, 'age' => 16, 'genre' => 'Acción'],
            ['title' => 'Duro de Matar', 'synopsis' => 'Un policía de Nueva York se enfrenta solo a un grupo de terroristas que han tomado un rascacielos en Los Ángeles.', 'duration' => 132, 'age' => 18, 'genre' => 'Acción'],
            ['title' => 'Terminator 2: El Juicio Final', 'synopsis' => 'Un cyborg debe proteger al joven John Connor de un modelo más avanzado enviado para matarlo.', 'duration' => 137, 'age' => 16, 'genre' => 'Acción'],
            ['title' => 'Misión Imposible: Fallout', 'synopsis' => 'Ethan Hunt y su equipo deben correr contra el tiempo tras una misión fallida que involucra plutonio robado.', 'duration' => 147, 'age' => 12, 'genre' => 'Acción'],
            ['title' => 'Los Vengadores', 'synopsis' => 'Los héroes más poderosos de la Tierra deben aprender a luchar juntos para detener a una invasión extraterrestre.', 'duration' => 143, 'age' => 7, 'genre' => 'Acción'],
            ['title' => 'Top Gun: Maverick', 'synopsis' => 'Después de treinta años, Maverick sigue superando los límites como piloto de pruebas y entrenando a una nueva generación.', 'duration' => 130, 'age' => 7, 'genre' => 'Acción'],
            ['title' => 'Kill Bill: Vol. 1', 'synopsis' => 'Una asesina despierta de un coma y busca venganza contra sus antiguos compañeros que intentaron matarla.', 'duration' => 111, 'age' => 18, 'genre' => 'Acción'],

            // CIENCIA FICCIÓN
            ['title' => 'Inception', 'synopsis' => 'Un ladrón que roba secretos a través de los sueños recibe la misión de implantar una idea en la mente de un CEO.', 'duration' => 148, 'age' => 12, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Matrix', 'synopsis' => 'Un hacker descubre que la realidad es una simulación creada por máquinas y se une a la rebelión humana.', 'duration' => 136, 'age' => 16, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Interstellar', 'synopsis' => 'Un grupo de exploradores viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad.', 'duration' => 169, 'age' => 7, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Blade Runner 2049', 'synopsis' => 'Un nuevo blade runner descubre un secreto enterrado hace mucho tiempo que podría sumir a la sociedad en el caos.', 'duration' => 164, 'age' => 16, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Dune', 'synopsis' => 'Paul Atreides viaja al planeta más peligroso del universo para asegurar el futuro de su familia y su pueblo.', 'duration' => 155, 'age' => 12, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Alien: El octavo pasajero', 'synopsis' => 'La tripulación de una nave comercial se encuentra con una forma de vida mortal tras investigar una llamada de socorro.', 'duration' => 117, 'age' => 16, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Volver al Futuro', 'synopsis' => 'Un adolescente viaja accidentalmente 30 años al pasado en un DeLorean modificado por un científico excéntrico.', 'duration' => 116, 'age' => 0, 'genre' => 'Ciencia Ficción'],
            ['title' => 'La Llegada', 'synopsis' => 'Una lingüista trabaja para comunicarse con extraterrestres que han llegado a la Tierra antes de que estalle una guerra.', 'duration' => 116, 'age' => 7, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Avatar', 'synopsis' => 'Un marine parapléjico enviado a la luna Pandora se debate entre seguir órdenes y proteger el mundo que siente como su hogar.', 'duration' => 162, 'age' => 7, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Star Wars: Una Nueva Esperanza', 'synopsis' => 'Luke Skywalker se une a un caballero Jedi y un piloto arrogante para salvar a la galaxia del Imperio.', 'duration' => 121, 'age' => 0, 'genre' => 'Ciencia Ficción'],

            // DRAMA
            ['title' => 'El Padrino', 'synopsis' => 'El envejecido patriarca de una dinastía del crimen organizado transfiere el control de su imperio clandestino a su hijo reacio.', 'duration' => 175, 'age' => 18, 'genre' => 'Drama'],
            ['title' => 'Cadena Perpetua', 'synopsis' => 'Dos hombres encarcelados entablan una amistad a lo largo de los años, encontrando consuelo y redención final.', 'duration' => 142, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'Forrest Gump', 'synopsis' => 'Las presidencias de Kennedy y Johnson, Vietnam y el Watergate se desarrollan a través de la perspectiva de un hombre con bajo CI.', 'duration' => 142, 'age' => 7, 'genre' => 'Drama'],
            ['title' => 'La Lista de Schindler', 'synopsis' => 'En la Polonia ocupada por los alemanes durante la Segunda Guerra Mundial, Oskar Schindler se preocupa por su fuerza laboral judía.', 'duration' => 195, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'Parásitos', 'synopsis' => 'La codicia y la discriminación de clase amenazan la relación simbiótica entre la rica familia Park y el clan indigente Kim.', 'duration' => 132, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'El Club de la Pelea', 'synopsis' => 'Un oficinista insomne y un fabricante de jabón forman un club de lucha clandestino que evoluciona hacia algo mucho más grande.', 'duration' => 139, 'age' => 18, 'genre' => 'Drama'],
            ['title' => 'Whiplash', 'synopsis' => 'Un joven baterista prometedor se inscribe en un conservatorio de música donde sus sueños de grandeza son guiados por un instructor despiadado.', 'duration' => 106, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'Joker', 'synopsis' => 'Un comediante fallido y aislado socialmente se hunde en la locura mientras inspira una violenta revolución contracultural en Gotham.', 'duration' => 122, 'age' => 18, 'genre' => 'Drama'],
            ['title' => 'Titanic', 'synopsis' => 'Una joven aristócrata se enamora de un artista pobre a bordo del lujoso e infortunado R.M.S. Titanic.', 'duration' => 194, 'age' => 12, 'genre' => 'Drama'],
            ['title' => '12 Años de Esclavitud', 'synopsis' => 'En el Estados Unidos antes de la guerra civil, un hombre negro libre del norte de Nueva York es secuestrado y vendido como esclavo.', 'duration' => 134, 'age' => 16, 'genre' => 'Drama'],

            // COMEDIA
            ['title' => 'Superbad', 'synopsis' => 'Dos estudiantes de secundaria co-dependientes quieren lidiar con la ansiedad por separación con una fiesta llena de alcohol.', 'duration' => 113, 'age' => 16, 'genre' => 'Comedia'],
            ['title' => 'The Hangover', 'synopsis' => 'Tres amigos se despiertan de una despedida de soltero en Las Vegas sin recordar la noche anterior y sin el novio.', 'duration' => 100, 'age' => 16, 'genre' => 'Comedia'],
            ['title' => 'La Vida de Brian', 'synopsis' => 'Brian nace en el pesebre de al lado y confunden su vida con la del Mesías en esta sátira religiosa.', 'duration' => 94, 'age' => 12, 'genre' => 'Comedia'],
            ['title' => 'Barbie', 'synopsis' => 'Barbie sufre una crisis que la lleva a cuestionarse su mundo y su existencia, viajando al mundo real.', 'duration' => 114, 'age' => 7, 'genre' => 'Comedia'],
            ['title' => 'El Gran Hotel Budapest', 'synopsis' => 'Las aventuras de un conserje legendario en un famoso hotel europeo y su amistad con un joven empleado.', 'duration' => 99, 'age' => 12, 'genre' => 'Comedia'],
            ['title' => 'Zoolander', 'synopsis' => 'Al final de su carrera, un modelo masculino con pocas luces es lavado el cerebro para asesinar al Primer Ministro de Malasia.', 'duration' => 89, 'age' => 12, 'genre' => 'Comedia'],
            ['title' => 'Chicas Pesadas', 'synopsis' => 'Cady Heron es un éxito con las Plásticas, las chicas populares, hasta que comete el error de enamorarse del exnovio de la líder.', 'duration' => 97, 'age' => 12, 'genre' => 'Comedia'],
            ['title' => 'La Máscara', 'synopsis' => 'Un empleado bancario tímido descubre una máscara antigua que lo transforma en un superhéroe bromista y maníaco.', 'duration' => 101, 'age' => 7, 'genre' => 'Comedia'],
            ['title' => 'Tropic Thunder', 'synopsis' => 'A un grupo de actores se les cae en medio de la selva real creyendo que están filmando una película de guerra.', 'duration' => 107, 'age' => 16, 'genre' => 'Comedia'],
            ['title' => 'Cazafantasmas', 'synopsis' => 'Tres exprofesores de parapsicología crean un servicio único de eliminación de fantasmas en Nueva York.', 'duration' => 105, 'age' => 0, 'genre' => 'Comedia'],

            // TERROR
            ['title' => 'El Resplandor', 'synopsis' => 'Una familia se dirige a un hotel aislado para el invierno donde una presencia espiritual maligna influye en el padre hacia la violencia.', 'duration' => 146, 'age' => 18, 'genre' => 'Terror'],
            ['title' => 'El Exorcista', 'synopsis' => 'Cuando una adolescente es poseída por una entidad misteriosa, su madre busca la ayuda de dos sacerdotes para salvarla.', 'duration' => 122, 'age' => 18, 'genre' => 'Terror'],
            ['title' => 'Hereditary', 'synopsis' => 'Tras la muerte de la matriarca, una familia afligida es perseguida por sucesos trágicos e inquietantes.', 'duration' => 127, 'age' => 18, 'genre' => 'Terror'],
            ['title' => 'It', 'synopsis' => 'En el verano de 1989, un grupo de niños acosados se unen para destruir a un monstruo que cambia de forma y se disfraza de payaso.', 'duration' => 135, 'age' => 18, 'genre' => 'Terror'],
            ['title' => 'Un Lugar en Silencio', 'synopsis' => 'Una familia debe vivir en absoluto silencio para esconderse de criaturas que cazan por el sonido.', 'duration' => 90, 'age' => 12, 'genre' => 'Terror'],
            ['title' => 'Psicosis', 'synopsis' => 'Una secretaria roba 40.000 dólares y se da a la fuga, alojándose en un motel remoto dirigido por un joven bajo la dominación de su madre.', 'duration' => 109, 'age' => 16, 'genre' => 'Terror'],
            ['title' => 'El Conjuro', 'synopsis' => 'Los investigadores paranormales Ed y Lorraine Warren trabajan para ayudar a una familia aterrorizada por una presencia oscura.', 'duration' => 112, 'age' => 16, 'genre' => 'Terror'],
            ['title' => 'Get Out', 'synopsis' => 'Un joven afroamericano visita la finca de la familia de su novia blanca, donde descubre un motivo siniestro tras su invitación.', 'duration' => 104, 'age' => 16, 'genre' => 'Terror'],
            ['title' => 'Scream', 'synopsis' => 'Un año después del asesinato de su madre, una adolescente es aterrorizada por un nuevo asesino que utiliza películas de terror como juego.', 'duration' => 111, 'age' => 18, 'genre' => 'Terror'],
            ['title' => 'Midsommar', 'synopsis' => 'Una pareja viaja a Suecia para visitar el festival de verano de una ciudad rural, que se convierte en una competencia violenta y extraña.', 'duration' => 148, 'age' => 18, 'genre' => 'Terror'],

            // ANIMACIÓN
            ['title' => 'El Rey León', 'synopsis' => 'El príncipe león Simba y su padre son el objetivo de su malvado tío, quien quiere ascender al trono a toda costa.', 'duration' => 88, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Toy Story', 'synopsis' => 'Un muñeco vaquero se siente amenazado y celoso cuando una nueva figura de acción espacial lo suplanta como el juguete favorito.', 'duration' => 81, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'El Viaje de Chihiro', 'synopsis' => 'Durante la mudanza de su familia, una niña de 10 años deambula por un mundo gobernado por dioses, brujas y espíritus.', 'duration' => 125, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Spider-Man: Un Nuevo Universo', 'synopsis' => 'Miles Morales se convierte en el Spider-Man de su universo y debe unirse a otros individuos arácnidos de otras dimensiones.', 'duration' => 117, 'age' => 7, 'genre' => 'Animación'],
            ['title' => 'Coco', 'synopsis' => 'El aspirante a músico Miguel entra en la Tierra de los Muertos para encontrar a su tatarabuelo, un cantante legendario.', 'duration' => 105, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Shrek', 'synopsis' => 'Un ogro malhumorado y un burro parlanchín se embarcan en una misión para rescatar a una princesa de un dragón.', 'duration' => 90, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Buscando a Nemo', 'synopsis' => 'Después de que su hijo es capturado y llevado a Sídney, un pez payaso tímido emprende un viaje para traerlo a casa.', 'duration' => 100, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Los Increíbles', 'synopsis' => 'Una familia de superhéroes encubiertos intenta vivir una vida suburbana tranquila, pero se ven obligados a entrar en acción para salvar el mundo.', 'duration' => 115, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Ratatouille', 'synopsis' => 'Una rata que sabe cocinar hace una alianza inusual con un joven trabajador de cocina en un famoso restaurante de París.', 'duration' => 111, 'age' => 0, 'genre' => 'Animación'],
            ['title' => 'Up', 'synopsis' => 'Un anciano de 78 años viaja a las cataratas del Paraíso en su casa equipada con globos, llevándose inadvertidamente a un joven polizón.', 'duration' => 96, 'age' => 0, 'genre' => 'Animación'],

            // AVENTURA
            ['title' => 'El Señor de los Anillos: La Comunidad del Anillo', 'synopsis' => 'Un hobbit manso y ocho compañeros emprenden un viaje para destruir el Anillo Único y al Señor Oscuro Sauron.', 'duration' => 178, 'age' => 12, 'genre' => 'Aventura'],
            ['title' => 'Indiana Jones y los Cazadores del Arca Perdida', 'synopsis' => 'Un arqueólogo es contratado por el gobierno de los EE. UU. para encontrar el Arca de la Alianza antes que los nazis.', 'duration' => 115, 'age' => 7, 'genre' => 'Aventura'],
            ['title' => 'Piratas del Caribe: La Maldición del Perla Negra', 'synopsis' => 'El herrero Will Turner se une al excéntrico pirata Jack Sparrow para salvar a su amor, la hija del gobernador.', 'duration' => 143, 'age' => 7, 'genre' => 'Aventura'],
            ['title' => 'Jurassic Park', 'synopsis' => 'Un parque temático sufre una falla eléctrica importante que permite que sus dinosaurios clonados se vuelvan locos.', 'duration' => 127, 'age' => 12, 'genre' => 'Aventura'],
            ['title' => 'La Vida de Pi', 'synopsis' => 'Un joven que sobrevive a un desastre en el mar se embarca en un viaje épico de aventura y descubrimiento con un tigre de Bengala.', 'duration' => 127, 'age' => 7, 'genre' => 'Aventura'],
            ['title' => 'El Renacido', 'synopsis' => 'Un hombre de la frontera en una expedición de comercio de pieles lucha por sobrevivir después de ser mutilado por un oso y dado por muerto.', 'duration' => 156, 'age' => 16, 'genre' => 'Aventura'],
            ['title' => 'Jumanji: Bienvenidos a la Jungla', 'synopsis' => 'Cuatro adolescentes son absorbidos por un videojuego mágico y la única forma de escapar es trabajar juntos para terminar el juego.', 'duration' => 119, 'age' => 7, 'genre' => 'Aventura'],
            ['title' => 'Náufrago', 'synopsis' => 'Un ejecutivo de FedEx debe transformarse física y emocionalmente para sobrevivir a un aterrizaje forzoso en una isla desierta.', 'duration' => 143, 'age' => 7, 'genre' => 'Aventura'],
            ['title' => 'La Momia', 'synopsis' => 'Un arqueólogo estadounidense despierta accidentalmente a una momia que comienza a causar estragos mientras busca la reencarnación de su amor.', 'duration' => 124, 'age' => 12, 'genre' => 'Aventura'],
            ['title' => 'Enola Holmes', 'synopsis' => 'Cuando la madre de Enola Holmes desaparece, ella usa sus habilidades de detective para burlar a su hermano Sherlock y ayudar a un lord fugitivo.', 'duration' => 123, 'age' => 12, 'genre' => 'Aventura'],

            // ROMANCE
            ['title' => 'El Diario de Noa', 'synopsis' => 'Un hombre pobre pero apasionado se enamora de una joven rica, dándole una sensación de libertad, pero pronto son separados por sus diferencias sociales.', 'duration' => 123, 'age' => 12, 'genre' => 'Romance'],
            ['title' => 'Orgullo y Prejuicio', 'synopsis' => 'Las chispas vuelan cuando la enérgica Elizabeth Bennet conoce al soltero, rico y orgulloso Sr. Darcy.', 'duration' => 129, 'age' => 0, 'genre' => 'Romance'],
            ['title' => 'La La Land', 'synopsis' => 'Mientras navegan por sus carreras en Los Ángeles, un pianista y una actriz se enamoran mientras intentan reconciliar sus aspiraciones.', 'duration' => 128, 'age' => 0, 'genre' => 'Romance'],
            ['title' => 'Bajo la Misma Estrella', 'synopsis' => 'Dos pacientes adolescentes con cáncer comienzan un viaje de afirmación de la vida para visitar a un autor recluso en Ámsterdam.', 'duration' => 126, 'age' => 12, 'genre' => 'Romance'],
            ['title' => 'Mujer Bonita', 'synopsis' => 'Un hombre en un negocio legal pero doloroso necesita una acompañante para algunos eventos sociales y contrata a una hermosa prostituta.', 'duration' => 119, 'age' => 12, 'genre' => 'Romance'],
            ['title' => '500 Días con Ella', 'synopsis' => 'Una comedia romántica poco convencional sobre una mujer que no cree que el amor verdadero exista y el joven que se enamora de ella.', 'duration' => 95, 'age' => 12, 'genre' => 'Romance'],
            ['title' => 'Realmente Amor', 'synopsis' => 'Sigue las vidas de ocho parejas muy diferentes al lidiar con sus vidas amorosas en un mes frenético antes de Navidad en Londres.', 'duration' => 135, 'age' => 12, 'genre' => 'Romance'],
            ['title' => 'Yo Antes de Ti', 'synopsis' => 'Una chica forma un vínculo improbable con un hombre recientemente paralizado a quien cuida.', 'duration' => 110, 'age' => 12, 'genre' => 'Romance'],
            ['title' => 'Cuestión de Tiempo', 'synopsis' => 'A la edad de 21 años, Tim descubre que puede viajar en el tiempo y cambiar lo que sucede y ha sucedido en su propia vida.', 'duration' => 123, 'age' => 7, 'genre' => 'Romance'],
            ['title' => 'Grease', 'synopsis' => 'Una chica buena y un chico malo se enamoran en el verano y descubren que van a la misma escuela secundaria.', 'duration' => 110, 'age' => 0, 'genre' => 'Romance'],

            // CRIMEN
            ['title' => 'Pulp Fiction', 'synopsis' => 'Las vidas de dos mafiosos, un boxeador, la esposa de un gángster y un par de bandidos se entrelazan en cuatro historias de violencia.', 'duration' => 154, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Ciudad de Dios', 'synopsis' => 'En los barrios pobres de Río, dos niños toman caminos diferentes; uno se convierte en fotógrafo y el otro en narcotraficante.', 'duration' => 130, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Scarface', 'synopsis' => 'En 1980 en Miami, un inmigrante cubano decidido se hace cargo de un cártel de drogas y sucumbe a la codicia.', 'duration' => 170, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Los Infiltrados', 'synopsis' => 'Un policía encubierto y un topo en la policía intentan identificarse mutuamente mientras se infiltran en una pandilla irlandesa.', 'duration' => 151, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Seven', 'synopsis' => 'Dos detectives, un novato y un veterano, persiguen a un asesino en serie que usa los siete pecados capitales como sus motivos.', 'duration' => 127, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Buenos Muchachos', 'synopsis' => 'La historia de Henry Hill y su vida en la mafia, cubriendo su relación con su esposa y sus socios mafiosos.', 'duration' => 146, 'age' => 18, 'genre' => 'Crimen'],
            ['title' => 'Sospechosos Habituales', 'synopsis' => 'Un único superviviente cuenta la retorcida historia de una serie de eventos criminales que comenzaron con cinco delincuentes en una rueda de reconocimiento.', 'duration' => 106, 'age' => 16, 'genre' => 'Crimen'],
            ['title' => 'Fargo', 'synopsis' => 'El crimen inepto de un vendedor de coches de Minnesota se desmorona debido a su torpeza y al trabajo persistente de una jefa de policía embarazada.', 'duration' => 98, 'age' => 16, 'genre' => 'Crimen'],
            ['title' => 'Zodiac', 'synopsis' => 'Entre 1968 y 1983, un dibujante de San Francisco se convierte en un detective aficionado obsesionado con rastrear al asesino del Zodiaco.', 'duration' => 157, 'age' => 16, 'genre' => 'Crimen'],
            ['title' => 'Ocean\'s Eleven', 'synopsis' => 'Danny Ocean y sus diez cómplices planean robar tres casinos de Las Vegas simultáneamente.', 'duration' => 116, 'age' => 12, 'genre' => 'Crimen'],

            // FANTASÍA
            ['title' => 'Harry Potter y la Piedra Filosofal', 'synopsis' => 'Un niño huérfano se inscribe en una escuela de magia, donde aprende la verdad sobre sí mismo, su familia y el terrible mal que acecha.', 'duration' => 152, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'El Laberinto del Fauno', 'synopsis' => 'En la España falangista de 1944, la joven hijastra de un sádico oficial del ejército escapa a un mundo de fantasía inquietante pero cautivador.', 'duration' => 118, 'age' => 16, 'genre' => 'Fantasía'],
            ['title' => 'La Forma del Agua', 'synopsis' => 'En una instalación de investigación secreta en la década de 1960, una conserje solitaria forma una relación única con una criatura anfibia.', 'duration' => 123, 'age' => 16, 'genre' => 'Fantasía'],
            ['title' => 'Eduardo Manostijeras', 'synopsis' => 'Un hombre artificial, que fue construido incompletamente y tiene tijeras en lugar de manos, lleva una vida solitaria hasta que una dama lo conoce.', 'duration' => 105, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'La Historia Interminable', 'synopsis' => 'Un niño con problemas se sumerge en un maravilloso mundo de fantasía a través de las páginas de un libro misterioso.', 'duration' => 102, 'age' => 0, 'genre' => 'Fantasía'],
            ['title' => 'Las Crónicas de Narnia', 'synopsis' => 'Cuatro niños viajan a través de un armario a la tierra de Narnia y aprenden de su destino para liberarla con la guía de un león místico.', 'duration' => 143, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'Stardust', 'synopsis' => 'En un campo que bordea un territorio mágico, un joven hace una promesa a su amada de que le traerá una estrella caída entrando en el reino mágico.', 'duration' => 127, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'La Princesa Prometida', 'synopsis' => 'Mientras está enfermo en cama, el abuelo de un niño le lee la historia de un granjero convertido en pirata que enfrenta obstáculos para reunirse con su amor.', 'duration' => 98, 'age' => 0, 'genre' => 'Fantasía'],
            ['title' => 'Charlie y la Fábrica de Chocolate', 'synopsis' => 'Un niño gana un recorrido por la fábrica de chocolate más magnífica del mundo, dirigida por el chocolatero más inusual del mundo.', 'duration' => 115, 'age' => 0, 'genre' => 'Fantasía'],
            ['title' => 'Big Fish', 'synopsis' => 'Un hijo frustrado intenta distinguir la realidad de la ficción en la vida de su padre moribundo.', 'duration' => 125, 'age' => 7, 'genre' => 'Fantasía'],
        ];

        foreach ($moviesData as $movie) {
            $genreName = $movie['genre'];
            
            // Verificamos que el género exista en el mapa antes de insertar
            if (isset($genres[$genreName])) {
                DB::table('movies')->insert([
                    'title' => $movie['title'],
                    'synopsis' => $movie['synopsis'],
                    'duration' => $movie['duration'],
                    'age' => $movie['age'],
                    'price' => rand(5, 12), // Precio aleatorio
                    'genre_id' => $genres[$genreName],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
