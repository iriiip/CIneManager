<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Movie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

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

            // CIENCIA FICCIÓN
            ['title' => 'Inception', 'synopsis' => 'Un ladrón que roba secretos a través de los sueños recibe la misión de implantar una idea en la mente de un CEO.', 'duration' => 148, 'age' => 12, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Matrix', 'synopsis' => 'Un hacker descubre que la realidad es una simulación creada por máquinas y se une a la rebelión humana.', 'duration' => 136, 'age' => 16, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Interstellar', 'synopsis' => 'Un grupo de exploradores viaja a través de un agujero de gusano en busca de un nuevo hogar para la humanidad.', 'duration' => 169, 'age' => 7, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Blade Runner 2049', 'synopsis' => 'Un nuevo blade runner descubre un secreto enterrado hace mucho tiempo que podría sumir a la sociedad en el caos.', 'duration' => 164, 'age' => 16, 'genre' => 'Ciencia Ficción'],
            ['title' => 'Dune', 'synopsis' => 'Paul Atreides viaja al planeta más peligroso del universo para asegurar el futuro de su familia y su pueblo.', 'duration' => 155, 'age' => 12, 'genre' => 'Ciencia Ficción'],

            // DRAMA
            ['title' => 'El Padrino', 'synopsis' => 'El envejecido patriarca de una dinastía del crimen organizado transfiere el control de su imperio clandestino a su hijo reacio.', 'duration' => 175, 'age' => 18, 'genre' => 'Drama'],
            ['title' => 'Cadena Perpetua', 'synopsis' => 'Dos hombres encarcelados entablan una amistad a lo largo de los años, encontrando consuelo y redención final.', 'duration' => 142, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'Forrest Gump', 'synopsis' => 'Las presidencias de Kennedy y Johnson, Vietnam y el Watergate se desarrollan a través de la perspectiva de un hombre con bajo CI.', 'duration' => 142, 'age' => 7, 'genre' => 'Drama'],
            ['title' => 'La Lista de Schindler', 'synopsis' => 'En la Polonia ocupada por los alemanes durante la Segunda Guerra Mundial, Oskar Schindler se preocupa por su fuerza laboral judía.', 'duration' => 195, 'age' => 16, 'genre' => 'Drama'],
            ['title' => 'Parásitos', 'synopsis' => 'La codicia y la discriminación de clase amenazan la relación simbiótica entre la rica familia Park y el clan indigente Kim.', 'duration' => 132, 'age' => 16, 'genre' => 'Drama'],

            // COMEDIA
            ['title' => 'Superbad', 'synopsis' => 'Dos estudiantes de secundaria co-dependientes quieren lidiar con la ansiedad por separación con una fiesta llena de alcohol.', 'duration' => 113, 'age' => 16, 'genre' => 'Comedia'],
            ['title' => 'The Hangover', 'synopsis' => 'Tres amigos se despiertan de una despedida de soltero en Las Vegas sin recordar la noche anterior y sin el novio.', 'duration' => 100, 'age' => 16, 'genre' => 'Comedia'],
            ['title' => 'La Vida de Brian', 'synopsis' => 'Brian nace en el pesebre de al lado y confunden su vida con la del Mesías en esta sátira religiosa.', 'duration' => 94, 'age' => 12, 'genre' => 'Comedia'],
            ['title' => 'Barbie', 'synopsis' => 'Barbie sufre una crisis que la lleva a cuestionarse su mundo y su existencia, viajando al mundo real.', 'duration' => 114, 'age' => 7, 'genre' => 'Comedia'],
            ['title' => 'El Gran Hotel Budapest', 'synopsis' => 'Las aventuras de un conserje legendario en un famoso hotel europeo y su amistad con un joven empleado.', 'duration' => 99, 'age' => 12, 'genre' => 'Comedia'],
            // FANTASÍA
            ['title' => 'Harry Potter y la Piedra Filosofal', 'synopsis' => 'Un niño huérfano se inscribe en una escuela de magia, donde aprende la verdad sobre sí mismo, su familia y el terrible mal que acecha.', 'duration' => 152, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'El Laberinto del Fauno', 'synopsis' => 'En la España falangista de 1944, la joven hijastra de un sádico oficial del ejército escapa a un mundo de fantasía inquietante pero cautivador.', 'duration' => 118, 'age' => 16, 'genre' => 'Fantasía'],
            ['title' => 'La Forma del Agua', 'synopsis' => 'En una instalación de investigación secreta en la década de 1960, una conserje solitaria forma una relación única con una criatura anfibia.', 'duration' => 123, 'age' => 16, 'genre' => 'Fantasía'],
            ['title' => 'Eduardo Manostijeras', 'synopsis' => 'Un hombre artificial, que fue construido incompletamente y tiene tijeras en lugar de manos, lleva una vida solitaria hasta que una dama lo conoce.', 'duration' => 105, 'age' => 7, 'genre' => 'Fantasía'],
            ['title' => 'La Historia Interminable', 'synopsis' => 'Un niño con problemas se sumerge en un maravilloso mundo de fantasía a través de las páginas de un libro misterioso.', 'duration' => 102, 'age' => 0, 'genre' => 'Fantasía'],
        ];

        foreach ($moviesData as $data) {
            $genreName = $data['genre'];

            // Verificamos que el género exista en el mapa antes de insertar
            if (isset($genres[$genreName])) {
                $movie = Movie::create([
                    'title' => $data['title'],
                    'synopsis' => $data['synopsis'],
                    'duration' => $data['duration'],
                    'age' => $data['age'],
                    'price' => rand(5, 12), // Precio aleatorio
                    'genre_id' => $genres[$genreName],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $img = Str::slug($data['title']) . '.jpg';
            $pathToFile = public_path('img/' . $img);

            if (File::exists($pathToFile)) {
                $movie->addMedia($pathToFile)
                    ->preservingOriginal()
                    ->toMediaCollection('posters');
            }
        }
    }
}
