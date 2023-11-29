const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2/promise');
const app = express();

app.use(bodyParser.json());

// Conexión a la base de datos
const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'proyecto',
};

// Ruta para guardar un dato en la tabla

app.get('/orders/:id', async (req, res) => {
  try {
    const { id } = req.params; // Obtén el parámetro ID de la URL
    const conexion = await mysql.createConnection(dbConfig);
    const [datos] = await conexion.execute('SELECT COUNT(id) AS cantidad FROM orders WHERE user_id = ?', [id]);
    await conexion.end();
    res.json({ cantidad: datos[0].cantidad });
  } catch (error) {
    console.error('Error al obtener los datos:', error);
    res.status(500).json({ mensaje: 'Error al obtener los datos' });
  }
});

const PORT = 3000;
const IP = '0.0.0.0';

app.listen(PORT, IP, () => {
  console.log(`La aplicación está escuchando en http://${IP}:${PORT}`);
});
