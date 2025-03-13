<?php
// Bot de Quiz para Telegram en PHP con soporte multilingüe

// Reemplaza con tu token de Telegram,KOKEBE
// $token = '244783962:AAECruNJJInkKw8BHqdJURSm-blGW9vy8MI'; //s3rr4
$token = '1682383212:AAFxgcTaVCCxdRVn6pp8JIh6lxUND3UeYkE'; //kokebe
$website = 'https://api.telegram.org/bot' . $token;

// Definir IDs de administradores que pueden acceder a reportes
$adminIds = [186963879, 987654321]; // Reemplazar con IDs reales

// Estructura para definir los textos en diferentes idiomas
$languageSelectionScreen = [
    'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/language_.jpg' // Asegúrate de reemplazar con la URL real de tu imagen
];
$languages = [
    'es' => [
        'name' => '🇪🇸 Es',
        'language_selection' => '¡Bienvenido al Quiz Multilingüe! Por favor, selecciona tu idioma:',
        'start_button' => '¡Comenzar el Quiz!',
        'retry_button' => 'Intentar nuevamente',
        'next_button' => 'Siguiente pregunta',
        'final_button' => '¡Ver resultado final!',
        'play_again' => 'Jugar nuevamente',
    ],
    'en' => [
        'name' => '🇬🇧 En',
        'language_selection' => 'Welcome to the Multilingual Quiz! Please select your language:',
        'start_button' => 'Start the Quiz!',
        'retry_button' => 'Try again',
        'next_button' => 'Next question',
        'final_button' => 'See final result!',
        'play_again' => 'Play again',
    ],
    'fr' => [
        'name' => '🇫🇷 Fr',
        'language_selection' => 'Bienvenue au Quiz Multilingue! Veuillez sélectionner votre langue:',
        'start_button' => 'Commencer le Quiz!',
        'retry_button' => 'Essayer à nouveau',
        'next_button' => 'Question suivante',
        'final_button' => 'Voir le résultat final!',
        'play_again' => 'Jouer à nouveau',
    ]
];

// Define los datos del quiz para cada idioma

// Define multilingual quiz data (5 screens) with added explanations
$quizData = [
    'es' => [
        [
            'question' => 'Pregunta 1: ¿Cuál es la capital de Francia?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/001_.jpg',
            'description' => 'Francia es un país en Europa Occidental conocido por su arte, cultura y gastronomía. Ahora debes identificar su capital.',
            'options' => ['Londres', 'París', 'Madrid'],
            'correct' => 1, // Segunda opción (París)
            'explanation' => 'París es la capital de Francia desde el año 987. Es conocida como la "Ciudad de la Luz" y alberga monumentos famosos como la Torre Eiffel, construida para la Exposición Universal de 1889.',
            'fun_fact' => '¿Sabías que? París tiene una réplica de la Estatua de la Libertad que mira hacia su "hermana mayor" en Nueva York, ya que la original fue un regalo de Francia a Estados Unidos.'
        ],
        [
            'question' => 'Pregunta 2: ¿Cuántos planetas hay en el sistema solar?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/002_.jpg',
            'description' => 'El sistema solar está compuesto por el Sol y todo lo que orbita a su alrededor. ¿Sabes cuántos planetas lo conforman oficialmente?',
            'options' => ['8', '9', '7'],
            'correct' => 0, // Primera opción (8)
            'explanation' => 'Desde 2006, la Unión Astronómica Internacional reclasificó a Plutón como planeta enano, dejando oficialmente 8 planetas en nuestro sistema solar: Mercurio, Venus, Tierra, Marte, Júpiter, Saturno, Urano y Neptuno.',
            'fun_fact' => '¿Sabías que? Si pudieras poner a Saturno en una bañera gigante, flotaría. Es el único planeta de nuestro sistema solar con una densidad menor que el agua.'
        ],
        [
            'question' => 'Pregunta 3: ¿Quién pintó la Mona Lisa?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/003_.jpg',
            'description' => 'La Mona Lisa es una de las obras de arte más famosas del mundo, conocida por su enigmática sonrisa. ¿Sabes quién fue su creador?',
            'options' => ['Picasso', 'Van Gogh', 'Leonardo da Vinci'],
            'correct' => 2, // Tercera opción (Leonardo da Vinci)
            'explanation' => 'Leonardo da Vinci pintó la Mona Lisa (La Gioconda) entre 1503 y 1519. El retrato se cree que representa a Lisa Gherardini, esposa de un comerciante florentino llamado Francesco del Giocondo.',
            'fun_fact' => '¿Sabías que? La Mona Lisa ha sido robada una vez. En 1911, un empleado del Louvre llamado Vincenzo Peruggia la robó escondiéndola bajo su abrigo. Fue recuperada dos años después.'
        ],
        [
            'question' => 'Pregunta 4: ¿Cuál es el elemento químico más abundante en el universo?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/004_.jpg',
            'description' => 'Los elementos químicos son los componentes básicos de toda la materia. Hay uno que es particularmente abundante en el universo.',
            'options' => ['Carbono', 'Hidrógeno', 'Oxígeno'],
            'correct' => 1, // Segunda opción (Hidrógeno)
            'explanation' => 'El hidrógeno constituye aproximadamente el 75% de toda la materia bariónica (normal) del universo. Es el combustible principal de las estrellas y fue uno de los primeros elementos formados tras el Big Bang.',
            'fun_fact' => '¿Sabías que? A pesar de ser el elemento más abundante del universo, el hidrógeno puro es bastante escaso en la atmósfera terrestre porque es tan ligero que escapa fácilmente al espacio.'
        ],
        [
            'question' => 'Pregunta 5: ¿En qué año llegó el hombre a la Luna?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/005_.jpg',
            'description' => 'La llegada del hombre a la Luna fue uno de los momentos más importantes en la historia de la exploración espacial. ¿Recuerdas el año en que ocurrió?',
            'options' => ['1969', '1965', '1975'],
            'correct' => 0, // Primera opción (1969)
            'explanation' => 'El 20 de julio de 1969, Neil Armstrong y Buzz Aldrin se convirtieron en los primeros seres humanos en pisar la superficie lunar durante la misión Apolo 11. Armstrong pronunció la célebre frase: "Un pequeño paso para el hombre, un gran salto para la humanidad".',
            'fun_fact' => '¿Sabías que? Las huellas dejadas por los astronautas en la Luna permanecerán allí durante millones de años, ya que no hay viento ni agua que las erosionen.'
        ]
    ],
    'en' => [
        [
            'question' => 'Question 1: What is the capital of France?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/001_.jpg',
            'description' => 'France is a country in Western Europe known for its art, culture, and gastronomy. Now you must identify its capital.',
            'options' => ['London', 'Paris', 'Madrid'],
            'correct' => 1, // Second option (Paris)
            'explanation' => 'Paris has been the capital of France since 987. It is known as the "City of Light" and is home to famous monuments such as the Eiffel Tower, built for the 1889 World\'s Fair.',
            'fun_fact' => 'Did you know? Paris has a replica of the Statue of Liberty that faces toward its "big sister" in New York, as the original was a gift from France to the United States.'
        ],
        [
            'question' => 'Question 2: How many planets are there in the solar system?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/002_.jpg',
            'description' => 'The solar system consists of the Sun and everything that orbits around it. Do you know how many planets officially make up the solar system?',
            'options' => ['8', '9', '7'],
            'correct' => 0, // First option (8)
            'explanation' => 'Since 2006, the International Astronomical Union reclassified Pluto as a dwarf planet, officially leaving 8 planets in our solar system: Mercury, Venus, Earth, Mars, Jupiter, Saturn, Uranus, and Neptune.',
            'fun_fact' => 'Did you know? If you could put Saturn in a giant bathtub, it would float. It\'s the only planet in our solar system with a density less than water.'
        ],
        [
            'question' => 'Question 3: Who painted the Mona Lisa?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/003_.jpg',
            'description' => 'The Mona Lisa is one of the most famous works of art in the world, known for its enigmatic smile. Do you know who its creator was?',
            'options' => ['Picasso', 'Van Gogh', 'Leonardo da Vinci'],
            'correct' => 2, // Third option (Leonardo da Vinci)
            'explanation' => 'Leonardo da Vinci painted the Mona Lisa (La Gioconda) between 1503 and 1519. The portrait is believed to represent Lisa Gherardini, wife of a Florentine merchant named Francesco del Giocondo.',
            'fun_fact' => 'Did you know? The Mona Lisa has been stolen once. In 1911, a Louvre employee named Vincenzo Peruggia stole it by hiding it under his coat. It was recovered two years later.'
        ],
        [
            'question' => 'Question 4: What is the most abundant chemical element in the universe?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/004_.jpg',
            'description' => 'Chemical elements are the basic components of all matter. There is one that is particularly abundant in the universe.',
            'options' => ['Carbon', 'Hydrogen', 'Oxygen'],
            'correct' => 1, // Second option (Hydrogen)
            'explanation' => 'Hydrogen makes up approximately 75% of all baryonic (normal) matter in the universe. It is the main fuel of stars and was one of the first elements formed after the Big Bang.',
            'fun_fact' => 'Did you know? Despite being the most abundant element in the universe, pure hydrogen is quite scarce in Earth\'s atmosphere because it is so light that it easily escapes into space.'
        ],
        [
            'question' => 'Question 5: In what year did man land on the Moon?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/005_.jpg',
            'description' => 'The landing of man on the Moon was one of the most important moments in the history of space exploration. Do you remember the year it happened?',
            'options' => ['1969', '1965', '1975'],
            'correct' => 0, // First option (1969)
            'explanation' => 'On July 20, 1969, Neil Armstrong and Buzz Aldrin became the first humans to set foot on the lunar surface during the Apollo 11 mission. Armstrong uttered the famous phrase: "One small step for man, one giant leap for mankind."',
            'fun_fact' => 'Did you know? The footprints left by astronauts on the Moon will remain there for millions of years, as there is no wind or water to erode them.'
        ]
    ],
    'fr' => [
        [
            'question' => 'Question 1 : Quelle est la capitale de la France ?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/001_.jpg',
            'description' => 'La France est un pays d\'Europe occidentale connu pour son art, sa culture et sa gastronomie. Maintenant, vous devez identifier sa capitale.',
            'options' => ['Londres', 'Paris', 'Madrid'],
            'correct' => 1, // Deuxième option (Paris)
            'explanation' => 'Paris est la capitale de la France depuis 987. Elle est connue comme la "Ville Lumière" et abrite des monuments célèbres comme la Tour Eiffel, construite pour l\'Exposition universelle de 1889.',
            'fun_fact' => 'Le saviez-vous ? Paris possède une réplique de la Statue de la Liberté qui regarde vers sa "grande sœur" à New York, car l\'original était un cadeau de la France aux États-Unis.'
        ],
        [
            'question' => 'Question 2 : Combien de planètes y a-t-il dans le système solaire ?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/002_.jpg',
            'description' => 'Le système solaire est composé du Soleil et de tout ce qui orbite autour de lui. Savez-vous combien de planètes le composent officiellement ?',
            'options' => ['8', '9', '7'],
            'correct' => 0, // Première option (8)
            'explanation' => 'Depuis 2006, l\'Union astronomique internationale a reclassé Pluton comme planète naine, laissant officiellement 8 planètes dans notre système solaire : Mercure, Vénus, Terre, Mars, Jupiter, Saturne, Uranus et Neptune.',
            'fun_fact' => 'Le saviez-vous ? Si vous pouviez mettre Saturne dans une baignoire géante, elle flotterait. C\'est la seule planète de notre système solaire avec une densité inférieure à celle de l\'eau.'
        ],
        [
            'question' => 'Question 3 : Qui a peint la Joconde ?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/003_.jpg',
            'description' => 'La Joconde est l\'une des œuvres d\'art les plus célèbres au monde, connue pour son sourire énigmatique. Savez-vous qui était son créateur ?',
            'options' => ['Picasso', 'Van Gogh', 'Léonard de Vinci'],
            'correct' => 2, // Troisième option (Léonard de Vinci)
            'explanation' => 'Léonard de Vinci a peint la Joconde (La Gioconda) entre 1503 et 1519. On pense que le portrait représente Lisa Gherardini, épouse d\'un marchand florentin nommé Francesco del Giocondo.',
            'fun_fact' => 'Le saviez-vous ? La Joconde a été volée une fois. En 1911, un employé du Louvre nommé Vincenzo Peruggia l\'a volée en la cachant sous son manteau. Elle a été récupérée deux ans plus tard.'
        ],
        [
            'question' => 'Question 4 : Quel est l\'élément chimique le plus abondant dans l\'univers ?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/004_.jpg',
            'description' => 'Les éléments chimiques sont les composants de base de toute matière. Il y en a un qui est particulièrement abondant dans l\'univers.',
            'options' => ['Carbone', 'Hydrogène', 'Oxygène'],
            'correct' => 1, // Deuxième option (Hydrogène)
            'explanation' => 'L\'hydrogène constitue environ 75% de toute la matière baryonique (normale) de l\'univers. C\'est le principal combustible des étoiles et l\'un des premiers éléments formés après le Big Bang.',
            'fun_fact' => 'Le saviez-vous ? Bien qu\'il soit l\'élément le plus abondant de l\'univers, l\'hydrogène pur est assez rare dans l\'atmosphère terrestre car il est si léger qu\'il s\'échappe facilement dans l\'espace.'
        ],
        [
            'question' => 'Question 5 : En quelle année l\'homme a-t-il marché sur la Lune ?',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/img/005_.jpg',
            'description' => 'L\'arrivée de l\'homme sur la Lune a été l\'un des moments les plus importants de l\'histoire de l\'exploration spatiale. Vous souvenez-vous de l\'année où cela s\'est produit ?',
            'options' => ['1969', '1965', '1975'],
            'correct' => 0, // Première option (1969)
            'explanation' => 'Le 20 juillet 1969, Neil Armstrong et Buzz Aldrin sont devenus les premiers êtres humains à poser le pied sur la surface lunaire lors de la mission Apollo 11. Armstrong a prononcé la célèbre phrase : "Un petit pas pour l\'homme, un bond de géant pour l\'humanité".',
            'fun_fact' => 'Le saviez-vous ? Les empreintes laissées par les astronautes sur la Lune y resteront pendant des millions d\'années, car il n\'y a ni vent ni eau pour les éroder.'
        ]
    ]
];

// "Correct!" screens
$correctScreens = [
    'es' => [
        [
            'message' => '¡Correcto! Muy bien.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct_.jpg',
            'description' => 'Has acertado. Preparándote para la siguiente pregunta...'
        ],
        [
            'message' => '¡Excelente respuesta!',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct2_.jpg',
            'description' => '¡Sigue así! Continuamos con el siguiente desafío.'
        ],
        [
            'message' => '¡Perfecto! Lo has clavado.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct3_.jpg',
            'description' => 'Demuestras un gran conocimiento. Vamos a la siguiente pregunta.'
        ]
    ],
    'en' => [
        [
            'message' => 'Correct! Well done.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct_.jpg',
            'description' => 'You got it right. Preparing for the next question...'
        ],
        [
            'message' => 'Excellent answer!',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct2_.jpg',
            'description' => 'Keep it up! Moving on to the next challenge.'
        ],
        [
            'message' => 'Perfect! You nailed it.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct3_.jpg',
            'description' => 'You demonstrate great knowledge. Let\'s move to the next question.'
        ]
    ],
    'fr' => [
        [
            'message' => 'Correct ! Très bien.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct_.jpg',
            'description' => 'Vous avez bien répondu. Préparation de la question suivante...'
        ],
        [
            'message' => 'Excellente réponse !',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct2_.jpg',
            'description' => 'Continuez comme ça ! Passons au défi suivant.'
        ],
        [
            'message' => 'Parfait ! Vous avez tout compris.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/correct3_.jpg',
            'description' => 'Vous démontrez de grandes connaissances. Passons à la question suivante.'
        ]
    ]
];

// Error screens
$errorScreens = [
    'es' => [
        [
            'message' => '¡Respuesta incorrecta! Intenta nuevamente.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error_.jpg',
            'description' => 'No te desanimes, todos cometemos errores. Puedes volver a intentarlo.'
        ],
        [
            'message' => '¡Ops! Esa no es la respuesta correcta.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error2_.jpg',
            'description' => 'El conocimiento se construye con cada intento. ¡Prueba otra vez!'
        ],
        [
            'message' => '¡Incorrecto! Pero no pasa nada.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error3_.jpg',
            'description' => 'Cada error nos acerca más a la respuesta correcta. ¡Sigue intentando!'
        ]
    ],
    'en' => [
        [
            'message' => 'Incorrect answer! Try again.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error_.jpg',
            'description' => 'Don\'t get discouraged, we all make mistakes. You can try again.'
        ],
        [
            'message' => 'Oops! That\'s not the correct answer.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error2_.jpg',
            'description' => 'Knowledge is built with each attempt. Try again!'
        ],
        [
            'message' => 'Incorrect! But that\'s okay.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error3_.jpg',
            'description' => 'Each mistake brings us closer to the right answer. Keep trying!'
        ]
    ],
    'fr' => [
        [
            'message' => 'Réponse incorrecte ! Essayez à nouveau.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error_.jpg',
            'description' => 'Ne vous découragez pas, nous faisons tous des erreurs. Vous pouvez réessayer.'
        ],
        [
            'message' => 'Oups ! Ce n\'est pas la bonne réponse.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error2_.jpg',
            'description' => 'La connaissance se construit à chaque tentative. Essayez encore !'
        ],
        [
            'message' => 'Incorrect ! Mais ce n\'est pas grave.',
            'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/error3_.jpg',
            'description' => 'Chaque erreur nous rapproche de la bonne réponse. Continuez d\'essayer !'
        ]
    ]
];

// Introduction screen
$introScreen = [
    'es' => [
        'message' => '¡Bienvenido al Quiz de Conocimiento General!',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/intro_.jpg',
        'description' => 'Estás a punto de poner a prueba tus conocimientos con 5 preguntas de diferentes temas. Responde correctamente para avanzar. ¿Estás listo para el desafío?'
    ],
    'en' => [
        'message' => 'Welcome to the General Knowledge Quiz!',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/intro_.jpg',
        'description' => 'You are about to test your knowledge with 5 questions from different topics. Answer correctly to advance. Are you ready for the challenge?'
    ],
    'fr' => [
        'message' => 'Bienvenue au Quiz de Connaissances Générales !',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/intro_.jpg',
        'description' => 'Vous êtes sur le point de tester vos connaissances avec 5 questions sur différents sujets. Répondez correctement pour avancer. Êtes-vous prêt pour le défi ?'
    ]
];

// Final screen
$finalScreen = [
    'es' => [
        'message' => '¡Felicidades! Has completado el quiz correctamente.',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/congrats_.jpg',
        'description' => 'Has demostrado tener un gran conocimiento. ¡Gracias por jugar!'. "\n\n" .'Visitanos en https://adsong.org'
    ],
    'en' => [
        'message' => 'Congratulations! You have completed the quiz correctly.',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/congrats_.jpg', 
        'description' => 'You have demonstrated great knowledge. Thank you for playing!'. "\n\n" .'Visit us at https://adsong.org'
    ],
    'fr' => [
        'message' => 'Félicitations! Vous avez terminé le quiz correctement.',
        'image_url' => 'https://telegram.s3rr4.com/kokebe/ctr/congrats_.jpg',
        'description' => 'Vous avez démontré une grande connaissance. Merci d\'avoir joué!'. "\n\n" .'Visitez-nous sur https://adsong.org'
    ]
];

// End of all quiz messages


// Recibir y procesar actualizaciones
$content = file_get_contents('php://input');
$update = json_decode($content, true);

// Archivo para guardar los datos de los usuarios
$userDataFile = 'user_data_kokebe.json';

// Cargar datos de usuarios existentes
if (file_exists($userDataFile)) {
    $userData = json_decode(file_get_contents($userDataFile), true);
} else {
    $userData = [];
}

// Manejo de comandos o callbacks
if (isset($update['message'])) {
    // Manejo del comando /start
    if (isset($update['message']['text'])) { 
      
        if ($update['message']['text'] === '/start') {            
            $chatId = $update['message']['chat']['id'];
            
            // Inicializar el usuario sin idioma seleccionado
            $userData[$chatId] = ['language' => null, 'current_level' => 0, 'in_intro' => false, 'in_language_selection' => true];
            
            // Guardar los datos actualizados
            file_put_contents($userDataFile, json_encode($userData));
            
            // Enviar la pantalla de selección de idioma
            sendLanguageSelection($chatId);
        } elseif ($update['message']['text'] === '/report' && in_array($update['message']['from']['id'], $adminIds)) {
//        } elseif ($update['message']['text'] === '/report') {
                // Solo permitir a administradores acceder al reporte
                $chatId = $update['message']['chat']['id'];
                $report = generateCompletionsReport('json');
                
                // Enviar reporte
                $data = [
                    'chat_id' => $chatId,
                    'text' => "Reporte de usuarios que completaron el quiz:\n\n" . $report,
                    'parse_mode' => 'HTML'
                ];
                
                file_get_contents($website . '/sendMessage?' . http_build_query($data));

        } elseif ($update['message']['text'] === '/hello' && in_array($update['message']['from']['id'], $adminIds)) {

                $chatId = $update['message']['chat']['id'];
                
                // Enviar reporte
                $data = [
                    'chat_id' => $chatId,
                    'text' => "HOLA:\n\n ¿Qué tal?",
                    'parse_mode' => 'HTML'
                ];
                
                file_get_contents($website . '/sendMessage?' . http_build_query($data));

        }  elseif ($update['message']['text'] === '/stat' && in_array($update['message']['from']['id'], $adminIds)) {

                // Ejecuta el archivo stat.php que está en el mismo directorio
                $resultado = include('stat.php');

                $chatId = $update['message']['chat']['id'];
                
                // Enviar reporte
                $data = [
                    'chat_id' => $chatId,
                    'text' => "HOLA:\n\n¿Qué tal?\n\nMira https://telegram.s3rr4.com/kokebe/estadisticas.html",
                    'parse_mode' => 'HTML'
                ];
                
                file_get_contents($website . '/sendMessage?' . http_build_query($data));
        }
        // hemos puesto el elseif para /report y /hello
    }   

} elseif (isset($update['callback_query'])) {
    // Manejo de respuestas de botones
    $callbackQuery = $update['callback_query'];
    $chatId = $callbackQuery['message']['chat']['id'];
    $callbackData = $callbackQuery['data'];
    
    // Responder al callback para quitar el "reloj de espera"
    answerCallbackQuery($callbackQuery['id']);
    
    // Obtener el nivel actual del usuario o inicializarlo
    if (!isset($userData[$chatId])) {
        $userData[$chatId] = ['language' => null, 'current_level' => 0, 'in_intro' => false, 'in_language_selection' => true];
    }
    
    // Procesar la selección de idioma
    if (strpos($callbackData, 'lang_') === 0) {
        $selectedLang = substr($callbackData, 5); // Obtener el código de idioma
        $userData[$chatId]['language'] = $selectedLang;
        $userData[$chatId]['in_language_selection'] = false;
        $userData[$chatId]['in_intro'] = true;
        
        // Guardar los datos actualizados
        file_put_contents($userDataFile, json_encode($userData));
        
        // Enviar la pantalla de introducción en el idioma seleccionado
        sendIntroScreen($chatId, $selectedLang);
    }
    // Procesar la respuesta según el callback_data
    elseif ($callbackData === 'start_quiz') {
        // El usuario ha visto la intro y quiere comenzar el quiz
        $userData[$chatId]['in_intro'] = false;
        
        // Guardar los datos actualizados
        file_put_contents($userDataFile, json_encode($userData));
        
        // Enviar la primera pregunta
        sendQuestion($chatId, 0, $userData[$chatId]['language']);
    } elseif (strpos($callbackData, 'correct_') === 0) {
        // Respuesta correcta, mostrar pantalla de "¡Correcto!" y luego avanzar
        $level = (int) substr($callbackData, 8);
        $userData[$chatId]['current_level'] = $level + 1;
        
        // Guardar los datos actualizados
        file_put_contents($userDataFile, json_encode($userData));
        
        // Determinar si es la última pregunta
        $lang = $userData[$chatId]['language'];
        $isLastQuestion = ($level + 1 >= count($quizData[$lang]));
        
        // Enviar mensaje de "¡Correcto!" con referencia al siguiente nivel o final
        sendCorrectScreen($chatId, $level, $isLastQuestion, $lang);
        
    } elseif (strpos($callbackData, 'next_') === 0) {
        // Avanzar a la siguiente pregunta después de "¡Correcto!"
        $level = (int) substr($callbackData, 5);
        $lang = $userData[$chatId]['language'];
        
        if ($level >= count($quizData[$lang])) {
            // Si ya es el último nivel, mostrar pantalla final
            sendFinalScreen($chatId, $lang);
        } else {
            // Si no, mostrar la siguiente pregunta
            sendQuestion($chatId, $level, $lang);
        }
    } elseif (strpos($callbackData, 'wrong_') === 0) {
        // Respuesta incorrecta, mostrar pantalla de error
        $level = (int) substr($callbackData, 6);
        $lang = $userData[$chatId]['language'];
        sendRandomErrorScreen($chatId, $level, $lang);
    } elseif (strpos($callbackData, 'retry_') === 0) {
        // Intentar nuevamente la pregunta actual
        $level = (int) substr($callbackData, 6);
        $lang = $userData[$chatId]['language'];
        sendQuestion($chatId, $level, $lang);
    } elseif ($callbackData === 'restart') {
        // Reiniciar el quiz (volviendo a la selección de idioma)
        $userData[$chatId]['current_level'] = 0;
        $userData[$chatId]['in_intro'] = false;
        $userData[$chatId]['in_language_selection'] = true;
        
        // Guardar los datos actualizados
        file_put_contents($userDataFile, json_encode($userData));
        
        sendLanguageSelection($chatId);
    } elseif ($callbackData === 'restart_same_lang') {
        // Reiniciar el quiz en el mismo idioma (volviendo a la introducción)
        $userData[$chatId]['current_level'] = 0;
        $userData[$chatId]['in_intro'] = true;
        
        // Guardar los datos actualizados
        file_put_contents($userDataFile, json_encode($userData));
        
        sendIntroScreen($chatId, $userData[$chatId]['language']);
    }
}

/**
 * Envía la pantalla de selección de idioma en vertical y sin imagen
 * 
 * @param int $chatId ID del chat
 */
function send___LanguageSelection($chatId) {
    global $languages, $website;
    
    // Crear botones para cada idioma disponible
    $keyboard = [];
    foreach ($languages as $code => $lang) {
        $keyboard[] = [['text' => $lang['name'], 'callback_data' => "lang_$code"]];
    }
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el mensaje
    $message = "🌐 " . $languages['es']['language_selection'] . "\n\n" .
               "🌐 " . $languages['en']['language_selection'] . "\n\n" .
               "🌐 " . $languages['fr']['language_selection'];
    
    // Enviar mensaje de selección de idioma
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendMessage?' . http_build_query($data));
}


/**
 * Envía la pantalla de selección de idioma en horizontal (sin imagen)
 * 
 * @param int $chatId ID del chat
 */
function send________LanguageSelection($chatId) {
    global $languages, $website;
    
    // Crear una sola fila con botones para cada idioma disponible
    $row = [];
    foreach ($languages as $code => $lang) {
        $row[] = ['text' => $lang['name'], 'callback_data' => "lang_$code"];
    }
    // Añadir la fila como único elemento del teclado
    $keyboard = [$row];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el mensaje
    $message = "🌐 " . $languages['es']['language_selection'] . "\n\n" .
               "🌐 " . $languages['en']['language_selection'] . "\n\n" .
               "🌐 " . $languages['fr']['language_selection'];
    
    // Enviar mensaje de selección de idioma
    $data = [
        'chat_id' => $chatId,
        'text' => $message,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendMessage?' . http_build_query($data));
}

function sendLanguageSelection($chatId) {
    global $languages, $website, $languageSelectionScreen;
    
    // Crear una sola fila con botones para cada idioma disponible
    $row = [];
    foreach ($languages as $code => $lang) {
        $row[] = ['text' => $lang['name'], 'callback_data' => "lang_$code"];
    }
    // Añadir la fila como único elemento del teclado
    $keyboard = [$row];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el mensaje
    $caption = "🌐 " . $languages['es']['language_selection'] . "\n\n" .
               "🌐 " . $languages['en']['language_selection'] . "\n\n" .
               "🌐 " . $languages['fr']['language_selection'];
    
    // Enviar imagen con mensaje de selección de idioma
    $data = [
        'chat_id' => $chatId,
        'photo' => $languageSelectionScreen['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}


/**
 * Envía la pantalla de introducción
 * 
 * @param int $chatId ID del chat
 * @param string $lang Código de idioma
 */
function sendIntroScreen($chatId, $lang) {
    global $introScreen, $website, $languages;
    
    // Botón para comenzar el quiz en el idioma seleccionado
    $keyboard = [
        [['text' => $languages[$lang]['start_button'], 'callback_data' => 'start_quiz']]
    ];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el texto completo: mensaje + descripción
    $caption = $introScreen[$lang]['message'] . "\n\n" . $introScreen[$lang]['description'];
    
    // Enviar la imagen y el mensaje de introducción
    $data = [
        'chat_id' => $chatId,
        'photo' => $introScreen[$lang]['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Envía la pantalla de "¡Correcto!"
 * 
 * @param int $chatId ID del chat
 * @param int $currentLevel Nivel actual que acaba de completar
 * @param bool $isLastQuestion Indica si es la última pregunta
 * @param string $lang Código de idioma
 */
function sendCorrectScreen($chatId, $currentLevel, $isLastQuestion, $lang) {
    global $correctScreens, $website, $quizData, $languages;
    
    // Seleccionar aleatoriamente una de las pantallas de "correcto"
    $randomIndex = mt_rand(0, count($correctScreens[$lang]) - 1);
    $correctScreen = $correctScreens[$lang][$randomIndex];
    
    // Texto del botón según si es la última pregunta o no
    $buttonText = $isLastQuestion ? $languages[$lang]['final_button'] : $languages[$lang]['next_button'];
    
    // El nivel para el callback es el nivel actual + 1 (ya que ya completó el nivel actual)
    $nextLevel = $currentLevel + 1;
    
    // Botón para continuar
    $keyboard = [
        [['text' => $buttonText, 'callback_data' => "next_$nextLevel"]]
    ];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Si acertó la última pregunta, personalizar el mensaje según el idioma
    $description = $correctScreen['description'];
    if ($isLastQuestion) {
        switch ($lang) {
            case 'es':
                $description = '¡Has completado todas las preguntas correctamente! Pulsa el botón para ver tu resultado final.';
                break;
            case 'en':
                $description = 'You have completed all questions correctly! Press the button to see your final result.';
                break;
            case 'fr':
                $description = 'Vous avez répondu à toutes les questions correctement! Appuyez sur le bouton pour voir votre résultat final.';
                break;
        }
    }
    
    // Obtener la explicación y curiosidad de la pregunta actual
    $explanation = $quizData[$lang][$currentLevel]['explanation'];
    $funFact = $quizData[$lang][$currentLevel]['fun_fact'];
    
    // Preparar el texto completo según el idioma
    $explanationLabel = ($lang == 'es') ? "Explicación" : (($lang == 'en') ? "Explanation" : "Explication");
    
    $caption = $correctScreen['message'] . "\n\n" . $description . "\n\n<b>" . $explanationLabel . ":</b> " . $explanation . "\n\n<b>" . $funFact . "</b>";
    
    // Enviar la imagen y el mensaje de correcto
    $data = [
        'chat_id' => $chatId,
        'photo' => $correctScreen['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Envía una pregunta al usuario
 * 
 * @param int $chatId ID del chat
 * @param int $level Nivel de la pregunta
 * @param string $lang Código de idioma
 */
function sendQuestion($chatId, $level, $lang) {
    global $quizData, $website;
    
    $questionData = $quizData[$lang][$level];
    
    // Crear los botones para las opciones
    $keyboard = [];
    foreach ($questionData['options'] as $i => $option) {
        $callbackData = ($i == $questionData['correct']) ? "correct_$level" : "wrong_$level";
        $keyboard[] = [['text' => $option, 'callback_data' => $callbackData]];
    }
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el texto completo: título de la pregunta + descripción
    $caption = $questionData['question'] . "\n\n" . $questionData['description'];
    
    // Enviar la imagen y la pregunta con descripción
    $data = [
        'chat_id' => $chatId,
        'photo' => $questionData['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Envía una pantalla de error aleatoria
 * 
 * @param int $chatId ID del chat
 * @param int $level Nivel actual para volver
 * @param string $lang Código de idioma
 */
function sendRandomErrorScreen($chatId, $level, $lang) {
    global $errorScreens, $website, $quizData, $languages;
    
    // Seleccionar aleatoriamente una de las pantallas de error
    $randomIndex = mt_rand(0, count($errorScreens[$lang]) - 1);
    $errorScreen = $errorScreens[$lang][$randomIndex];
    
    // Botón para regresar a la pregunta actual
    $keyboard = [
        [['text' => $languages[$lang]['retry_button'], 'callback_data' => "retry_$level"]]
    ];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Obtener la respuesta correcta, la explicación y la curiosidad
    $correctOption = $quizData[$lang][$level]['options'][$quizData[$lang][$level]['correct']];
    $explanation = $quizData[$lang][$level]['explanation'];
    $funFact = $quizData[$lang][$level]['fun_fact'];
    
    // Preparar etiquetas según el idioma
    $hintLabel = ($lang == 'es') ? "Pista" : (($lang == 'en') ? "Hint" : "Indice");
    $explanationLabel = ($lang == 'es') ? "Explicación" : (($lang == 'en') ? "Explanation" : "Explication");
    $correctAnswerText = ($lang == 'es') ? "La respuesta correcta es " : 
                         (($lang == 'en') ? "The correct answer is " : "La bonne réponse est ");
    
    // Preparar el texto completo
    $caption = $errorScreen['message'] . "\n\n" . $errorScreen['description'] . 
               "\n\n<b>" . $hintLabel . ":</b> " . $correctAnswerText . $correctOption . "." .
               "\n\n<b>" . $explanationLabel . ":</b> " . $explanation . 
               "\n\n<b>" . $funFact . "</b>";
    
    // Enviar la imagen y el mensaje de error
    $data = [
        'chat_id' => $chatId,
        'photo' => $errorScreen['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Envía la pantalla final (sin report json)
 * 
 * @param int $chatId ID del chat
 * @param string $lang Código de idioma
 */
function send__FinalScreen($chatId, $lang) {
    global $finalScreen, $website, $languages;
    
    // Botones para reiniciar el quiz (mismo idioma o cambiar idioma)
    $keyboard = [
        [
            ['text' => $languages[$lang]['play_again'], 'callback_data' => 'restart_same_lang'],
            ['text' => '🌐 ' . (($lang == 'es') ? 'Cambiar idioma' : 
                              (($lang == 'en') ? 'Change language' : 'Changer de langue')), 
             'callback_data' => 'restart']
        ]
    ];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el texto completo: mensaje + descripción
    $caption = $finalScreen[$lang]['message'] . "\n\n" . $finalScreen[$lang]['description'];
    
    // Enviar la imagen y el mensaje final
    $data = [
        'chat_id' => $chatId,
        'photo' => $finalScreen[$lang]['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Envía la pantalla final y guarda los datos del usuario que completó el quiz
 * 
 * @param int $chatId ID del chat
 * @param string $lang Código de idioma
 */
function sendFinalScreen($chatId, $lang) {
    global $finalScreen, $website, $languages, $update;
    
    // Obtener información del usuario
    $firstName = $update['callback_query']['from']['first_name'] ?? 'Desconocido';
    $lastName = $update['callback_query']['from']['last_name'] ?? '';
    $username = $update['callback_query']['from']['username'] ?? 'No disponible';
    
    // Crear registro con fecha y hora actual
    $completionData = [
        'chat_id' => $chatId,
        'first_name' => $firstName,
        'last_name' => $lastName,
        'username' => $username,
        'language' => $lang,
        'completion_date' => date('Y-m-d'),
        'completion_time' => date('H:i:s'),
        'timestamp' => time(),
                'version' => '0.9'
    ];
    
    // Guardar en archivo de completados
    $completionsFile = 'quiz_completions_kokebe.json';
    
    // Cargar datos existentes
    if (file_exists($completionsFile)) {
        $completions = json_decode(file_get_contents($completionsFile), true);
    } else {
        $completions = [];
    }
    
    // Agregar nuevo registro
    $completions[] = $completionData;
    
    // Guardar archivo actualizado
    file_put_contents($completionsFile, json_encode($completions, JSON_PRETTY_PRINT));
    
    // Botones para reiniciar el quiz (mismo idioma o cambiar idioma)
    $keyboard = [
        [
            ['text' => $languages[$lang]['play_again'], 'callback_data' => 'restart_same_lang'],
            ['text' => '🌐 ' . (($lang == 'es') ? 'Cambiar idioma' : 
                              (($lang == 'en') ? 'Change language' : 'Changer de langue')), 
             'callback_data' => 'restart']
        ]
    ];
    
    $replyMarkup = [
        'inline_keyboard' => $keyboard
    ];
    
    // Preparar el texto completo: mensaje + descripción
    $caption = $finalScreen[$lang]['message'] . "\n\n" . $finalScreen[$lang]['description'];
    
    // Enviar la imagen y el mensaje final
    $data = [
        'chat_id' => $chatId,
        'photo' => $finalScreen[$lang]['image_url'],
        'caption' => $caption,
        'parse_mode' => 'HTML',
        'reply_markup' => json_encode($replyMarkup)
    ];
    
    file_get_contents($website . '/sendPhoto?' . http_build_query($data));
}

/**
 * Responde a un callback query
 * 
 * @param string $callbackQueryId ID del callback query
 */
function answerCallbackQuery($callbackQueryId) {
    global $website;
    
    $data = [
        'callback_query_id' => $callbackQueryId
    ];
    
    file_get_contents($website . '/answerCallbackQuery?' . http_build_query($data));
}


/**
 * Genera un reporte de usuarios que completaron el quiz
 * 
 * @param string $format Formato del reporte (json, csv, html)
 * @return mixed Datos del reporte en el formato solicitado
 */
function generateCompletionsReport($format = 'json') {
    $completionsFile = 'quiz_completions_kokebe.json';
    
    if (!file_exists($completionsFile)) {
        return false;
    }
    
    $completions = json_decode(file_get_contents($completionsFile), true);
    
    switch ($format) {
        case 'csv':
            $output = "chat_id,first_name,last_name,username,language,completion_date,completion_time,version\n";
            foreach ($completions as $completion) {
                $output .= implode(',', [
                    $completion['chat_id'],
                    $completion['first_name'],
                    $completion['last_name'],
                    $completion['username'],
                    $completion['language'],
                    $completion['completion_date'],
                    $completion['completion_time'],
                    $completion['version']
                ]) . "\n";
            }
            return $output;
            
        case 'html':
            $output = "<table border='1'>
                <tr>
                    <th>Chat ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Idioma</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Version</th>
                </tr>";
            
            foreach ($completions as $completion) {
                $output .= "<tr>
                    <td>{$completion['chat_id']}</td>
                    <td>{$completion['first_name']}</td>
                    <td>{$completion['last_name']}</td>
                    <td>{$completion['username']}</td>
                    <td>{$completion['language']}</td>
                    <td>{$completion['completion_date']}</td>
                    <td>{$completion['completion_time']}</td>
                    <td>{$completion['version']}</td>
                </tr>";
            }
            
            $output .= "</table>";
            return $output;
        
        case 'txt':
            $output = "Chat ID\tNombre\tApellido\tUsuario\tIdioma\tFecha\tHora\tVersion\n";
            foreach ($completions as $completion) {
                $output .= implode("\t", [
                    $completion['chat_id'],
                    $completion['first_name'],
                    $completion['last_name'],
                    $completion['username'],
                    $completion['language'],
                    $completion['completion_date'],
                    $completion['completion_time'],
                    $completion['version']
                ]) . "\n";
            }
            return $output;
            
        case 'markdown':
            $output = "| Chat ID | Nombre | Apellido | Usuario | Idioma | Fecha | Hora | Version |\n";
            $output .= "| ------- | ------ | -------- | ------- | ------ | ----- | ---- | ------- |\n";
            
            foreach ($completions as $completion) {
                $output .= "| {$completion['chat_id']} | {$completion['first_name']} | {$completion['last_name']} | ";
                $output .= "{$completion['username']} | {$completion['language']} | {$completion['completion_date']} | ";
                $output .= "{$completion['completion_time']} | {$completion['version']} |\n";
            }
            return $output;
            
        default: // json
            return json_encode($completions, JSON_PRETTY_PRINT);
    }
}

?>
