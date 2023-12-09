<?php
$frases = array(
    // Si quiren añadir frases, pueden hacerlo por aquí
    "'El éxito es la suma de pequeños esfuerzos repetidos día tras día.'",
    "'La única manera de hacer un gran trabajo es amar lo que haces.'",
    "'El único lugar donde el éxito viene antes que el trabajo es en el diccionario.'",
    "'No importa lo lento que vayas, siempre y cuando no te detengas.'",
    "'La clave del éxito es comenzar antes de estar listo.'",
    "'El único modo de hacer un gran trabajo es amar lo que haces.'",
    "'La disciplina es el puente entre metas y logros.'",
    "'Cree en ti mismo y todo será posible.'",
    "'El único lugar donde el éxito viene antes que el trabajo es en el diccionario.'",
    "'El éxito no es la clave de la felicidad. La felicidad es la clave del éxito.'",
    "'Cree en tus sueños y estarán a tu alcance.'",
    "'Si puedes soñarlo, puedes lograrlo.'",
    "'Nunca es tarde para ser lo que podrías haber sido.'",
    "'La paciencia es amarga, pero sus frutos son dulces.'",
    "'El miedo es solo una ilusión. Supéralo y descubrirás tu verdadero potencial.'",
    "'El éxito es la suma de pequeños esfuerzos repetidos día tras día.'",
    "'Si quieres lograr algo que nunca has tenido, debes estar dispuesto a hacer algo que nunca has hecho.'"
);

// Devuelve una frase aleatoria
echo json_encode(array('frase' => $frases[array_rand($frases)]));
?>
