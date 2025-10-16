// Conectar y crear la colección 'Estudiantes'
db.Estudiantes.insertMany([
    { "nombre": "Maria", "edad": 20, "ciudad": "Duitama" },
    { "nombre": "Damian", "edad": 22, "ciudad": "Tunja" },
    { "nombre": "Luis", "edad": 19, "ciudad": "Sogamoso" }
]);

// Consultar todos los documentos de la colección
db.Estudiantes.find();

// Filtrar estudiantes por ciudad
db.Estudiantes.find({ "ciudad": "Tunja" });

// Consultar estudiantes mayores de 20 años
db.Estudiantes.find({ "edad": { $gt: 20 } });
