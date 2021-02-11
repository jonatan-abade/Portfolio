
<?php
include '../app/Views/header.php';

$r = new Rota();
echo "oi";
$usuarioId = 1;
$titulo = "proejo em andamento";
$texto = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit animi blanditiis enim qui unde odit iusto esse molestiae, laborum ex perspiciatis quaerat quas? Tempore cupiditate commodi, repellendus aspernatur consequatur eveniet!';

$db->query("INSERT INTO posts (usuario_id, titulo, texto) VALUES (:usuario_id, :titulo, :texto)");
$db->bind(":usuario_id", $usuarioId);
$db->bind(":titulo", $titulo);
$db->bind(":texto", $texto);

$db->executa();

echo '<hr>Total de resultados: '.$db->totalResult();
echo '<hr>Ultimo ID: '.$db->ultimoIdInserido();

include '../app/Views/footer.php';
