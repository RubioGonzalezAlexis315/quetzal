<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QuetzalSeeder extends Seeder
{
    public function run(): void
    {
        // Categorías
        $categorias = [
            ['nombre' =>'Básica'],
            ['nombre' =>'Estampadas'],
            ['nombre' =>'Streetwear'],
            ['nombre' =>'Hip Hop'],
            ['nombre' =>'Subcultura']
        ];
        foreach ($categorias as $categoria) {
            DB::table('pro_categoria')->insert([
                'CA_Nombre' => $categoria['nombre'],
            ]);
        }

        // Clientes
        $clientes = [
            ['nombre' => 'Uriel Alonzo Velasco', 'email' => 'renteriaenrique@hotmail.com'],
            ['nombre' => 'Salvador Flores Viera', 'email' => 'mlebron@industrias.com'],
            ['nombre' => 'Aurelio Abelardo Montaño', 'email' => 'santillanalonso@hotmail.com'],
            ['nombre' => 'Rebeca Valle Canales', 'email' => 'gcasanova@monroy.org'],
            ['nombre' => 'Miguel Gracia Moreno', 'email' => 'ebahena@yahoo.com'],
            ['nombre' => 'Jerónimo Teresa Alfaro Samaniego', 'email' => 'socorro39@mendez.info'],
            ['nombre' => 'Sergio Correa Espinal', 'email' => 'hernadezlorena@madrigal-alcaraz.com'],
            ['nombre' => 'Abril Mónica Mascareñas', 'email' => 'tzedillo@de.com'],
            ['nombre' => 'Hermelinda Elisa Salazar', 'email' => 'pedro49@proyectos.org'],
            ['nombre' => 'Dulce María Marcos de Jesús', 'email' => 'fernandezdelia@corporacin.com'],
        ];

        foreach ($clientes as $cliente) {
            DB::table('cli_cliente_info')->insert([
                'CL_Nombre' => $cliente['nombre'],
                'CL_Email' => $cliente['email'],
                'CL_Password' => Hash::make('secret123'),
                'CL_Alta' => '2025-07-17',
            ]);
        }

        // Productos
        $productos = [
            ['nombre' => 'Playera Teal 1', 'descripcion' => 'Ullam expedita deserunt quas...', 'precio' => 167.39, 'categoria_id' => 5, 'imagen' => 'playera1.jpg', 'vistas' => 184],
            ['nombre' => 'Playera Purple 2', 'descripcion' => 'Eligendi eum iste aliquam...', 'precio' => 313.30, 'categoria_id' => 1, 'imagen' => 'playera2.jpg', 'vistas' => 125],
            ['nombre' => 'Playera FireBrick 3', 'descripcion' => 'Tempore possimus laudantium...', 'precio' => 337.38, 'categoria_id' => 5, 'imagen' => 'playera3.jpg', 'vistas' => 200],
            ['nombre' => 'Playera Navy 4', 'descripcion' => 'Blanditiis velit veniam quas...', 'precio' => 384.72, 'categoria_id' => 5, 'imagen' => 'playera4.jpg', 'vistas' => 183],
            ['nombre' => 'Playera DarkSlateBlue 5', 'descripcion' => 'Adipisci quis rerum aspernatur...', 'precio' => 350.79, 'categoria_id' => 4, 'imagen' => 'playera5.jpg', 'vistas' => 167],
            ['nombre' => 'Playera Fuchsia 6', 'descripcion' => 'Tenetur tempore assumenda...', 'precio' => 230.99, 'categoria_id' => 5, 'imagen' => 'playera6.jpg', 'vistas' => 106],
            ['nombre' => 'Playera PaleGoldenRod 7', 'descripcion' => 'Modi nemo magnam fugit...', 'precio' => 349.09, 'categoria_id' => 3, 'imagen' => 'playera7.jpg', 'vistas' => 106],
            ['nombre' => 'Playera Blue 8', 'descripcion' => 'Impedit animi ipsa nam...', 'precio' => 364.09, 'categoria_id' => 3, 'imagen' => 'playera8.jpg', 'vistas' => 71],
            ['nombre' => 'Playera LightCyan 9', 'descripcion' => 'Recusandae consequatur quia...', 'precio' => 267.69, 'categoria_id' => 2, 'imagen' => 'playera9.jpg', 'vistas' => 19],
            ['nombre' => 'Playera DarkKhaki 10', 'descripcion' => 'Et cupiditate tempora autem...', 'precio' => 258.99, 'categoria_id' => 5, 'imagen' => 'playera10.jpg', 'vistas' => 80],
        ];

        foreach ($productos as $producto) {
            DB::table('pro_producto_info')->insert([
                'PR_Nombre' => $producto['nombre'],
                'PR_Descripcion' => $producto['descripcion'],
                'PR_Precio' => $producto['precio'],
                'PR_Categoria' => $producto['categoria_id'],
                'PR_Vistas' => $producto['vistas'],
                'PR_Imagen' => $producto['imagen'],
                'PR_Alta' => '2025-07-17',
            ]);
        }

        // Comentarios
        $comentarios = [
            ['cliente_id' => 1, 'producto_id' => 1, 'comentario' => 'Excelente calidad y diseño.'],
            ['cliente_id' => 2, 'producto_id' => 2, 'comentario' => 'Buena relación calidad-precio.'],
            ['cliente_id' => 3, 'producto_id' => 3, 'comentario' => 'Me encantó el estampado.'],
            ['cliente_id' => 4, 'producto_id' => 4, 'comentario' => 'Talla perfecta y cómodo.'],
            ['cliente_id' => 5, 'producto_id' => 5, 'comentario' => 'Perfecto para uso diario.'],
        ];
        foreach ($comentarios as $comentario) {
            DB::table('cli_comentarios')->insert([
                'CM_Cliente' => $comentario['cliente_id'],
                'CM_Producto' => $comentario['producto_id'],
                'CM_Comentario' => $comentario['comentario'],
                'CM_Alta' => '2025-07-17',
            ]);
        }

        // Calificaciones
        foreach (range(1, 10) as $producto_id) {
            foreach (range(1, 3) as $i) {
                DB::table('pro_calificacion')->insert([
                    'CF_Cliente' => rand(1, 10),
                    'CF_Producto' => $producto_id,
                    'CF_Calificacion' => rand(3, 5),
                    'CF_Alta' => '2025-07-17',
                ]);
            }
        }
      
    }
}
