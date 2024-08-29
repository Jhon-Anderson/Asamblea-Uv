INSERT INTO usuarios (id, nombre, apellido, edad, cargo, email, usuario, contraseña) VALUES
('3865271982', 'Juan', 'Pérez', 30, 'Desarrollador', 'juan.perez@ejemplo.com', 'juanp', '321'),
('2633963789', 'María', 'Gómez', 25, 'Analista de datos', 'maria.gomez@ejemplo.com', 'mariag', '321'),
('2630853342', 'Pedro', 'López', 40, 'Gerente de proyecto', 'pedro.lopez@ejemplo.com', 'pedrol', '321'),
('7760853789', 'Ana', 'Martínez', 22, 'Diseñadora gráfica', 'ana.martinez@ejemplo.com', 'anam', '321'),
('2659953789', 'Carlos', 'García', 35, 'Contador', 'carlos.garcia@ejemplo.com', 'carlosg', '321');

INSERT INTO asambleas (idasamblea, nombre, fecha, estado) VALUES
('54448', 'Revisión del Estado Financiero Anual', '2024-04-25', 'nueva'),
('55728', 'Presentación de Resultados del Trimestre', '2024-04-26', 'nueva'),
('57728', 'Planificación Estratégica para el Próximo Año', '2024-04-27', 'nueva'),
('59928', 'Evaluación de Desempeño de los Departamentos', '2024-04-28', 'nueva'),
('56528', 'Revisión de Políticas y Procedimientos Internos', '2024-04-29', 'nueva');

INSERT INTO subtemas (idtema, idasamblea, tema, idusuario, estado) VALUES
('77834', '54448', 'Revisión del Estado Financiero Anual', 'activa'),
('57835', '54448', 'Evaluación de Estrategias de Marketing', 'pendiente'),
('99836', '54448', 'Aprobación del Presupuesto Anual', 'pendiente');

INSERT INTO propuestas (idpropuesta, idtema, descripcion, idusuario, votos) VALUES
('76438', '77834', 'Revisión del Estado Financiero Anual', '1234567890', 0),
('56439', '77835', 'Lanzamiento de una Campaña en Redes Sociales', '0987654321', 2),
('46440', '77835', 'Implementación de un Programa de Fidelización de Clientes', '1357908642', 1),
('36441', '77836', 'Aumento del Presupuesto de Investigación y Desarrollo', '0987654321', 3);