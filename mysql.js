/*
npm init -y
npm install mysql
node .\mysql.js

*/
const mysql = require('mysql')
const { compileFunction } = require('vm')
const conexion = mysql.createConnection(
   {
    host:'94.242.61.132',
    user:'id17992064_txrlfgbv_tutorias',
    password:'123',
    database:'id17992064_txrlfgbv_tutorias	'
   } 
)

conexion.connect( (err) =>{
if(err) throw err
console.log('conexion exitosa')
})

conexion.query('SELECT * FROM carreras',(err,rows) =>{
if(err) throw err
    console.log('los datos son estos: ')
    console.log(rows)

    /*
    console.log("canitad de datos:")
    console.log(rows.length)
    const carreras = rows[0]
    console.log('la carrera es ${carreras.nombre_carrera} y tiene el id ${usuario.id}')
    */


})


conexion.end()