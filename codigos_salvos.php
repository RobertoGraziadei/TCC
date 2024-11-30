<?php
/*

--> crud_presenca/listar.php
SELECT DISTINCT id_presenca, matricula, nome, presenca FROM aluno 
LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) AND (DATE(presenca.hr_batida) = '2024-11-30') 
INNER JOIN turma ON turma.id_turma = aluno.turma 
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma 

WHERE horario.fk_disciplina_id_disciplina = 17 
AND horario.fk_turma_id_turma = 310 
AND horario.fk_professor =7;



SELECT DISTINCT id_presenca, matricula, nome, presenca 
FROM aluno LEFT JOIN presenca ON (presenca.fk_aluno_matricula = aluno.matricula) AND (DATE(presenca.hr_batida) = '2024-11-30') 
INNER JOIN turma ON turma.id_turma = aluno.turma 
INNER JOIN horario ON horario.fk_turma_id_turma = turma.id_turma 

WHERE horario.fk_disciplina_id_disciplina = 38 
AND horario.fk_turma_id_turma = 310 
AND horario.fk_professor =3
*/








?>