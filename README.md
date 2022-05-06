<table>
    <tr>
        <td>
            <img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
        </td>
        <td>
        <img  src="https://upload.wikimedia.org/wikipedia/commons/8/83/Sena_Colombia_logo.svg"  ></td>
    </tr>
</table>

# LaTiendaPHP - Factories y Seeders

Laravel Provee dos tipos de componentes auxiliares para facilitar la prueba de aplicacionesbasadas en bases de datos:

- Factory: Permite establecer un conjunto predeternimado de tipos de valores, para cada uno de los atributos de una **entidad**, utilizando el componente utilitario [Faker](https://fakerphp.github.io/formatters/)

- Seeder: Las Componentes o clases **semilla** permiten "sembrar" la base de datos con determinado número de datos de prueba basados en Factories. 

En el ejercicio anterior, al ingresar el comando: 

    php artisan make:model Marca -mfs

la opción
 
    -mfs

Crea los componentes auxiliares migración, **factory** y **seeder** para el modelo **Marca**

---

### Factory Marca

La Factory Marca comprende un método **definition** el cual define, mediante un arreglo, que tipo de dato **fake** se creará para cada atributo de la **entity** Marca. Este tipo de dato lo creará el componente externo [faker](https://fakerphp.github.io/):



    class MarcaFactory extends Factory
    {
        /**
        * Define the model's default state.
        *
        * @return array<string, mixed>
        */
        public function definition()
        {
            return [
                'nombre' => $this->faker->word,
                
            ];
        }
    }


---
### Seeder Marca

Un Seeder es un componente de tipo class, el cual comprende un método **run** en el cual se define la manera de "sembrar" la base de datos con el Factory respectivo. En nuestro caso, Crearemos 10 **MarcaFactories** (10 entidades Marca) en la tabla **marcas**

    class MarcaSeeder extends Seeder
    {
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
            Marca::factory(10)->create();
        }
    }

---
### Ejecutando un Seeder: 

el siguiente comando permite ejecutar el seeder específico de Marca:

    php artisan db:seed --class:MarcaSeeder
